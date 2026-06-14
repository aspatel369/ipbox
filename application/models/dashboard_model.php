<?php
 
class Dashboard_model extends CI_Model{
	private $table = 'v_student';
	private $callers = 'aster_live_calls';
	function __construct(){
	parent::__construct();
	}

public function get_stats(){
    $this->db->group_by('house_name');
	$this->db->select('house_name, count(*) strength,SUM( CASE WHEN STATUS =  \'Active\' THEN 1 ELSE 0 END )Active,SUM( CASE WHEN STATUS =  \'Inactive\' THEN 1 ELSE 0 END ) Inactive');
    $query = $this->db->get($this->table);
    return $query->result_array();
}
public function live_caller(){
	$this->db->select('answered_time,Case when TIMEDIFF(now(),answered_time) < \'02:00:00\' then TIMEDIFF(now(),answered_time) else \'00:00:00\' end as dur,v_student.name, student_id, phone_number, aster_live_calls.status',false);
    $this->db->from('aster_live_calls');
	$this->db->join('v_student', 'v_student.roll_no = aster_live_calls.student_id');
	$this->db->order_by('aster_live_calls.id', 'DESC');
	$query = $this->db->get();
	return $query->result_array();
}
public function live_count(){
    $this->db->select('count(*) as totalcalls');
    $this->db->from('aster_live_calls');
	//$this->db->join('v_student', 'v_student.roll_no = aster_live_calls.student_id');
	$query = $this->db->get();
    return $query->result_array();
}

/**
 * Per-house summary: active students, active students with no CallLogs, total usage (minutes).
 *
 * @param string|null $from_date Y-m-d
 * @param string|null $to_date   Y-m-d
 */
public function get_house_summary($from_date = null, $to_date = null)
{
	$callLogDateSql = '';
	if (!empty($from_date)) {
		$callLogDateSql .= ' AND DATE(br2.CallEndTime) >= ' . $this->db->escape($from_date);
	}
	if (!empty($to_date)) {
		$callLogDateSql .= ' AND DATE(br2.CallEndTime) <= ' . $this->db->escape($to_date);
	}

	$usageDateSql = '';
	if (!empty($from_date)) {
		$usageDateSql .= ' AND DATE(br.CallEndTime) >= ' . $this->db->escape($from_date);
	}
	if (!empty($to_date)) {
		$usageDateSql .= ' AND DATE(br.CallEndTime) <= ' . $this->db->escape($to_date);
	}

	$sql = "
		SELECT
			h.id AS house_id,
			h.house_name,
			SUM(CASE WHEN LOWER(s.status) = 'active' THEN 1 ELSE 0 END) AS active_students,
			SUM(CASE
				WHEN LOWER(s.status) = 'active'
				AND NOT EXISTS (
					SELECT 1 FROM CallLogs br2
					WHERE br2.ROLLNO = s.roll_no
					{$callLogDateSql}
				) THEN 1
				ELSE 0
			END) AS inactive_students,
			COALESCE((
				SELECT ROUND(COALESCE(SUM(br.FullCallLength), 0) / 60, 2)
				FROM CallLogs br
				INNER JOIN student st ON st.roll_no = br.ROLLNO
				WHERE st.house = h.id
				{$usageDateSql}
			), 0) AS total_usage_minutes
		FROM house h
		LEFT JOIN student s ON s.house = h.id
		GROUP BY h.id, h.house_name
		ORDER BY h.house_name ASC
	";

	return $this->db->query($sql)->result_array();
}


	public function get_Details_devices_ping()
	{
		$this->db->select("
			Id,DeviceName, DeviceLocation, IPAddress, LastPingRequest, LastPingPositiveResponse, LastNegativeResponse, Status, RefreshedAt 
		", FALSE); // IMPORTANT → prevents escaping issues

		$this->db->from('DevicesAndPingStatus');


		$this->db->order_by('RefreshedAt', 'DESC');
		// $this->db->limit($limit, $start);

		return $this->db->get()->result_array();
	}
		
	public function get_Details_server_performance()
	{
		$this->db->select("
			DATE(timestamp) as report_date,
		
			AVG(cpu_load_1min) as cpu_load_1min,
			AVG(cpu_load_5min) as cpu_load_5min,
			AVG(cpu_load_15min) as cpu_load_15min,
		
			SUM(ram_total_mb) as ram_total_mb,
			SUM(ram_used_mb) as ram_used_mb,
			SUM(ram_free_mb) as ram_free_mb,
		
			SUM(disk_total_gb) as disk_total_gb,
			SUM(disk_used_gb) as disk_used_gb,
			AVG(disk_free_percentage) as disk_free_percentage,
		
			SUM(network_rx_kbps) as network_rx_kbps,
			SUM(network_tx_kbps) as network_tx_kbps
		", FALSE);
		
		$this->db->from('server_performance_log');
		
		$this->db->where(
			'timestamp >=',
			date('Y-m-d 00:00:00', strtotime('-15 days'))
		);
		
		$this->db->group_by('DATE(timestamp)');
		$this->db->order_by('report_date', 'ASC');
		
		$query = $this->db->get();
		
		return $query->result_array();
	}

	/**
	 * All data for new/dashboard view: devices, server charts, house summary.
	 *
	 * @param string|null $from_date Optional CallLogs filter for house summary
	 * @param string|null $to_date   Optional CallLogs filter for house summary
	 */
	public function get_home_data($from_date = null, $to_date = null)
	{
		$data = array();
		$data['details_device'] = $this->get_Details_devices_ping();
		$data['details_server_performance'] = $this->get_Details_server_performance();
		$data['house_summary'] = $this->get_house_summary($from_date, $to_date);

		$this->load->model('report_model');
		$data['reportDetails'] = $this->report_model->get_report_Details_extension(0, 0, array());

		$cpuData = array();
		$cpuLabels = array();
		$ram_total_mb = 0;
		$ram_used_mb = 0;
		$ram_free_mb = 0;
		$disk_total_gb = 0;
		$disk_used_gb = 0;
		$disk_free_gb = 0;

		foreach ($data['details_server_performance'] as $row) {
			$cpuData[] = round($row['cpu_load_1min'], 2);
			$cpuLabels[] = date('d M', strtotime($row['report_date']));
			$ram_used_mb += $row['ram_used_mb'];
			$ram_free_mb += $row['ram_free_mb'];
			$ram_total_mb += $row['ram_total_mb'];
			$disk_free_gb += $row['disk_free_percentage'];
			$disk_used_gb += $row['disk_used_gb'];
			$disk_total_gb += $row['disk_total_gb'];
		}

		$ramUsedPercent = 0;
		$ramFreePercent = 0;
		if ($ram_total_mb > 0) {
			$ramUsedPercent = round(($ram_used_mb / $ram_total_mb) * 100);
			$ramFreePercent = 100 - $ramUsedPercent;
		}

		$diskUsedPercent = 0;
		$diskFreePercent = 0;
		if ($disk_total_gb > 0) {
			$diskUsedPercent = round(($disk_used_gb / $disk_total_gb) * 100);
			$diskFreePercent = 100 - $diskUsedPercent;
		}

		$data['cpuData'] = json_encode($cpuData);
		$data['cpuLabels'] = json_encode($cpuLabels);
		$data['ramUsedPercent'] = $ramUsedPercent;
		$data['ramFreePercent'] = $ramFreePercent;
		$data['diskUsedPercent'] = $diskUsedPercent;
		$data['diskFreePercent'] = $diskFreePercent;

		return $data;
	}

	public function get_invoices()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('invoice');
		return $query->result_array();
	}
}
