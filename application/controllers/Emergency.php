<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Emergency extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
		$this->load->library("session");
        $this->load->model('emergency_model');
    }

    public function index() {
		$data['data'] = $this->emergency_model->getData();
		$this->load->view('new/manodarpan', $data);
	}

}