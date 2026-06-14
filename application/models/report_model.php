<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Report_model extends CI_Model {


function report_count($filter){

	$sql2="";
	$sql3="";
	$sql4="";
	$sql5="";

          if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
          if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}

			if ($filter['student_id'] != "") {
                $roll = $filter['student_id'];
				 $sql3 = "AND student_id = '$roll'";
                }
          if ($filter['source'] != "") {
                $source = $filter['source'];
				 $sql4 = "AND source = '$source'";
                }

               if ($filter['status'] != "") {
               	if($filter['status'] == 'UNANSWERED'){
               	  $status = "";
				  $sql5 = "AND status = '$status'";

               	} else {
                $status = $filter['status'];
				 $sql5 = "AND status = '$status'";
				}
                }
        		
	  $sql = "SELECT COUNT(*)As cnt from call_report WHERE id!='' $sql2 $sql3 $sql4 $sql5 ORDER BY id DESC";
	$query = $this->db->query($sql);
	$row = $query->row();
     return $row->cnt;
     
}

function report_count_houseold($filter){

	$sql2="";
	$sql3="";
//	$sql4="";
	//$sql5="";

          if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
          if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}

          if ($filter['house'] != "") {
                $house = $filter['house'];
				 $sql3 = "AND house = '$house'";
                }

        		
	  $sql = "SELECT COUNT(*)As cnt from v_cdr WHERE id!='' $sql2 $sql3 ORDER BY id DESC";
	$query = $this->db->query($sql);
	$row = $query->row();
     return $row->cnt;
     
}

function report_exportdetails($filter){
	$sql2="";
	$sql3="";
	$sql4="";
	$sql5="";

	     if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
          if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}
			if ($filter['student_id'] != "") {
                $roll = $filter['student_id'];
				 $sql3 = "AND student_id like '$roll%'";
                }

            if ($filter['source'] != "") {
                $source = $filter['source'];
				 $sql4 = "AND source = '$source'";
                }

                if ($filter['status'] != "") {
               	if($filter['status'] == 'UNANSWERED'){
               	  $status = "";
				  $sql5 = "AND status = '$status'";

               	} else {
                $status = $filter['status'];
				 $sql5 = "AND status = '$status'";
				}
                }
	// With Spent Points	
	//$sql = "SELECT call_datetime,student_id,phone_number,source,status,duration,floor((time_to_sec(duration)/59)+1) as spentpoints from call_report WHERE id!='' $sql2 $sql3 $sql4 $sql5  ORDER BY id DESC";
	$sql = "SELECT call_datetime,student_id,phone_number,source,status,duration from call_report WHERE id!='' $sql2 $sql3 $sql4 $sql5  ORDER BY id DESC";
	$query = $this->db->query($sql);
	return $query->result_array();
}




function get_report_Details($limit, $start, $filter){
	$sql2="";
	$sql3="";
	$sql4="";
	$sql5="";

	     if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
         if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}
			if ($filter['student_id'] != "") {
                $roll = $filter['student_id'];
				 //$sql3 = "AND student_id = '$roll'";
                $sql3 = "AND student_id like '$roll%'";
                }
         if ($filter['source'] != "") {
                $source = $filter['source'];
				 $sql4 = "AND source = '$source'";
                }

            if ($filter['status'] != "") {
               	if($filter['status'] == 'UNANSWERED'){
               	  $status = "";
				  $sql5 = "AND status = '$status'";

               	} else {
                $status = $filter['status'];
				 $sql5 = "AND status = '$status'";
				}
            }
			else {
            $status = 'ANSWERED';
			$sql5 = "AND status = '$status'";
			}

	 $sql = "SELECT DATE_FORMAT(call_datetime,'%d %b %h:%i %p') as dur, call_datetime,student_id,name,phone_number,source,duration,cost,status from v_cdr WHERE id!='' $sql2 $sql3 $sql4 $sql5 ORDER BY id DESC LIMIT " . $start . " ," . $limit;
	$query = $this->db->query($sql);
	return $query->result_array();
}
public function report_count_house($search)
{
    $this->db->from('student AS s');
    $this->db->join('house AS h', 's.house = h.id', 'inner');
    $this->db->join('CallLogs AS br', 's.roll_no = br.ROLLNO', 'inner');

    // Filters
    if (!empty($search['house'])) {
        $this->db->where('h.id', $search['house']);
    }

    if (!empty($search['from_date'])) {
        $this->db->where('DATE(br.CallEndTime) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(br.CallEndTime) <=', $search['to_date']);
    }

    return $this->db->count_all_results();
}
function report_exportdetails_house($filter){
    $this->db->select("
        br.uniqueid,
        s.name,
        h.house_name,
        s.roll_no,
        br.MobileNumber,
        br.FullCallLength,
        br.cost,
        br.CallStartTime AS start_time,
        br.CallEndTime AS end_time
    ", FALSE); 

    $this->db->from('student AS s');
    $this->db->join('house AS h', 's.house = h.id', 'inner');
    $this->db->join('CallLogs AS br', 's.roll_no = br.ROLLNO', 'inner');

    // FIX: Replaced broken variables with mapped method payload variable $filter
    if (!empty($filter['house'])) {
        $this->db->where('h.id', $filter['house']);
    }

    if (!empty($filter['from_date'])) {
        $this->db->where('DATE(br.CallEndTime) >=', $filter['from_date']);
    }

    if (!empty($filter['to_date'])) {
        $this->db->where('DATE(br.CallEndTime) <=', $filter['to_date']);
    }

    $this->db->order_by('br.CallEndTime', 'DESC');
    return $this->db->get()->result_array();
}

public function get_report_Details_house($limit, $start, $search)
{
    $this->db->select("
        s.name,
        h.house_name,
        s.roll_no,
        br.uniqueid,
        br.MobileNumber,
        br.FullCallLength,
        br.callerid,
        br.cost,
        br.CallStartTime AS start_time,
        br.CallEndTime AS end_time
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('student AS s');
    $this->db->join('house AS h', 's.house = h.id', 'inner');
    $this->db->join('CallLogs AS br', 's.roll_no = br.ROLLNO', 'inner');

    if (!empty($search['house'])) {
        $this->db->where('h.id', $search['house']);
    }

    if (!empty($search['from_date'])) {
        $this->db->where('DATE(br.CallEndTime) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(br.CallEndTime) <=', $search['to_date']);
    }

    $this->db->order_by('br.CallEndTime', 'DESC');
    // $this->db->limit($limit, $start);

    return $this->db->get()->result_array();
}
public function report_count_peak($search)
{
    $this->db->select("
       call_date,max_calls
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('daily_max_concurrent');


    if (!empty($search['from_date'])) {
        $this->db->where('DATE(call_date) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(call_date) <=', $search['to_date']);
    }


    return $this->db->count_all_results();
}
function report_exportdetails_peak($filter){
     $this->db->select("
       call_date,max_calls,TotalCallsToday,TotalMinutesConsumedToday,TotalUniqueStudentCalledToday,TotalUniqueExtensionUsedToday
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('daily_max_concurrent');


    if (!empty($filter['from_date'])) {
        $this->db->where('DATE(call_date) >=', $filter['from_date']);
    }

    if (!empty($filter['to_date'])) {
        $this->db->where('DATE(call_date) <=', $filter['to_date']);
    }

    $this->db->order_by('call_date', 'DESC');
 
  return $this->db->get()->result_array();
}
public function get_report_Details_peak($limit, $start, $search)
{
    $this->db->select("
       call_date,max_calls,TotalCallsToday,TotalMinutesConsumedToday,TotalUniqueStudentCalledToday,TotalUniqueExtensionUsedToday
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('daily_max_concurrent');


    if (!empty($search['from_date'])) {
        $this->db->where('DATE(call_date) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(call_date) <=', $search['to_date']);
    }

    $this->db->order_by('call_date', 'DESC');
    // $this->db->limit($limit, $start);

    return $this->db->get()->result_array();
}

public function report_count_devices_ping($search)
{
   $this->db->select("
        Id,DeviceName, DeviceLocation, IPAddress, LastPingRequest, LastPingPositiveResponse, LastNegativeResponse, Status, RefreshedAt 
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('DevicesAndPingStatus');


    if (!empty($search['from_date'])) {
        $this->db->where('DATE(RefreshedAt) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(RefreshedAt) <=', $search['to_date']);
    }


    return $this->db->count_all_results();
}

public function get_report_Details_devices_ping($limit, $start, $search)
{
    $this->db->select("
        Id,DeviceName, DeviceLocation, IPAddress, LastPingRequest, LastPingPositiveResponse, LastNegativeResponse, Status, RefreshedAt 
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('DevicesAndPingStatus');


    if (!empty($search['from_date'])) {
        $this->db->where('DATE(RefreshedAt) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(RefreshedAt) <=', $search['to_date']);
    }

    $this->db->order_by('RefreshedAt', 'DESC');
    // $this->db->limit($limit, $start);

    return $this->db->get()->result_array();
}
function report_exportdetails_devices_ping($filter){
     $this->db->select("
        DeviceName, DeviceLocation, IPAddress, LastPingRequest, LastPingPositiveResponse, LastNegativeResponse, Status, RefreshedAt 
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('DevicesAndPingStatus');


    if (!empty($filter['from_date'])) {
        $this->db->where('DATE(RefreshedAt) >=', $filter['from_date']);
    }

    if (!empty($filter['to_date'])) {
        $this->db->where('DATE(RefreshedAt) <=', $filter['to_date']);
    }

    $this->db->order_by('RefreshedAt', 'DESC');
 
  return $this->db->get()->result_array();
}

function report_exportdetails_balance($filter){
     $this->db->from('student AS s');
    $this->db->join('house AS h', 's.house = h.id', 'inner');
    $this->db->join('balance AS b', 's.roll_no = b.roll_no', 'inner');

    if (!empty($filter['house'])) {
        $this->db->where('h.id', $search['house']);
    }
 
  return $this->db->get()->result_array();
}
public function report_count_balance($search)
{
    $this->db->from('student AS s');
    $this->db->join('house AS h', 's.house = h.id', 'inner');
    $this->db->join('balance AS b', 's.roll_no = b.roll_no', 'inner');

    if (!empty($search['house'])) {
        $this->db->where('h.id', $search['house']);
    }

    return $this->db->count_all_results();
}
public function get_report_Details_server_performance()
{
  $this->db->select('
    timestamp,
    cpu_load_1min,
    cpu_load_5min,
    cpu_load_15min,

    ram_total_mb,
    ram_used_mb,
    ram_free_mb,

    disk_total_gb,
    disk_used_gb,
    disk_free_percentage,

    network_rx_kbps,
    network_tx_kbps
', FALSE);

// Last 15 days data
$this->db->where('timestamp >=', date('Y-m-d H:i:s', strtotime('-15 days')));

// Optional: order by latest first
$this->db->order_by('timestamp', 'DESC');

$query = $this->db->get('server_performance_log');

$result = $query->result_array();
 

    return  $query->result_array();
}
public function get_report_Details_balance($limit, $start, $search)
{
    $this->db->select("
        s.name,
        h.house_name,
        s.roll_no,
        b.Pre_Balance,
        b.Added_Balance,
        s.available_balance,
        b.updated_on
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('student AS s');
    $this->db->join('house AS h', 's.house = h.id', 'inner');
    $this->db->join('balance AS b', 's.roll_no = b.roll_no', 'inner');

    if (!empty($search['house'])) {
        $this->db->where('h.id', $search['house']);
    }

    // if (!empty($search['from_date'])) {
    //     $this->db->where('DATE(br.datetime) >=', $search['from_date']);
    // }

    // if (!empty($search['to_date'])) {
    //     $this->db->where('DATE(br.datetime) <=', $search['to_date']);
    // }

    $this->db->order_by('b.updated_on', 'DESC');
    $this->db->limit($limit, $start);

    return $this->db->get()->result_array();
}

public function report_count_extension($search)
{
$this->db->select("
    e.ExtensionNumber AS extension_number,

    e.TotalUsageTillDate AS TotalUsageTillDate,
    e.LastUsedAt AS LastUsedAt,
    e.TotalUsagePast3Months AS TotalUsagePast3Months,
    e.TotalUsageThisMonth AS TotalUsageThisMonth,
    e.TotalUsageThisWeek AS TotalUsageThisWeek,

    ROUND(SUM(br.FullCallLength) / 60, 2) AS total_use,

    e.location
", FALSE);

$this->db->from('CallLogs br');

$this->db->join(
    'ExtensionsMapping e',
    'e.ExtensionNumber = br.callerid',
    'left'
);

$this->db->group_by(array(
    'e.ExtensionNumber As extensions',
    'e.LocationOfPhone As location'
));

$this->db->order_by('e.ExtensionNumber', 'ASC');


    // $this->db->from('extensions e');
    // $this->db->join('call_report c', 'e.extensions = c.source', 'left');

    // // 1. Apply Date Filters BEFORE getting the result
    // if (!empty($search['from_date'])) {
    //     $this->db->where('DATE(c.call_datetime) >=', $search['from_date']);
    // }

    // if (!empty($search['to_date'])) {
    //     $this->db->where('DATE(c.call_datetime) <=', $search['to_date']);
    // }

    // // 2. Group the data
    // $this->db->group_by('e.extensions');
    return $this->db->count_all_results();
}

public function get_report_Details_extension($limit, $start, $search)
{
    $this->db->select("
        e.ExtensionNumber AS extension_number,

        e.TotalUsageTillDate AS TotalUsageTillDate,

        e.LastUsedAt AS LastUsedAt,
        e.TotalUsagePast3Months AS TotalUsagePast3Months,
        e.TotalUsageThisMonth AS TotalUsageThisMonth,
        e.TotalUsageThisWeek AS TotalUsageThisWeek,

        COUNT(br.uniqueid) AS total_call_count,

        SUM(br.FullCallLength) AS total_seconds,

        e.LocationOfPhone As location
    ", FALSE);

    $this->db->from('CallLogs br');

    $this->db->join(
        'ExtensionsMapping e',
        'e.ExtensionNumber = br.callerid',
        'left'
    );
    if (!empty($search['from_date'])) {
        $this->db->where('DATE(br.CallEndTime) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(br.CallEndTime) <=', $search['to_date']);
    }

    $this->db->group_by(array(
        'e.ExtensionNumber',
        'e.LocationOfPhone'
    ));

    $this->db->order_by('e.ExtensionNumber', 'ASC');


    // $this->db->select('
    //     e.extensions as extension_number, 
    //     MAX(c.call_datetime) as last_call, 
    //     SUM(TIME_TO_SEC(c.duration)) as total_seconds
    // ');
    // $this->db->from('extensions e');
    // $this->db->join('call_report c', 'e.extensions = c.source', 'left');

    // // 1. Apply Date Filters BEFORE getting the result
    // if (!empty($search['from_date'])) {
    //     $this->db->where('DATE(c.call_datetime) >=', $search['from_date']);
    // }

    // if (!empty($search['to_date'])) {
    //     $this->db->where('DATE(c.call_datetime) <=', $search['to_date']);
    // }

    // // 2. Group the data
    // $this->db->group_by('e.extensions');

    // 3. Apply Pagination
    // $this->db->limit($limit, $start);

    // // 4. Run the query ONLY ONCE here
    $query = $this->db->get();

    return $query->result_array();
}

public function get_report_Details_low_usage_report($limit, $start, $search)
{
    $this->db->select("
            s.roll_no,
            s.name,

            COUNT(br.uniqueid) AS total_calls,

            ROUND(SUM(br.FullCallLength) / 60, 2) AS total_usage_minutes,

            MAX(br.datetime) AS last_call_date,

            ROUND(AVG(br.FullCallLength) / 60, 2) AS average_usage_minutes
        ", FALSE);

        $this->db->from('student s');

        $this->db->join(
            'balancereducer br',
            's.roll_no = br.ROLLNO',
            'left'
        );


        // ================= DATE FILTER =================

        if (!empty($search['from_date'])) {
            $this->db->where('DATE(br.datetime) >=', $search['from_date']);
        }

        if (!empty($search['to_date'])) {
            $this->db->where('DATE(br.datetime) <=', $search['to_date']);
        }


        // ================= GROUP BY =================

        $this->db->group_by('s.roll_no');


        // ================= LOW USAGE FILTER =================
        // Average usage less than 40 minutes

        $this->db->having('average_usage_minutes <', 40);


        // ================= SORT =================

        $this->db->order_by('average_usage_minutes', 'ASC');


        // ================= PAGINATION =================

        $this->db->limit($limit, $start);


        // ================= RESULT =================

        $query = $this->db->get();

    return $query->result_array();
} 


public function report_count_low_usage_report($search = [])
{

    $this->db->select('s.roll_no');

    $this->db->from('student s');

    $this->db->join(
        'balancereducer br',
        's.roll_no = br.ROLLNO',
        'left'
    );

    // DATE FILTER

    if (!empty($search['from_date'])) {
        $this->db->where('DATE(br.datetime) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(br.datetime) <=', $search['to_date']);
    }

    // GROUP

    $this->db->group_by('s.roll_no');

    // LOW USAGE

    $this->db->having('AVG(br.FullCallLength) / 60 <', 40);
    
    return $this->db->count_all_results();
}

public function get_report_Details_high_usage_report($limit, $start, $search)
{
    $this->db->select("
            s.roll_no,
            s.name,

            COUNT(br.uniqueid) AS total_calls,

            ROUND(SUM(br.FullCallLength) / 60, 2) AS total_usage_minutes,

            MAX(br.datetime) AS last_call_date,

            ROUND(AVG(br.FullCallLength) / 60, 2) AS average_usage_minutes
        ", FALSE);

        $this->db->from('student s');

        $this->db->join(
            'balancereducer br',
            's.roll_no = br.ROLLNO',
            'left'
        );


        // ================= DATE FILTER =================

        if (!empty($search['from_date'])) {
            $this->db->where('DATE(br.datetime) >=', $search['from_date']);
        }

        if (!empty($search['to_date'])) {
            $this->db->where('DATE(br.datetime) <=', $search['to_date']);
        }


        // ================= GROUP BY =================

        $this->db->group_by('s.roll_no');


        // ================= LOW USAGE FILTER =================
        // Average usage less than 40 minutes

        $this->db->having('average_usage_minutes >', 70);


        // ================= SORT =================

        $this->db->order_by('average_usage_minutes', 'ASC');


        // ================= PAGINATION =================

        $this->db->limit($limit, $start);


        // ================= RESULT =================

        $query = $this->db->get();

    return $query->result_array();
} 


public function report_count_high_usage_report($search = [])
{

    $this->db->select('s.roll_no');

    $this->db->from('student s');

    $this->db->join(
        'balancereducer br',
        's.roll_no = br.ROLLNO',
        'left'
    );

    // DATE FILTER

    if (!empty($search['from_date'])) {
        $this->db->where('DATE(br.datetime) >=', $search['from_date']);
    }

    if (!empty($search['to_date'])) {
        $this->db->where('DATE(br.datetime) <=', $search['to_date']);
    }

    // GROUP

    $this->db->group_by('s.roll_no');

    // LOW USAGE

    $this->db->having('AVG(br.FullCallLength) / 60 >', 70);
    
    return $this->db->count_all_results();
}

public function get_report_Details_not_usage_report($limit, $start, $search)
{
    $this->db->select("
            s.id,

            s.name AS student_name,

            h.house_name,

            s.roll_no,

            br.MobileNumber AS mobile,

            MAX(br.datetime) AS last_call_date
        ", FALSE);

        $this->db->from('student s');


        // ================= HOUSE JOIN =================

        $this->db->join(
            'house h',
            'h.id = s.house',
            'left'
        );


        // ================= CALL DATA JOIN =================

        $this->db->join(
            'balancereducer br',
            's.roll_no = br.ROLLNO',
            'left'
        );


        // ================= DATE FILTER =================

        if (!empty($search['from_date'])) {
            $this->db->where('DATE(br.datetime) >=', $search['from_date']);
        }

        if (!empty($search['to_date'])) {
            $this->db->where('DATE(br.datetime) <=', $search['to_date']);
        }


        // ================= NOT CALLED SINCE X DAYS =================

        if (!empty($search['days'])) {

            $this->db->having(
                'DATEDIFF(CURDATE(), DATE(MAX(br.datetime))) >=',
                $search['days']
            );
        }


        // ================= GROUP BY =================

        $this->db->group_by('s.roll_no');


        // ================= SORT =================

        $this->db->order_by('last_call_date', 'ASC');


        // ================= PAGINATION =================

        $this->db->limit($limit, $start);


        // ================= RESULT =================

        $query = $this->db->get();


    return $query->result_array();
} 


public function report_count_not_usage_report($search = [])
{

         $this->db->select('s.roll_no');

        $this->db->from('student s');

        $this->db->join(
            'house h',
            'h.id = s.house',
            'left'
        );

        $this->db->join(
            'balancereducer br',
            's.roll_no = br.ROLLNO',
            'left'
        );

        // DATE FILTER

        if (!empty($search['from_date'])) {
            $this->db->where('DATE(br.datetime) >=', $search['from_date']);
        }

        if (!empty($search['to_date'])) {
            $this->db->where('DATE(br.datetime) <=', $search['to_date']);
        }

        // GROUP

        $this->db->group_by('s.roll_no');

        // NOT CALLED SINCE X DAYS

        if (!empty($search['days'])) {

            $this->db->having(
                'DATEDIFF(CURDATE(), DATE(MAX(br.datetime))) >=',
                $search['days']
            );
        }

    
    return $this->db->count_all_results();
}
function report_exportdetails_behavior_report($filter){
   $this->db->select("
            s.id,

            s.name AS student_name,

            h.house_name,

            s.roll_no,

            br.MobileNumber AS mobile,

            br.id AS br_id,

            br.CallEndTime AS last_call_date
        ", FALSE);

        $this->db->from('student s');


        // ================= HOUSE JOIN =================

        $this->db->join(
            'house h',
            'h.id = s.house',
            'left'
        );


        // ================= CALL DATA JOIN =================

        $this->db->join(
            'CallLogs br',
            's.roll_no = br.ROLLNO',
            'left'
        );


        // ================= DATE FILTER =================

        if (!empty($filter['from_date'])) {
            $this->db->where('DATE(br.CallEndTime) >=', $filter['from_date']);
        }

        if (!empty($filter['to_date'])) {
            $this->db->where('DATE(br.CallEndTime) <=', $filter['to_date']);
        }


        

        // ================= GROUP BY =================

        $this->db->group_by('s.roll_no');

        if($filter['type'] === "high_usege"){
            $this->db->having('AVG(br.FullCallLength) / 60 >', $filter['per']);
        } elseif ($filter['type'] === "low_useage") {
            $this->db->having('AVG(br.FullCallLength) / 60 <', $filter['per']);
        } elseif ($filter['type'] === "not_called"){
          
            $this->db->having('AVG(br.FullCallLength) / 60 <', 1);
        }
        
    return $this->db->get()->result_array();
}

public function get_report_Details_behavior_report_report($limit, $start, $search)
{
    $this->db->select("
            s.id,

            s.name AS student_name,

            h.house_name,

            s.roll_no,
            
            COUNT(br.uniqueid) AS total_calls,

            ROUND(SUM(br.FullCallLength) / 60, 2) AS total_usage_minutes,

            br.MobileNumber AS mobile,
            
            br.ROLLNO AS br_id,

            br.CallEndTime AS last_call_date
        ", FALSE);

        $this->db->from('student s');


        // ================= HOUSE JOIN =================

        $this->db->join(
            'house h',
            'h.id = s.house',
            'left'
        );


        // ================= CALL DATA JOIN =================

        $this->db->join(
            'CallLogs br',
            's.roll_no = br.ROLLNO',
            'left'
        );


        // ================= DATE FILTER =================

        if (!empty($search['from_date'])) {
            $this->db->where('DATE(br.CallEndTime) >=', $search['from_date']);
        }

        if (!empty($search['to_date'])) {
            $this->db->where('DATE(br.CallEndTime) <=', $search['to_date']);
        }


        

        // ================= GROUP BY =================

        $this->db->group_by('s.roll_no');

        if($search['type'] === "high_usege"){
            $this->db->having('AVG(br.FullCallLength) / 60 >', $search['per']);
        } elseif ($search['type'] === "low_useage") {
            $this->db->having('AVG(br.FullCallLength) / 60 <', $search['per']);
        } elseif ($search['type'] === "not_called"){
          
            $this->db->having('AVG(br.FullCallLength) / 60 <', 1);
        }
        

        

        // ================= SORT =================

        // $this->db->order_by('br.CallEndTime', 'ASC');


        // ================= PAGINATION =================

        // $this->db->limit($limit, $start);


        // ================= RESULT =================

        $query = $this->db->get();


    return $query->result_array();
} 


public function report_count_behavior_report_report($search = [])
{

         $this->db->select('s.roll_no');

        $this->db->from('student s');

        $this->db->join(
            'house h',
            'h.id = s.house',
            'left'
        );

        $this->db->join(
            'CallLogs br',
            's.roll_no = br.ROLLNO',
            'left'
        );

        // DATE FILTER

        if (!empty($search['from_date'])) {
            $this->db->where('DATE(br.CallEndTime) >=', $search['from_date']);
        }

        if (!empty($search['to_date'])) {
            $this->db->where('DATE(br.CallEndTime) <=', $search['to_date']);
        }

        // GROUP

        $this->db->group_by('s.roll_no');

        // NOT CALLED SINCE X DAYS

        if (!empty($search['days'])) {

            $this->db->having(
                'DATEDIFF(CURDATE(), DATE(MAX(br.datetime))) >=',
                $search['days']
            );
        }

    
    return $this->db->count_all_results();
}

// function get_report_Details_house($limit, $start, $filter){
// 	$sql2="";
// 	$sql3="";
// 	$sql4 = "AND status = 'ANSWERED'";
// //	$sql5="";

// 	     if(!empty($filter['from_date'])){
// 		$fdate = $filter['from_date'];	      
// 	      if(!empty($filter['to_date'])){
// 		$tdate = $filter['to_date'];
// 				} 	
//           }	
//          if(@($filter['from_date']) && @($filter['to_date'])){				
// 			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
// 			}
// 			if ($filter['house'] != "") {
//                 $houseid = $filter['house'];
// 				 //$sql3 = "AND student_id = '$roll'";
//                 $sql3 = "AND house = '$houseid%'";
//                 }
          

// 	 $sql = "SELECT DATE_FORMAT(call_datetime,'%d %b %h:%i %p') as call_datetime,student_id,phone_number,name,source,duration,cost,status from v_cdr WHERE id!='' $sql2 $sql3 $sql4 ORDER BY id DESC LIMIT " . $start . " ," . $limit;
// 	$query = $this->db->query($sql);
// 	return $query->result_array();
// }


function sourceDropDown(){
        $sql = "SELECT distinct source from call_report";
	$query = $this->db->query($sql);
	return $query->result_array();
    }
	
function houseDropDown(){
        $sql = "SELECT id,house_name from house";
	$query = $this->db->query($sql);
	return $query->result_array();
    }


}
















