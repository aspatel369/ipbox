<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	function __construct() {
	        parent::__construct();
	        date_default_timezone_set('Asia/Calcutta');
	        $this->load->model('report_model', 'report_model', TRUE);
	        $this->load->model('global_pagination', 'global_pagination', TRUE);
	        $this->load->library("session");
			 
	}
	public function user_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

	   		if(@($this->session->userdata('student_id'))){
				 $this->session->unset_userdata('student_id');
	     		}
	      		if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('source'))){
				$this->session->unset_userdata('source');
	      	}
	      	if(@($this->session->userdata('status'))){
				$this->session->unset_userdata('status');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
         	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('source', $this->input->post('source'));            
              $this->session->set_userdata('status', $this->input->post('status'));            
        }

          $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->session->userdata('from_date'); 
          $search['to_date'] = $this->session->userdata('to_date'); 
          $search['source'] = $this->session->userdata('source'); 
          $search['status'] = $this->session->userdata('status'); 
         	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			  $headers['header'] = array("Date and Time", "RollNumber","PhoneNumber","Source","Status","Duration");
			  
			$start = 0; 
			 $limit = $this->report_model->report_count($search);
			  $generateCsv  = $this->report_model->report_exportdetails($search); 
			  $result_array=array_merge($headers,$generateCsv); 
			  $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			  array_to_csv($result_array,$filenamecsv);
			}
         $page_url = base_url() . "index.php/report/user_report";
          $total_users = $this->report_model->report_count($search);

		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details($result_per_page,$result_page, $search);
		 // exit;
		 $data['source'] = $this->report_model->sourceDropDown();
		 $data['links'] = $this->pagination->create_links();
         $this->load->view('user_report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}

	public function house_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }

       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->input->post('fromdate'); 
          $search['to_date'] = $this->input->post('todate'); 
          $search['house'] = $this->input->post('house');
          // print_r( $this->input->post('house'));
          // die(); 
      //    $search['status'] = $this->session->userdata('status'); 
         // FIX: Look for exact text string value matched by the browser button submit element
       
        if ($this->input->post('report_export_data') === "Export") { 
            
            $filenamecsv = 'House_report_' . date('d-M-y-H-i-s') . '.csv';
            
            // Clear system buffers to completely prevent data corruption risks
            if (ob_get_level()) {
                ob_clean();
            }
            
            // Set dynamic download wrapper headers
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filenamecsv . '"');
            
            $output = fopen('php://output', 'w');
            
            // Structure clear, clean sheet column header lines
            $headers = array("Unique Id", "Student Name", "House", "Roll No", "Called No.", "Duration (Min)", "Cost", "Start Time", "End Time");
            fputcsv($output, $headers);
            
            // Query specific structural array data lines
            $generateCsv = $this->report_model->report_exportdetails_house($search); 

            if (!empty($generateCsv)) {
                foreach ($generateCsv as $row) {
                    // Normalize and replicate calculations as seen on view UI
                    $durationMin = round($row['FullCallLength'] / 60, 2) . ' Min';
                    $costFormatted = number_format($row['cost'], 2);

                    // Rebuild row parameters strictly aligned with header indexes
                    $csvRow = array(
                        $row['uniqueid'],
                        $row['name'],
                        $row['house_name'],
                        $row['roll_no'],
                        $row['MobileNumber'],
                        $durationMin,
                        $costFormatted,
                        date('d-m-Y H:i:s', strtotime($row['start_time'])),
                        date('d-m-Y H:i:s', strtotime($row['end_time']))
                    );

                    fputcsv($output, $csvRow);
                }
            }
            
            fclose($output);
            exit;
        }
         $page_url = base_url() . "index.php/report/house_report";
          $total_users = $this->report_model->report_count_house($search);

		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_house($result_per_page,$result_page, $search);
         // print_r($data['reportDetails']);
         // die();
		 // exit;
		 $data['house'] = $this->report_model->houseDropDown();
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
		 $data['search'] = $search;
         $this->load->view('new/manage-house_report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}

	public function  peak_usage_reports()
	{	 
			$sessionValues = $this->session->userdata('logged_in');

            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

				if(@($this->session->userdata('from_date'))){
					$this->session->unset_userdata('from_date');
		      	}	
		      	if(@($this->session->userdata('to_date'))){
					$this->session->unset_userdata('to_date');
		      	}
		      	if(@($this->session->userdata('house'))){
					$this->session->unset_userdata('house');
		      	}
		     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }

       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->input->post('fromdate'); 
          $search['to_date'] = $this->input->post('todate'); 
          $search['house'] = $this->input->post('house');
          // print_r( $this->input->post('house'));
          // die(); 
      //    $search['status'] = $this->session->userdata('status'); 


        if ($this->input->post('report_export_data') === "Export") { 
            
            $filenamecsv = 'Peak_report_' . date('d-M-y-H-i-s') . '.csv';
            
            // Clear system buffers to completely prevent data corruption risks
            if (ob_get_level()) {
                ob_clean();
            }
            
            // Set dynamic download wrapper headers
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filenamecsv . '"');
            
            $output = fopen('php://output', 'w');
            
            // Structure clear, clean sheet column header lines
            $headers = array("Date", "Max Concurrent Calls");
            fputcsv($output, $headers);
            
            // Query specific structural array data lines
            $generateCsv = $this->report_model->report_exportdetails_peak($search); 

            if (!empty($generateCsv)) {
                foreach ($generateCsv as $row) {
                	 $call_date = !empty($row['call_date']) 
                                                ? date('d-m-Y', strtotime($row['call_date']))
                                                : '-';
                    // Rebuild row parameters strictly aligned with header indexes
                    $csvRow = array(
                        $call_date,
                        $row['max_calls']
                    );

                    fputcsv($output, $csvRow);
                }
            }
            
            fclose($output);
            exit;
        }

         
         $page_url = base_url() . "index.php/report/house_report";
          $total_users = $this->report_model->report_count_peak($search);

		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_peak($result_per_page,$result_page, $search);
         
      $chart_dates = [];
      $chart_calls = [];
      $TotalCallsToday = [];
      $TotalMinutesConsumedToday = [];
      $TotalUniqueStudentCalledToday = [];
      $TotalUniqueExtensionUsedToday = [];
      if (!empty($data['reportDetails'])) {
          foreach ($data['reportDetails'] as $row) {

              $chart_dates[] = date('d-m-Y', strtotime($row['call_date']));
              $chart_calls[] = (int)$row['max_calls'];
              $TotalCallsToday[] = (int)$row['TotalCallsToday'];
              $TotalMinutesConsumedToday[] = (int)$row['TotalMinutesConsumedToday'];
              $TotalUniqueStudentCalledToday[] = (int)$row['TotalUniqueStudentCalledToday'];
              $TotalUniqueExtensionUsedToday[] = (int)$row['TotalUniqueExtensionUsedToday'];
          }
      }
      $data['chart_dates'] = json_encode($chart_dates);
      $data['chart_calls'] = json_encode($chart_calls);
      $data['TotalCallsToday'] = json_encode($TotalCallsToday);
      $data['TotalMinutesConsumedToday'] = json_encode($TotalMinutesConsumedToday);
      $data['TotalUniqueStudentCalledToday'] = json_encode($TotalUniqueStudentCalledToday);
      $data['TotalUniqueExtensionUsedToday'] = json_encode($TotalUniqueExtensionUsedToday);
		 $data['house'] = $this->report_model->houseDropDown();
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
		 $data['search'] = $search;

         $this->load->view('new/manage-peak_report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}
	
	public function devices_ping_reports()
	{	 
			$sessionValues = $this->session->userdata('logged_in');

            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

				if(@($this->session->userdata('from_date'))){
					$this->session->unset_userdata('from_date');
		      	}	
		      	if(@($this->session->userdata('to_date'))){
					$this->session->unset_userdata('to_date');
		      	}
		      	if(@($this->session->userdata('house'))){
					$this->session->unset_userdata('house');
		      	}
		     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }

       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->input->post('fromdate'); 
          $search['to_date'] = $this->input->post('todate'); 
          $search['house'] = $this->input->post('house');
          // print_r( $this->input->post('house'));
          // die(); 
      //    $search['status'] = $this->session->userdata('status'); 
   //       	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			//   $headers['header'] = array("Date and Time","Name","RollNumber","PhoneNumber","Source","Status","Duration");
			  
			// $start = 0; 
			//  $limit = $this->report_model->report_count_devices_ping($search);
			//   $generateCsv  = $this->report_model->report_exportdetails_devices_ping($search); 
			//   $result_array=array_merge($headers,$generateCsv); 
			//   $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			//   array_to_csv($result_array,$filenamecsv);
			// }

        if ($this->input->post('report_export_data') === "Export") { 
            
            $filenamecsv = 'Devices_ping_' . date('d-M-y-H-i-s') . '.csv';
            
            // Clear system buffers to completely prevent data corruption risks
            if (ob_get_level()) {
                ob_clean();
            }
            
            // Set dynamic download wrapper headers
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filenamecsv . '"');
            
            $output = fopen('php://output', 'w');
            
            // Structure clear, clean sheet column header lines
            $headers = array("Device Name", "Device Location","IP Address","Last Ping Request","Last Ping Positive Response","Last Negative Response","Status","RefreshedAt");
            fputcsv($output, $headers);
            
            // Query specific structural array data lines
            $generateCsv = $this->report_model->report_exportdetails_devices_ping($search); 

            if (!empty($generateCsv)) {
                foreach ($generateCsv as $row) {
                	 $LastPingRequest = (!empty($row['LastPingRequest']) && $row['LastPingRequest'] != "0000-00-00 00:00:00")
                                                ? date('d-m-Y h:i A', strtotime($row['LastPingRequest']))
                                                : '-'; 
                     $LastPingPositiveResponse = (!empty($row['LastPingPositiveResponse']) && $row['LastPingPositiveResponse'] != "0000-00-00 00:00:00")
                                                ? date('d-m-Y h:i A', strtotime($row['LastPingPositiveResponse']))
                                                : '-'; 

                     $LastNegativeResponse =  (!empty($row['LastNegativeResponse']) && $row['LastNegativeResponse'] != "0000-00-00 00:00:00")
                                                ? date('d-m-Y h:i A', strtotime($row['LastNegativeResponse']))
                                                : '-';
                     $RefreshedAt =  !empty($row['RefreshedAt']) 
                                                ? date('d-m-Y h:i A', strtotime($row['RefreshedAt']))
                                                : '-';
                    // Rebuild row parameters strictly aligned with header indexes
                    $csvRow = array(
                        $row['DeviceName'],
                        $row['DeviceLocation'],
                        $row['IPAddress'],
                        $LastPingRequest,
                        $LastPingPositiveResponse,
                        $LastNegativeResponse,
                        $row['Status'],
                        $RefreshedAt
                    );

                    fputcsv($output, $csvRow);
                }
            }
            
            fclose($output);
            exit;
        }
         $page_url = base_url() . "index.php/report/house_report";
          $total_users = $this->report_model->report_count_devices_ping($search);
          
		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_devices_ping($result_per_page,$result_page, $search);
         
		 $data['house'] = $this->report_model->houseDropDown();
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
		 $data['search'] = $search;
		
         $this->load->view('new/manage-devices_ping',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}
	
	public function low_usage_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }
       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->session->userdata('from_date'); 
          $search['to_date'] = $this->session->userdata('to_date'); 
          $search['house'] = $this->session->userdata('house'); 
      //    $search['status'] = $this->session->userdata('status'); 
   //       	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			//   $headers['header'] = array("Date and Time","Name","RollNumber","PhoneNumber","Source","Status","Duration");
			  
			// $start = 0; 
			//  $limit = $this->report_model->report_count_house($search);
			//   $generateCsv  = $this->report_model->report_exportdetails_house($search); 
			//   $result_array=array_merge($headers,$generateCsv); 
			//   $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			//   array_to_csv($result_array,$filenamecsv);
			// }
         $page_url = base_url() . "index.php/report/loe_usage_report";
          $total_users = $this->report_model->report_count_low_usage_report($search);


		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_low_usage_report($result_per_page,$result_page, $search);
        
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
         $this->load->view('new/manage-low-usage-report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}
	public function behavior_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	      	if(@($this->session->userdata('days'))){
				$this->session->unset_userdata('days');
	      	}
	      	if(@($this->session->userdata('per'))){
				$this->session->unset_userdata('per');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }
       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->input->post('fromdate'); 
          $search['to_date'] = $this->input->post('todate'); 
          $search['type'] = $this->input->post('type'); 
          $search['house'] = $this->input->post('house'); 
           
          $search['per'] = $this->input->post('per'); 
          if($search['type'] === "not_called"){
          	$search['days'] = $this->input->post('days');
          	$search['from_date'] = date('Y-m-d', strtotime('-' . $search['days'] . ' days'));
          	$search['to_date'] = date('Y-m-d'); 
          }
          if ($this->input->post('report_export_data') === "Export") { 
            
            $filenamecsv = 'Behavior_report_' . date('d-M-y-H-i-s') . '.csv';
            
            // Clear system buffers to completely prevent data corruption risks
            if (ob_get_level()) {
                ob_clean();
            }
            
            // Set dynamic download wrapper headers
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filenamecsv . '"');
            
            $output = fopen('php://output', 'w');
            
            // Structure clear, clean sheet column header lines
            $headers = array("Student Name", "Roll No", "House", "Last Call");
            fputcsv($output, $headers);
            
            // Query specific structural array data lines
            $generateCsv = $this->report_model->report_exportdetails_behavior_report($search); 

            if (!empty($generateCsv)) {
                foreach ($generateCsv as $row) {

                    // Rebuild row parameters strictly aligned with header indexes
                    $csvRow = array(
                        $row['student_name'],
                        $row['roll_no'],
                        $row['house_name'],
                        $row['last_call_date']
                    );

                    fputcsv($output, $csvRow);
                }
            }
            
            fclose($output);
            exit;
        }
      //    $search['status'] = $this->session->userdata('status'); 
   //       	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			//   $headers['header'] = array("Date and Time","Name","RollNumber","PhoneNumber","Source","Status","Duration");
			  
			// $start = 0; 
			//  $limit = $this->report_model->report_count_house($search);
			//   $generateCsv  = $this->report_model->report_exportdetails_house($search); 
			//   $result_array=array_merge($headers,$generateCsv); 
			//   $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			//   array_to_csv($result_array,$filenamecsv);
			// }
         $page_url = base_url() . "index.php/report/behavior_report";
          $total_users = $this->report_model->report_count_behavior_report_report($search);


		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);

         $data['reportDetails'] = $this->report_model->get_report_Details_behavior_report_report($result_per_page,$result_page, $search);

		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
		 $data['search'] = $search;
         $this->load->view('new/behavior-report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}

	public function high_usage_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }
       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->session->userdata('from_date'); 
          $search['to_date'] = $this->session->userdata('to_date'); 
          $search['house'] = $this->session->userdata('house'); 
      //    $search['status'] = $this->session->userdata('status'); 
   //       	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			//   $headers['header'] = array("Date and Time","Name","RollNumber","PhoneNumber","Source","Status","Duration");
			  
			// $start = 0; 
			//  $limit = $this->report_model->report_count_house($search);
			//   $generateCsv  = $this->report_model->report_exportdetails_house($search); 
			//   $result_array=array_merge($headers,$generateCsv); 
			//   $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			//   array_to_csv($result_array,$filenamecsv);
			// }
         $page_url = base_url() . "index.php/report/loe_usage_report";
          $total_users = $this->report_model->report_count_high_usage_report($search);


		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_high_usage_report($result_per_page,$result_page, $search);
        
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
         $this->load->view('new/manage-high-usage-report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}
	public function not_usage_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }
       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->session->userdata('from_date'); 
          $search['to_date'] = $this->session->userdata('to_date'); 
          $search['house'] = $this->session->userdata('house'); 
      //    $search['status'] = $this->session->userdata('status'); 
   //       	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			//   $headers['header'] = array("Date and Time","Name","RollNumber","PhoneNumber","Source","Status","Duration");
			  
			// $start = 0; 
			//  $limit = $this->report_model->report_count_house($search);
			//   $generateCsv  = $this->report_model->report_exportdetails_house($search); 
			//   $result_array=array_merge($headers,$generateCsv); 
			//   $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			//   array_to_csv($result_array,$filenamecsv);
			// }
         $page_url = base_url() . "index.php/report/loe_usage_report";
          $total_users = $this->report_model->report_count_not_usage_report($search);


		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_not_usage_report($result_per_page,$result_page, $search);
        
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
         $this->load->view('new/manage-not-usage-report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}

	public function balance_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }

       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->session->userdata('from_date'); 
          $search['to_date'] = $this->session->userdata('to_date'); 
          $search['house'] = $this->session->userdata('house'); 
      //    $search['status'] = $this->session->userdata('status'); 
         	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			  $headers['header'] = array("Student Name","Roll No","Date & Time","Prev Balance","Added Balance","Current Balance","House");
			  
			$start = 0; 
			 $limit = $this->report_model->report_count_balance($search);
			  $generateCsv  = $this->report_model->report_exportdetails_balance($search); 
			  $result_array=array_merge($headers,$generateCsv); 
			  $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			  array_to_csv($result_array,$filenamecsv);
			}
         $page_url = base_url() . "index.php/report/house_report";
          $total_users = $this->report_model->report_count_house($search);

		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_balance($result_per_page,$result_page, $search);
         // print_r($data['reportDetails']);
         // die();
		 // exit;
		 $data['house'] = $this->report_model->houseDropDown();
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
         $this->load->view('balance_report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}


	public function extension_report()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

		    $getv = $this->input->get_post('q', TRUE); 

		    if($getv == 'dW5zZXQw'){ 

			if(@($this->session->userdata('from_date'))){
				$this->session->unset_userdata('from_date');
	      	}	
	      	if(@($this->session->userdata('to_date'))){
				$this->session->unset_userdata('to_date');
	      	}
	      	if(@($this->session->userdata('house'))){
				$this->session->unset_userdata('house');
	      	}
	     }

	     if ($this->input->post('report_submit_data') == "Search") {
        // 	  $this->session->set_userdata('student_id', $this->input->post('student_id'));
              $this->session->set_userdata('from_date', $this->input->post('fromdate'));
            $this->session->set_userdata('to_date', $this->input->post('todate'));
              $this->session->set_userdata('house', $this->input->post('house'));            
           //   $this->session->set_userdata('status', $this->input->post('status'));            
        }

       //   $search['student_id'] = $this->session->userdata('student_id');
          $search['from_date'] = $this->input->post('fromdate'); 
          $search['to_date'] = $this->input->post('todate'); 
          $search['house'] = $this->session->userdata('house'); 
      //    $search['status'] = $this->session->userdata('status'); 
         	if($this->input->post('report_export_data') == "Export_to_Csv"){ 
			  $headers['header'] = array("Student Name","Roll No","Date & Time","Prev Balance","Added Balance","Current Balance","House");
			  
			$start = 0; 
			 $limit = $this->report_model->report_count_extension($search);
			  $generateCsv  = $this->report_model->report_exportdetails_extension($search); 
			  $result_array=array_merge($headers,$generateCsv); 
			  $filenamecsv = 'CDR_report'.date('d-M-y-H-i-s').'.csv';
			  array_to_csv($result_array,$filenamecsv);
			}
         $page_url = base_url() . "index.php/report/extension_report";
          $total_users = $this->report_model->report_count_house($search);

		 $result_per_page = 25;
             $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
         $data['reportDetails'] = $this->report_model->get_report_Details_extension($result_per_page,$result_page, $search);
         $extensions = [];
    	$total_use_min = [];
    	$total_usage_past_3Months = [];
    	$total_usage_past_ThisMonths = [];
    	$total_usage_past_Thisweek = [];

    foreach ($data['reportDetails'] as $row) {
    	if(!empty($row['extension_number'])){
        	$extensions[] = $row['extension_number'];
        	$string = $row['TotalUsageTillDate'];
			preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $string, $matches);
        	$past3month = $row['TotalUsagePast3Months'];
			preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $past3month, $past3monthmatches);
        	$TotalUsageThisMonth = $row['TotalUsageThisMonth'];
			preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $TotalUsageThisMonth, $TotalUsageThisMonthmatches);
        	$TotalUsageThisWeek = $row['TotalUsageThisWeek'];
			preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $TotalUsageThisWeek, $TotalUsageThisWeekmatches);
			// $total_use = round($matches[0] / 60) . " Min";
        	// Convert seconds to minutes for a cleaner chart
        	$total_call[] = $matches[2];
        	$total_usage_past_3Months[] = $past3monthmatches[2];
        	$total_usage_past_ThisMonths[] = $TotalUsageThisMonthmatches[2];
        	$total_usage_past_Thisweek[] = $TotalUsageThisWeekmatches[2];
    	}
    }
    $data['chart_categories'] = json_encode($extensions);
    $data['chart_series'] = json_encode($total_call);
    $data['chart_series_3Months'] = json_encode($total_usage_past_3Months);
    $data['chart_series_ThisMonths'] = json_encode($total_usage_past_ThisMonths);
    $data['chart_series_Thisweek'] = json_encode($total_usage_past_Thisweek);
         // print_r($data['reportDetails']);
         // die();
		 // exit;
		 $data['house'] = $this->report_model->houseDropDown();
		// var_dump($data['source']);die;
		 $data['links'] = $this->pagination->create_links();
		 $data['search'] = $search;
         $this->load->view('new/manage-extension-report',$data);		


			}
		else
		{
			redirect('admin/logout');
		}
	}
public function server_performance_report()
  {  
      $sessionValues = $this->session->userdata('logged_in');
            if ($this->session->userdata('logged_in')) { 

        $getv = $this->input->get_post('q', TRUE); 

       
         $data['reportDetails'] = $this->report_model->get_report_Details_server_performance();
         $datetime = []; 
         $cpu_load_1min = [];
         $cpu_load_5min = [];
         $cpu_load_15min = [];
         $ram_total_mb = [];
         $ram_used_mb = [];
         $ram_free_mb = [];
         $disk_total_gb = [];
         $disk_used_gb = [];
         $disk_free_percentage = [];
         $network_rx_kbps = [];
         $network_tx_kbps = [];
         foreach ($data['reportDetails'] as $key => $value) {
           $datetime[] = $value['timestamp'];
           $cpu_load_1min[] = $value['cpu_load_1min'];
           $cpu_load_5min[] = $value['cpu_load_5min'];
           $cpu_load_15min[] = $value['cpu_load_15min'];
           $ram_total_mb[] = $value['ram_total_mb'];
           $ram_used_mb[] = $value['ram_used_mb'];
           $ram_free_mb[] = $value['ram_free_mb'];
           $disk_total_gb[] = $value['disk_total_gb'];
           $disk_used_gb[] = $value['disk_used_gb'];
           $disk_free_percentage[] = $value['disk_free_percentage'];
           $network_rx_kbps[] = $value['network_rx_kbps'];
           $network_tx_kbps[] = $value['network_tx_kbps'];

         }
          $data['datetime'] = $datetime;
          $data['cpu_load_1min'] = $cpu_load_1min;
          $data['cpu_load_5min'] = $cpu_load_5min;
          $data['cpu_load_15min'] = $cpu_load_15min;
          $data['ram_total_mb'] = $ram_total_mb;
          $data['ram_used_mb'] = $ram_used_mb;
          $data['ram_free_mb'] = $ram_free_mb;
          $data['disk_total_gb'] = $disk_total_gb;
          $data['disk_used_gb'] = $disk_used_gb;
          $data['disk_free_percentage'] = $disk_free_percentage;
          $data['network_rx_kbps'] = $network_rx_kbps;
          $data['network_tx_kbps'] = $network_tx_kbps;
         $this->load->view('new/manage-server-performance-report',$data);   


      }
    else
    {
      redirect('admin/logout');
    }
  }

	public function userreport()
	{	 
	
		$this->load->view('user_report');	
	}
	public function saveDevice() {
		$formData = $this->input->post();

        $deviceData['id'] = $formData['id'];
        $deviceData['DeviceName'] = $formData['device_name'];
        $deviceData['DeviceLocation'] = $formData['device_location'];
        $deviceData['IPAddress'] = $formData['ip_address'];
		
		if(isset($formData['id']) && $formData['id'] > 0) {

			$id = $formData['id'];
			unset($formData['id']);

			$status = $this->db->where('id', $id)->update('DevicesAndPingStatus', $deviceData);
		}
		else {
			$status = $this->db->insert('DevicesAndPingStatus', $deviceData);
            $insert_id = $this->db->insert_id();
		}
		redirect('report/devices_ping_reports');
	}
	public function deleteDevice($id) {
		$sql = "DELETE FROM DevicesAndPingStatus WHERE ROLLNO = $id";
		$this->db->query($sql);
		redirect('report/devices_ping_reports');
	}
  public function deletebehaviourRecord($id) {
    $sql = "DELETE FROM CallLogs WHERE ROLLNO = $id";
    $this->db->query($sql);
    redirect('report/behavior_report');
  }
	public function getdevice($id) {
		$this->db->select("
        Id,DeviceName, DeviceLocation, IPAddress
    ", FALSE); // IMPORTANT → prevents escaping issues

    $this->db->from('DevicesAndPingStatus');
    $this->db->where('Id', $id);
    $data = $this->db->get()->result_array();
		// $data = $this->houses_model->getData($id);
		echo json_encode($data[0]);
	}
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>