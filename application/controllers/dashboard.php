<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
class Dashboard extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('dashboard_model');

        $this->load->model('Configuration_model', 'Configuration_model', TRUE);

	}

	public function index()
	{
		$data['strength']=$this->dashboard_model->get_stats();
		$this->load->view('dashboard',$data);
	}
	public function callers()
	{
		$data['callers']=$this->dashboard_model->live_caller();
		$this->load->view('livecallers',$data);
	}
	public function invoice()
	{
		$data['data'] = $this->dashboard_model->get_invoices();
		$this->load->view('new/invoice', $data);
	}
	public function generate_invoice_pdf($invoice_data, $invoice_id = null)
	{
	    $html = $this->load->view('new/invoice_pdf', $invoice_data, TRUE);

	    $options = new Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isRemoteEnabled', true);

	    $dompdf = new Dompdf($options);

	    $dompdf->loadHtml($html);
	    $dompdf->setPaper('A4', 'portrait');
	    $dompdf->render();

	    $filename = 'Invoice_' . $invoice_data['invoice_number'];
	    if ($invoice_id) {
	        $filename .= '_' . $invoice_id;
	    }
	    $filename .= '.pdf';

	    $dir = FCPATH . 'uploads/invoices/';
	    if (!is_dir($dir)) {
	        mkdir($dir, 0755, true);
	    }

	    $pdf_output = $dompdf->output();
	    file_put_contents($dir . $filename, $pdf_output);

	    $pdf_link = base_url('uploads/invoices/' . $filename);

	    header('Content-Type: application/pdf');
	    header('Content-Disposition: inline; filename="' . $filename . '"');
	    header('Content-Length: ' . strlen($pdf_output));
	    echo $pdf_output;

	    return $pdf_link;
	}
	public function saveinvoice()
	{
		 $billing_month = $this->input->post('billing_month');
		 $billing_data = $this->input->post('billing_data');
		 $billing_type = $this->input->post('billing_type');
		 list($month, $year) = explode('-', $billing_month);
		
		 $start_date = date('Y-m-01', strtotime($billing_month));
		$end_date   = date('Y-m-t', strtotime($billing_month));


         $config = $this->Configuration_model->get_invoice_config();
         $service_rate = 0;
        $invoice_number      = $config['invoice_number'] ?? '';
        $invoice_date        = $config['invoice_date'] ?? '';
        $billing_description = $config['billing_description'] ?? '';
        $local_rate          = $config['LocalRate'] ?? '';
        $international_rate  = $config['InternationalRate'] ?? '';
        $local_int_rate      = $config['Local_InternationalRate'] ?? '';
       // Rates configuration (e.g., loaded from database or config file)
	    $rate_local = $local_rate;         // Configurable Rate Local
	    $rate_international = $international_rate; // Configurable Rate International
	    $total_international =0;
	    $counter_check =0;
	    $total_national =0;
	    // Dynamic month/year filters for the call logs
	    $target_month = $month; 
	    $target_year  = $year;
	    // A) Student Data + Flat Rate
	   if ($billing_data == 'student_data' && $billing_type == 'flat_rate') 
		{
			
		 

		    // ----------------------------------------------------
		    // BASE COUNTS GENERATION (From previous step logic)
		    // ----------------------------------------------------

		    // (i) Total Students (Active)
		    // (i) Total Students (Active)
			$total_students = $this->db->where('status', 'Active')
			                           ->count_all_results('student');

			// (ii) Total International
			$this->db->where('status', 'Active');
			$this->db->where("
			(
			    LENGTH(TRIM(LEADING '0' FROM option1)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option2)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option3)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option4)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option5)) > 10
			)", NULL, FALSE);

			$total_international = $this->db->count_all_results('student');

			// (iii) Total National
			$this->db->where('status', 'Active');
			$this->db->where("
			(
			    LENGTH(option1) = 10
			    OR LENGTH(option2) = 10
			    OR LENGTH(option3) = 10
			    OR LENGTH(option4) = 10
			    OR LENGTH(option5) = 10
			)", NULL, FALSE);

			$total_national = $this->db->count_all_results('student');

			// (iv) Counter Check
			$counter_check_query = $this->db->select('COUNT(DISTINCT ROLLNO) as unique_users')
			                                // ->where('MONTH(CallStartTime)', $target_month)
			                                // ->where('YEAR(CallStartTime)', $target_year)
											->where('CallStartTime >=', $start_date . ' 00:00:00')
											->where('CallStartTime <=', $end_date . ' 23:59:59')
			                                ->get('calllogs')
			                                ->row_array();

			$counter_check = isset($counter_check_query['unique_users'])
			    ? (int)$counter_check_query['unique_users']
			    : 0;

		    // ----------------------------------------------------
		    // CONDITIONAL BILLING LOGIC
		    // ----------------------------------------------------
		    $bill_a = 0;
		    $bill_b = 0;
		    $bill_total = 0;

		    if ($total_students >= $counter_check) 
		    {
		        // --- THEN BLOCK ---
		        // (i) Total National x Rate Local = A'
		        $bill_a = $total_national * $rate_local;

		        // (ii) Total International x Rate Int = B'
		        $bill_b = $total_international * $rate_international;

		        // Total = C'
		        $bill_total = $bill_a + $bill_b;
		    } 
		    else 
		    {
		        // --- ELSE BLOCK ---
		        // X -> Calculate total user based on call logs
		        $x_total_user_logs = $counter_check; 

		        // Y -> Total International (same as computed above)
		        $y_total_international = $total_international;

		        // Z -> National user = (X - Y)
		        // (Ensuring value doesn't drop below 0 if log count is lower than configured international users)
		        $z_national_user = max(0, $x_total_user_logs - $y_total_international);

		        // Bill Calculation:
		        // Z x Rate Local = A'
		        $bill_a = $z_national_user * $rate_local;

		        // Y x Rate International = B'
		        $bill_b = $y_total_international * $rate_international;

		        // Total = C'
		        $bill_total = $bill_a + $bill_b;
		    }

		    // $bill_total now stores the higher/optimized bill structure based on your rule.
		}

	    // B) Student Data + Trai Rate
	    else if ($billing_data == 'student_data' && $billing_type == 'trai_rate')
		{

			// ==========================================
			// Query A: Count active students
			// ==========================================
			$this->db->where('status', 'Active');
			// Passing 'student' directly here ensures it runs cleanly
			$count_A = $this->db->count_all_results('student'); 


		    // ==========================================
		    // Query B: Count students from calllogs in Month & Year range
		    // Note: Assuming you pass $start_date and $end_date 
		    // to filter CallStartTime or CallEndTime timestamps
		    // ==========================================
		    $this->db->select('COUNT(DISTINCT ROLLNO) as total_students'); // Using DISTINCT to count students unique to call logs
		    $this->db->from('calllogs'); // Maps to your call logs table screenshot
		    
		    // Replace $start_date and $end_date with your actual date range variables
		    if (!empty($start_date) && !empty($end_date)) {

				$this->db->where('CallStartTime >=', $start_date . ' 00:00:00');
				$this->db->where('CallStartTime <=', $end_date . ' 23:59:59');	
		        // $this->db->where('MONTH(CallStartTime)', $target_month);
		        // $this->db->where('YEAR(CallStartTime)', $target_year);
		    }
		    
		    $query_B = $this->db->get();
		    $result_B = $query_B->row();
		    $count_B = $result_B ? $result_B->total_students : 0;


			// ==========================================
			// Total International Students
			// ==========================================
			// REMOVED the reset line completely to avoid the scope error

			$this->db->where('status', 'Active');
			$this->db->where("
			(
			    LENGTH(TRIM(LEADING '0' FROM option1)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option2)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option3)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option4)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option5)) > 10
			)", NULL, FALSE);

			$count_C = $this->db->count_all_results('student');


			// ==========================================
			// Total International Usage
			// ==========================================
			// REMOVED $this->db->_reset_select(); from here as well

			$this->db->select(
			    "GROUP_CONCAT(DISTINCT rollno ORDER BY rollno SEPARATOR ', ') AS rollnos,
			     SUM(calculated_cost) AS total_international_usage",
			    FALSE
			);

			$this->db->from('isdbills');

			if (!empty($start_date) && !empty($end_date))
			{
			    $this->db->where('datetime >=', $start_date . ' 00:00:00');
			    $this->db->where('datetime <=', $end_date . ' 23:59:59');
			}

			$query = $this->db->get();

			$result = $query->row_array();

			$total_international_usage = !empty($result['total_international_usage'])
			    ? $result['total_international_usage']
			    : 0;

			$rollnos = !empty($result['rollnos'])
			    ? $result['rollnos']
			    : '';
				    
		    if ($count_A > $count_B) 
		    {
		        // Formula block 1: if (A > B)
		        $part_i   = ($count_A - $count_C) * $rate_local;
		        $part_ii  = $count_C * $service_rate;
		        $part_iii = $total_international_usage;

		        $total_bill = $part_i + $part_ii + $part_iii;
		    } 
		    else 
		    {
		        // Formula block 2: else
		        $part_i   = ($count_B - $count_C) * $rate_local;
		        $part_ii  = $count_C * $service_rate;
		        $part_iii = $total_international_usage;

		        $total_bill = $part_i + $part_ii + $part_iii;
		    }


		        // Bill Calculation:
		        // Z x Rate Local = A'
		        $bill_a = $part_i;

		        // Y x Rate International = B'
		        $bill_b = $part_ii;
		        $bill_c = $part_iii;

		        // Total = C'
		        $bill_total = $total_bill;
		    
		}

	    // C) CDR Data + Flat Rate
	    else if ($billing_data == 'cdr_data' && $billing_type == 'flat_rate')
	    {
	           // ----------------------------------------------------
		    // BASE COUNTS GENERATION (From previous step logic)
		    // ----------------------------------------------------

			// (ii) Total International
			$this->db->where('status', 'Active');
			$this->db->where("
			(
			    LENGTH(TRIM(LEADING '0' FROM option1)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option2)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option3)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option4)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option5)) > 10
			)", NULL, FALSE);

			$total_international = $this->db->count_all_results('student');

			// (iii) Total National
			$this->db->where('status', 'Active');
			$this->db->where("
			(
			    LENGTH(option1) = 10
			    OR LENGTH(option2) = 10
			    OR LENGTH(option3) = 10
			    OR LENGTH(option4) = 10
			    OR LENGTH(option5) = 10
			)", NULL, FALSE);

			$total_national = $this->db->count_all_results('student');

			// (iv) Counter Check
			$counter_check_query = $this->db->select('COUNT(DISTINCT ROLLNO) as unique_users')
			                                // ->where('MONTH(CallStartTime)', $target_month)
			                                // ->where('YEAR(CallStartTime)', $target_year)
											->where('CallStartTime >=', $start_date . ' 00:00:00')
											->where('CallStartTime <=', $end_date . ' 23:59:59')
			                                ->get('calllogs')
			                                ->row_array();

			$counter_check = isset($counter_check_query['unique_users'])
			    ? (int)$counter_check_query['unique_users']
			    : 0;

		    // ----------------------------------------------------
		    // CONDITIONAL BILLING LOGIC
		    // ----------------------------------------------------
		    $bill_a = 0;
		    $bill_b = 0;
		    $bill_total = 0;

		        // --- ELSE BLOCK ---
		        // X -> Calculate total user based on call logs
		        $x_total_user_logs = $counter_check; 

		        // Y -> Total International (same as computed above)
		        $y_total_international = $total_international;

		        // Z -> National user = (X - Y)
		        // (Ensuring value doesn't drop below 0 if log count is lower than configured international users)
		        $z_national_user = max(0, $x_total_user_logs - $y_total_international);

		        // Bill Calculation:
		        // Z x Rate Local = A'
		        $bill_a = $z_national_user * $rate_local;

		        // Y x Rate International = B'
		        $bill_b = $y_total_international * $rate_international;

		        // Total = C'
		        $bill_total = $bill_a + $bill_b;
		    


	        // Your billing logic here
	    }

	    // D) CDR Data + Trai Rate
	    else if ($billing_data == 'cdr_data' && $billing_type == 'trai_rate')
	    {
	        

		   // ==========================================
			// Query A: Count active students
			// ==========================================
			$this->db->where('status', 'Active');
			// Passing 'student' directly here ensures it runs cleanly
			$count_A = $this->db->count_all_results('student'); 


		    // ==========================================
		    // Query B: Count students from calllogs in Month & Year range
		    // Note: Assuming you pass $start_date and $end_date 
		    // to filter CallStartTime or CallEndTime timestamps
		    // ==========================================
		    $this->db->select('COUNT(DISTINCT ROLLNO) as total_students'); // Using DISTINCT to count students unique to call logs
		    $this->db->from('calllogs'); // Maps to your call logs table screenshot
		    
		    // Replace $start_date and $end_date with your actual date range variables
		    if (!empty($start_date) && !empty($end_date)) {

				$this->db->where('CallStartTime >=', $start_date . ' 00:00:00');
				$this->db->where('CallStartTime <=', $end_date . ' 23:59:59');	
		        // $this->db->where('MONTH(CallStartTime)', $target_month);
		        // $this->db->where('YEAR(CallStartTime)', $target_year);
		    }
		    
		    $query_B = $this->db->get();
		    $result_B = $query_B->row();
		    $count_B = $result_B ? $result_B->total_students : 0;


			// ==========================================
			// Total International Students
			// ==========================================
			// REMOVED the reset line completely to avoid the scope error

			$this->db->where('status', 'Active');
			$this->db->where("
			(
			    LENGTH(TRIM(LEADING '0' FROM option1)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option2)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option3)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option4)) > 10
			    OR LENGTH(TRIM(LEADING '0' FROM option5)) > 10
			)", NULL, FALSE);

			$count_C = $this->db->count_all_results('student');


			// ==========================================
			// Total International Usage
			// ==========================================
			// REMOVED $this->db->_reset_select(); from here as well

			$this->db->select(
			    "GROUP_CONCAT(DISTINCT rollno ORDER BY rollno SEPARATOR ', ') AS rollnos,
			     SUM(calculated_cost) AS total_international_usage",
			    FALSE
			);

			$this->db->from('isdbills');

			if (!empty($start_date) && !empty($end_date))
			{
			    $this->db->where('datetime >=', $start_date . ' 00:00:00');
			    $this->db->where('datetime <=', $end_date . ' 23:59:59');
			}

			$query = $this->db->get();

			$result = $query->row_array();


			$total_international_usage = $result['total_international_usage'] ?? 0;
			$rollnos = $result['rollnos'] ?? '';

				  
		        // Formula block 2: else
		        $part_i   = ($count_B - $count_C) * $rate_local;
		        $part_ii  = $count_C * $service_rate;
		        $part_iii = $total_international_usage;

		        $total_bill = $part_i + $part_ii + $part_iii;


		        // Bill Calculation:
		        // Z x Rate Local = A'
		        $bill_a = $part_i;

		        // Y x Rate International = B'
		        $bill_b = $part_ii;

		        // Total = C'
		        $bill_total = $total_bill;

	        // Your billing logic here
	    }
	    $invoice_data = array(
	    'school_name'           => 'Birla School Pilani (Raj.)',
	    'invoice_number'        => $invoice_number,
	    'invoice_date'          => date('d M Y', strtotime($invoice_date)),
	    'billing_month'         => date('F Y', strtotime($year.'-'.$month.'-01')),

	    'national_users'        => $total_national,
	    'international_users'   => $total_international,

	    'national_rate'         => $rate_local,
	    'international_rate'    => $rate_international,

	    'national_amount'       => $bill_a,
	    'international_amount'  => $bill_b,
	    'total_international_usage'  => $bill_c,

	    'grand_total'           => $bill_total,
	    'description'           => $billing_description
	);
	    $invoice_data['amount_in_words'] = ucwords(
    $this->convert_number_to_words((int)$bill_total)
) . ' Only';
	    $insertData = array(
	    'GenratedOn'              => date('Y-m-d H:i:s'),
	    'GenratedBy' 			  => $this->session->userdata('username'),

	    'InvoiceMonth'            => $month,

	    'NationalUserActive'      => $total_national,
	    'IntUser_Active'          => $total_international,
	    'National_Int_Active'     => $counter_check,

	    'InternationalRollNumber' => isset($international_roll_numbers)
	                                    ? implode(',', $international_roll_numbers)
	                                    : '',

	    'National_CDR'            => $bill_a,
	    'IntUer_CDR'              => $bill_b,
	    'National_Int_CDR'        => $bill_total,

	    'TotalNumberOfCall'       => $total_calls ?? 0,
	    'TotalMinuteConsumed'     => $total_minutes ?? 0,

	    'TotalAmount'             => $bill_total
	);

	$this->db->insert('invoice', $insertData);

	$invoice_id = $this->db->insert_id();
	$pdf_link = $this->generate_invoice_pdf($invoice_data, $invoice_id);

	$this->db->where('id', $invoice_id)
	         ->update('invoice', array('InvoicePdfLink' => $pdf_link));
	}

	private function convert_number_to_words($number)
	{
	    $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	    return $formatter->format($number);
	}
	/** AJAX partial: live rows for new/dashboard Live Calling section */
	public function live_callers()
	{
		$data['callers'] = $this->dashboard_model->live_caller();
		$this->load->view('new/livecallers', $data);
	}

	public function home() {
		$data = $this->dashboard_model->get_home_data();
		$this->load->view('new/dashboard', $data);
	}
}
