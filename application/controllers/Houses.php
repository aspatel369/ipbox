<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Houses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
		$this->load->library("session");
        $this->load->model('houses_model');
        $this->load->model('callergroup_model');
        $this->load->model('emergency_model');
    }

    public function index() {
		$data['data'] = $this->houses_model->getData();
        $data['callerGroups'] = $this->callergroup_model->getData();
		$this->load->view('new/manage-house', $data);
	}

	public function saveDetails() {
		$formData = $this->input->post();

        $houseData['id'] = $formData['id'];
        $houseData['house_name'] = $formData['house_name'];
        $houseData['extensions'] = $formData['extensions'];
        $houseData['caller_group'] = $formData['caller_group'];
        $houseData['status'] = $formData['status'];

		$id = 0;
		if($formData['id'] > 0) {
			$id = $formData['id'];
		}

		$result = $this->houses_model->insertOrUpdate($houseData);
		if ($result['status']) {
            $emergencyData['house_id'] = $id > 0 ? $id : $result['insert_id'];
            $emergencyData['phone'] = $formData['phone'];
            $emergencyData['phtwo'] = $formData['phtwo'];
            $emergencyData['phthree'] = $formData['phthree'];
            $emergencyData['phfour'] = $formData['phfour'];
            $emergencyData['phfive'] = $formData['phfive'];

            $this->emergency_model->insertOrUpdate($emergencyData);
			if($id > 0) {
				$this->session->set_flashdata('msg', 'Record updated successfully');
			} else {
				$this->session->set_flashdata('msg', 'Record saved successfully');
			}
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('Houses');
	}

	public function deleteRecord($id) {
		$result = $this->houses_model->delete($id);
		if ($result) {
            $this->emergency_model->delete($id);
			$this->session->set_flashdata('msg', 'Record deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('Houses');
	}

	public function getDetails($id) {
		$data = $this->houses_model->getData($id);
		echo json_encode($data[0]);
	}
}