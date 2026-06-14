<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		$this->load->model('user', 'user', TRUE);
		$this->load->model('global_pagination', 'global_pagination', TRUE);
		$this->load->library("session");
	}

	public function index()
	{
		$this->load->view('login');
	}
	public function verifyLogin()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		$result = $this->user->verify_Login($data);
		if (count($result) != 0) {
			echo "true";
			foreach ($result as $row):
				$details = array(
					'id' => $row['id'],
					'username' => $row['username']
				);
				$this->session->set_userdata('logged_in', $details);
			endforeach;
			$sessionValues = $this->session->userdata('logged_in');
		} else {
			echo "false";
		}
	}
	public function getExtension()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$result = $this->user->get_Extension();

			echo json_encode($result);

		} else {
			redirect('admin/logout');
		}
	}

	public function createStaffDetails()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$data['name'] = $this->input->post('staffName');
			$data['extension'] = $this->input->post('extension');

			$this->user->createStaff_Details($data);

			redirect('admin/staffmanagement_view');

		} else {
			redirect('admin/logout');
		}


	}
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	
	public function staffmanagement_view()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$getv = $this->input->get_post('q', TRUE);

			if ($getv == 'dW5zZXQw') {

				if (@($this->session->userdata('staffname'))) {
					$this->session->unset_userdata('staffname');
				}
				if (@($this->session->userdata('extension'))) {
					$this->session->unset_userdata('extension');
				}
			}

			if ($this->input->post('staff_submit_data') == "Search") {
				$this->session->set_userdata('staffname', $this->input->post('staffName'));
				$this->session->set_userdata('extension', $this->input->post('extension'));
			}

			$search['name'] = $this->session->userdata('staffname');
			$search['extension'] = $this->session->userdata('extension');

			$page_url = base_url() . "index.php/admin/staffmanagement_view";
			$total_users = $this->user->count_Staff_Details($search);
			$result_per_page = 25;
			$result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);

			$data['exten'] = $this->user->get_Extension();
			$data['extensearch'] = $this->user->get_Extensionsearch();
			$data['staffDetails'] = $this->user->get_Staff_Details($result_per_page, $result_page, $search);
			$data['links'] = $this->pagination->create_links();
			$this->load->view('staffmanagement_view', $data);

		} else {
			redirect('admin/logout');
		}
	}


	public function getStaffEditDetails()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$id = $this->input->post('id');
			$data1 = $this->user->get_Extension();
			$data2 = $this->user->getstudent_Details($id);

			$response = array($data1, $data2);
			echo json_encode($response);


		} else {
			redirect('admin/logout');
		}

	}


	public function staffDelete()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$id = $this->input->post('staff_delete_id');

			$data2 = $this->user->staff_Delete($id);

		} else {
			redirect('admin/logout');
		}
	}




	public function checkStaffName()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$staff_name = stripslashes($this->input->post('staffName'));

			$checkstaff = $this->user->checkStaffName($staff_name);

			if (empty($checkstaff)) {
				echo "true";
			} else {
				echo "false";
			}

		} else {
			redirect('admin/logout');
		}
	}

	public function updateStaffDetails()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$data['id'] = $this->input->post('hiddenValues');
			$data['name'] = $this->input->post('editstaffName');
			$data['extension'] = $this->input->post('editextension');


			$this->user->update_StaffDetails($data);
			redirect('admin/staffmanagement_view');

		} else {
			redirect('admin/logout');
		}
	}

	public function checkExtension()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {
			$ext = stripslashes($this->input->post('extension'));

			$checkext = $this->user->checkExtension($ext);

			if (empty($checkext)) {
				echo "true";
			} else {
				echo "false";
			}

		} else {
			redirect('admin/logout');
		}
	}

	public function passwordUpdate()
	{

		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) {

			$id = $sessionValues['id'];
			$old_pswd = $this->input->post('old_password');
			//$this->user->password_update($password,$id);
			$password = $this->input->post('password');
			$result = $this->user->check_psswd($old_pswd, $id);


			if ($result == 1) {
				$this->user->password_update($password, $id);
				echo "true";
			} else {
				echo "false";
			}

		} else {
			echo "false";
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('admin');
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>