<?php
class Global_pagination extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->library("pagination");
    }


    public function index($page_url, $total_count, $result_per_page) {

        $config = array();
        $config["base_url"] = $page_url;
        $config["total_rows"] = $total_count;
        $config["per_page"] = $result_per_page;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     
        return $page;
    }
}