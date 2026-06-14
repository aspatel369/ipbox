<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class TimeConditions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
		$this->load->library("session");
        $this->load->model('houses_model');
        $this->load->model('timeconditions_model');
    }

    public function index() {
		$data['houses'] = $this->houses_model->getData();
        $data['data'] = $this->timeconditions_model->getData();
		// echo "<pre>";
		// print_r($data['data']);
		// die;
		$this->load->view('new/time-conditions', $data);
	}

	public function saveDetails() {
		$formData = $this->input->post();

        $house_ids = "";
        if(isset($formData['houses'])) {
            $house_array = $formData['houses'];
            $house_ids = implode(',', $house_array);
            unset($formData['houses']);
        }

        $formData['house_name'] = $house_ids;

        $weekdays = "";
        if(isset($formData['days'])) {
            $days = $formData['days'];
            $weekdays = implode(', ', $days);
            unset($formData['days']);
        }

        $formData['weekdays'] = $weekdays;

		$id = 0;
		if($formData['id'] > 0) {
			$id = $formData['id'];
		}

		$result = $this->timeconditions_model->insertOrUpdate($formData);
		if ($result['status']) {
			if($id > 0) {
				$this->session->set_flashdata('msg', 'Record updated successfully');
			} else {
				$this->session->set_flashdata('msg', 'Record saved successfully');
			}
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('TimeConditions');
	}

	public function deleteRecord($id) {
		$result = $this->timeconditions_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('msg', 'Record deleted successfully');
		} else {
			$this->session->set_flashdata('msg', 'Some error occurred!');
		}
		redirect('TimeConditions');
	}

	public function getDetails($id) {
		$data = $this->timeconditions_model->getData($id);
		echo json_encode($data[0]);
	}
}