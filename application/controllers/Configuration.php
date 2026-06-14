<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Configuration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        $this->load->library("session");
        $this->load->model('configuration_model');
    }

    public function index()
    {
        $category = $this->input->get('category');
        if ($category === null) {
            $category = '';
        }

        $allData = $this->configuration_model->getData("0", "");
        $grouped = array();
        foreach ($allData as $row) {
            $cat = trim((string) $row['Category']) !== '' ? $row['Category'] : 'Uncategorized';
            if (!isset($grouped[$cat])) {
                $grouped[$cat] = array();
            }
            $grouped[$cat][] = $row;
        }

        if ($category === '' && !empty($grouped)) {
            $defaultCategory = 'Asterisk';
            $category = isset($grouped[$defaultCategory]) ? $defaultCategory : array_key_first($grouped);
        } elseif ($category !== '' && !isset($grouped[$category])) {
            $grouped[$category] = array();
        }

        $data['grouped_data'] = $grouped;
        $data['categories'] = $this->configuration_model->getCategories();
        $data['selected_category'] = $category;
        $this->load->view('new/manage-configuration', $data);
    }

    public function saveDetails()
    {
        $formData = $this->input->post();

        $id = 0;
        if (isset($formData['id']) && $formData['id'] > 0) {
            $id = $formData['id'];
        }

        $result = $this->configuration_model->insertOrUpdate($formData);
        if ($result) {
            if ($id > 0) {
                $this->session->set_flashdata('msg', 'Configuration updated successfully');
            } else {
                $this->session->set_flashdata('msg', 'Configuration saved successfully');
            }
        } else {
            $this->session->set_flashdata('msg', 'Some error occurred!');
        }

        $redirect = 'Configuration';
        if (!empty($formData['Category'])) {
            $redirect .= '?category=' . urlencode($formData['Category']);
        }
        redirect($redirect);
    }

    public function deleteRecord($id)
    {
        $category = $this->input->get('category');
        $result = $this->configuration_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('msg', 'Configuration deleted successfully');
        } else {
            $this->session->set_flashdata('msg', 'Some error occurred!');
        }

        $redirect = 'Configuration';
        if ($category !== null && $category !== '') {
            $redirect .= '?category=' . urlencode($category);
        }
        redirect($redirect);
    }

    public function getDetails($id)
    {
        $data = $this->configuration_model->getData($id);
        echo json_encode($data[0]);
    }
}
