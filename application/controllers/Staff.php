<?php 
if (!defined('BASEPATH')) 
	exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
		$this->load->library("session");
        $this->load->model('staff_model');
        $this->load->model('User');
    }

    public function index() {
		$data['data'] = $this->staff_model->getData();
		$this->load->view('new/manage-employees', $data);
	}

	public function saveDetails() {
		$formData = $this->input->post();

		$id = 0;
		if($formData['id'] > 0) {
			$id = $formData['id'];
		}
		$stafdata = [
			'id' => $id,
			'name' => $formData['name'],
			'email' => $formData['email'],
			'phone' => $formData['phone'],
			'role' => $formData['role'],
			'status' => $formData['status'],
		];
		$result = $this->staff_model->insertOrUpdate($stafdata);
		$userdata = [
			'username' => $formData['username'],
			'user_id' => $result,
			'password' => md5($formData['password']),
		];
		$result = $this->User->insertOrUpdate($userdata);
		if ($result) {
			if($id > 0) {
				$this->session->set_flashdata('msg', 'Record updated successfully');
			} else {
				$this->session->set_flashdata('msg', 'Record saved successfully');
			}
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('Staff');
	}

	public function deleteRecord($id) {
		$result = $this->staff_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('msg', 'Record deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('Staff');
	}

	public function getDetails($id) {
		$data = $this->staff_model->getData($id);
		echo json_encode($data[0]);
	}
}