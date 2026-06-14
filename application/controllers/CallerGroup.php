<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class CallerGroup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
		$this->load->library("session");
        $this->load->model('callergroup_model');
    }

    public function index() {
		$data['data'] = $this->callergroup_model->getData();
		$this->load->view('new/manage-caller-group', $data);
	}

	public function saveDetails() {
		$formData = $this->input->post();

		$id = 0;
		if($formData['id'] > 0) {
			$id = $formData['id'];
		}

		$result = $this->callergroup_model->insertOrUpdate($formData);
		if ($result) {
			if($id > 0) {
				$this->session->set_flashdata('msg', 'Record updated successfully');
			} else {
				$this->session->set_flashdata('msg', 'Record saved successfully');
			}
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('CallerGroup');
	}

	public function deleteRecord($id) {
		$result = $this->callergroup_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('msg', 'Record deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('CallerGroup');
	}

	public function getDetails($id) {
		$data = $this->callergroup_model->getData($id);
		echo json_encode($data[0]);
	}
}