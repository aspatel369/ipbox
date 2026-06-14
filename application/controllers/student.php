<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Student extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		$this->load->model('student_model', 'student_model', TRUE);
		$this->load->model('house_model', 'house_model', TRUE);
		$this->load->model('global_pagination', 'global_pagination', TRUE);
		$this->load->library("session");

	}

	public function studentmanagement_view()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$getv = $this->input->get_post('q', TRUE);
			if ($getv == 'dW5zZXQw') {
				if (@($this->session->userdata('searchname'))) {
					$this->session->unset_userdata('searchname');
				}
				if (@($this->session->userdata('searchnumber'))) {
					$this->session->unset_userdata('searchnumber');
				}
				if (@($this->session->userdata('searchhouse'))) {
					$this->session->unset_userdata('searchhouse');
				}
			}
			if ($this->input->post('student_submit_data') == "Search") {
				$this->session->set_userdata('searchname', $this->input->post('searchName'));
				$this->session->set_userdata('searchnumber', $this->input->post('searchNumber'));
				$this->session->set_userdata('searchhouse', $this->input->post('searchHouse'));
			}
			$search['searchname'] = $this->session->userdata('searchname');
			$search['searchnumber'] = $this->session->userdata('searchnumber');
			$search['searchhouse'] = $this->session->userdata('searchhouse');
			if ($this->input->post('student_export_data') == "Export_to_Csv") {
				$headers['header'] = array("StudentName", "RollNumber", "HouseName", "total_points", "week_points", "option1", "option2", "option3", "option4", "option5");
				$start = 0;
				$limit = $this->student_model->export_studentDetails_count($search);
				$generateCsv = $this->student_model->export_studentDetails($search);
				$result_array = array_merge($headers, $generateCsv);
				$filenamecsv = 'Student_Details' . date('d-M-y-H-i-s') . '.csv';
				array_to_csv($result_array, $filenamecsv);
			}
			$page_url = base_url() . "index.php/student/studentmanagement_view";
			$total_users = $this->student_model->count_Student_Details($search);
			$result_per_page = 25;
			$result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);
			$data['house'] = $this->house_model->get_House();
			$data['studentDetails'] = $this->student_model->get_Student_Details($result_per_page, $result_page, $search);
			//exit;
			$data['links'] = $this->pagination->create_links();
			//upload session
			$data['error'] = $this->session->userdata('student_error');
			$this->session->unset_userdata('student_error');
			$this->load->view('studentmanagement_view', $data);
		} else {
			redirect('admin/logout');
		}
	}

	public function createStudentDetails()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$this->form_validation->set_rules('studentName', 'studentName', 'trim|required');
			$this->form_validation->set_rules('rollNumber', 'rollNumber', 'trim|required');
			$this->form_validation->set_rules('pinNumber', 'Pin', 'trim|required');
			$this->form_validation->set_rules('houseName', 'houseName', 'trim|required');

			$data['studentName'] = $this->input->post('studentName');
			$data['rollNumber'] = $this->input->post('rollNumber');
			$data['pinNumber'] = $this->input->post('pinNumber');
			$data['house'] = $this->input->post('houseName');
			$data['points'] = $this->input->post('points');
			//$extraPoint = $data['points'];
			$data['totalPoints'] = $this->house_model->getPoints($data);
			$result = $data['totalPoints'];
			$data['pointValue'] = $result[0]['points'];
			// 	$data['totalPoints'] = $result[0]['points'] + $extraPoint;
			// 	$point = $pointValue/4;
			// }
			$data['rollNumber'];
			// $pointValue = $data['points'];
			//$data['totalPoints'] = $data['points'];
			$data['point'] = $data['pointValue'] / 4;
			//$data['splittedPoint'] = round($point);
			$data['one'] = $this->input->post('one');
			$data['two'] = $this->input->post('two');
			$data['three'] = $this->input->post('three');
			$data['four'] = $this->input->post('four');
			$data['five'] = $this->input->post('five');
			$data['status'] = $this->input->post('status');
			$data['dob'] = $this->input->post('dob');
			$this->student_model->create_StudentDetails($data);
			redirect('student/studentmanagement_view');
		} else {
			redirect('admin/logout');
		}
	}
	public function editStudentName()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$editname = stripslashes($this->input->post('editstudentName'));
			$id = stripslashes($this->input->post('id'));
			$checkQueueExist = $this->student_model->editStudentName($editname, $id);
			if (empty($checkQueueExist)) {
				echo "true";
			} else {
				echo "false";
			}
		} else {
			redirect('admin/logout');
		}
	}


	public function uploadStudentDetails()
	{
		if ($_FILES["file"]["error"] > 0) {
			$error['error'] = "Error: " . $_FILES["file"]["error"] . "<br>";
			$this->load->view('studentmanagement_view');
		} else {
			$fname_ext = $_FILES["file"]["name"];
			$fname = $_FILES["file"]["tmp_name"];
			$chk_ext = explode(".", $fname_ext);
			if (strtolower($chk_ext[0]) == "student_create") {
				if (strtolower($chk_ext[1]) == "csv") {
					$filename = $_FILES["file"]["tmp_name"];
					$handle = fopen($filename, "r");
					$i = 0;
					$record_array = array();
					$count = 0;
					$counts = 0;
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						var_dump(stripslashes($data[0]));
						if ($i != 0) {
							$count1 = $this->student_model->dupChecking(stripslashes($data[0]));
							$record_insert['roll_no'] = '';
							if ($count1 == true) {
								$record_insert['roll_no'] = stripslashes($data[0]);
								$roll = strlen($record_insert['roll_no']);
							}
							$record_insert['name'] = stripslashes($data[1]);
							$record_insert['pin_number'] = stripslashes($data[2]);
							$record_insert['house'] = stripslashes($data[3]);
							$record_insert['option1'] = stripslashes($data[4]);
							$record_insert['option2'] = stripslashes($data[5]);
							$record_insert['option3'] = stripslashes($data[6]);
							$record_insert['option4'] = stripslashes($data[7]);
							$record_insert['option5'] = stripslashes($data[8]);
							$record_insert['points'] = stripslashes($data[9]);
							$record_insert['status'] = stripslashes($data[10]);

							//$record_insert['houseName'] = stripslashes($data[3]); 
							//$extraPoint = stripslashes($data[9]);

							//$data['totalPoints'] = $this->user->getPoints($record_insert);            
							//// $result = $data['totalPoints'];
							//$point='';
							//$record_insert['totalPoints'] = '';
							//if ($extraPoint != ''){
							//}

							//	else if($result)
							//{
							//$pointValue = $result[0]['points'];
							//$record_insert['totalPoints'] = $result[0]['points'];
							//$point = $pointValue/4;
							//	} 

							if (($record_insert['roll_no'] != '' && $record_insert['name'] != '' && $record_insert['pin_number'] != '' && $record_insert['house'] != '' && $record_insert['option1'] != '' && $record_insert['option2'] != '' && $record_insert['points'] != '')) {

								$this->student_model->phone_upload($record_insert);

								$counts = $counts + 1;

							} else {

								$count_resons = $count + 1;
								$count = $count_resons . "Roll number already exists";
							}

						}
						$i += 1;
					}
					?>

					<script>
						alert('uploaded :<?php echo $counts ?> \n skipped :<?php echo $count ?> ');
						// return false;
						window.location.href = './studentmanagement_view';
					</script>
					<?php

				} else {

					?>
					<script>
						alert('sorry,your file is not a csv file.Unable to upload');
						window.location.href = './studentmanagement_view';
					</script>

					<?php

				}
			} else {

				?>
				<script>
					alert('sorry,your file name should be student_create.csv');
					window.location.href = './studentmanagement_view';
				</script>

				<?php

			}
		}
		//$session = $this->session->userdata('logged_in');
		//$user = $session['userid'];

		//$this->vb->userlogPhbook($user);  


		//} 
	}
	// else
// {
//   redirect('admin/uploadHouseDetails');
// }



	public function getStudentEditValues()
	{

		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$id = $this->input->post('id');
			$data1 = $this->student_model->getStudent_EditValues($id);
			$data2 = $this->house_model->get_HouseDropdown();
			$response = array($data1, $data2);

			echo json_encode($response);

		} else {
			redirect('admin/logout');
		}

	}

	public function updateStudentDetails()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$data['id'] = $this->input->post('hiddenValues');
			$data['name'] = $this->input->post('editstudentName');
			$data['rollnumber'] = $this->input->post('editrollNumber');
			$data['pinno'] = $this->input->post('editpinNumber');
			$data['house'] = $this->input->post('editHousename');
			if ($this->input->post('editpoints') <> '') {
				$data['points'] = $this->input->post('editpoints');
			} else {
				$data['points'] = 0;
			}
			//$data['editadd'] = $this->input->post('editadd');		
			//$data['editminus'] = $this->input->post('editminus');
			//$data['pointsMinus'] = $this->input->post('editpointsMinus');
			$data['one'] = $this->input->post('editone');
			$data['two'] = $this->input->post('edittwo');
			$data['three'] = $this->input->post('editthree');
			$data['four'] = $this->input->post('editfour');
			$data['five'] = $this->input->post('editfive');
			$data['status'] = $this->input->post('editStatus');
			$data['dob'] = $this->input->post('editdob');
			//$data['total_points'] = $this->input->post('totalPts');
			//$data['weekPts'] = $this->input->post('weekPts');
			//$data['spent_points'] = $this->input->post('spentPts');
			//$data['available_points'] = $this->input->post('availablePts');

			//var_dump($data);
			$this->student_model->update_StudentDetails($data);
			redirect('student/studentmanagement_view');

		} else {
			redirect('admin/logout');
		}
	}

	public function studentDelete()
	{

		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$id = $this->input->post('student_delete_id');

			$data2 = $this->student_model->student_Delete($id);

		} else {
			redirect('admin/logout');
		}

	}

	public function checkStudent()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$rollnum = stripslashes($this->input->post('rollNumber'));

			$checkstudent = $this->student_model->checkStudent($rollnum);

			if (empty($checkstudent)) {
				echo "true";
			} else {
				echo "false";
			}

		} else {
			redirect('admin/logout');
		}
	}


	public function checkStudentName()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$student_name = stripslashes($this->input->post('studentName'));

			$checkstudent = $this->student_model->checkStudentName($student_name);

			if (empty($checkstudent)) {
				echo "true";
			} else {
				echo "false";
			}

		} else {
			redirect('admin/logout');
		}
	}

	public function CheckPinNum()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$pinNum = stripslashes($this->input->post('pinNumber'));

			$checkPin = $this->student_model->checkPinNum($pinNum);

			if (empty($checkPin)) {
				echo "true";
			} else {
				echo "false";
			}

		} else {
			redirect('admin/logout');
		}
	}
	public function studentSampleFile()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$headers['header'] = array("rollnumber", "studentname", "pinnumber", "housecode", "option1", "option2", "option3", "option4", "option5", "Points", "Status");
			$filename = 'student_create.csv';
			array_to_csv($headers, $filename);

		} else {
			redirect('admin/logout');
		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>