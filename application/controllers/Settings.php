<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('welcome_model');
	}

	public function index()
	{
		//$stats=$this->welcome_model->get_stats();
		//$total=$this->welcome_model->get_caller_group();
		//$data = array(
		//'stats' => $stats,
		//'CallerGroup' => $total
		//);
		$this->load->view('set_house');
	}
}