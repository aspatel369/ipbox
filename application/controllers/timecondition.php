<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timecondition extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('timecondition_model');
		$this->load->model('house_model');
	}

	public function index()
	{
		$data['condition']=$this->timecondition_model->condition();
		$this->load->view('timecondition',$data);
	}
	public function getTimeCondition()
	{
	 $sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 
		$id = $this->input->post('id');
		$data1= $this->timecondition_model->getCondition($id);
		$data2 = $this->house_model->get_HouseDropdown();
		//$ext = $this->user->extensionGetAsterisk();
		//$extension = $this->user->notInHouseTable($ext);
		$response = array($data1,$data2);
		echo json_encode($response);
			}
		else
		{
			redirect('admin/logout');
		}
	}	
	public function updateTimeCondition()
	{
		$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 

		$data['id'] = $this->input->post('editGroupId');
		$data['house'] = $this->input->post('editGroup');
		$data['editfrom'] = $this->input->post('editfrom');
		$data['editto'] = $this->input->post('editto');
		$data['chkmon'] = $this->input->post('mon');
		$data['chktue'] = $this->input->post('tue');
		$data['chkwed'] = $this->input->post('wed');
		$data['chkthu'] = $this->input->post('thu');
		$data['chkfri'] = $this->input->post('fri');
		$data['chksat'] = $this->input->post('sat');
		$data['chksun'] = $this->input->post('sun');
		//var_dump($data);
		$this->timecondition_model->update_TimeConditionDetails($data);
		redirect('timecondition');

			}
		else
		{
			redirect('admin/logout');
		}
	}

}
