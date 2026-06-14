<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Students extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        $this->load->library("session");
        $this->load->model('students_model');
        $this->load->model('houses_model');
    }

    public function index() {
        $data['data'] = $this->students_model->getData();
        $data['houses'] = $this->houses_model->getData();
        $this->load->view('new/manage-students', $data);
    }

    public function saveDetails() {
        $formData = $this->input->post();

        $id = 0;
        if (!empty($formData['id']) && $formData['id'] > 0) {
            $id = (int)$formData['id'];
        }

        if ($this->students_model->rollNoExists($formData['roll_no'], $id)) {
            $this->session->set_flashdata('msg', 'Roll number already exists!');
            redirect('Students');
            return;
        }

        $result = $this->students_model->insertOrUpdate($formData);
        if ($result) {
            if ($id > 0) {
                $this->session->set_flashdata('msg', 'Record updated successfully');
            } else {
                $this->session->set_flashdata('msg', 'Record saved successfully');
            }
        } else {
            $this->session->set_flashdata('msg', 'Some error occurred!');
        }
        redirect('Students');
    }

    public function deleteRecord($id) {
        $result = $this->students_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('msg', 'Record deleted successfully');
        } else {
            $this->session->set_flashdata('msg', 'Some error occurred!');
        }
        redirect('Students');
    }

    public function toggleStatus($id) {
        $result = $this->students_model->toggleStatus($id);
        if ($result) {
            $this->session->set_flashdata('msg', 'Student status updated successfully');
        } else {
            $this->session->set_flashdata('msg', 'Some error occurred!');
        }
        redirect('Students');
    }

    public function importCsv() {
        if (empty($_FILES['file']['name'])) {
            $this->session->set_flashdata('msg', 'Please select a CSV file to upload.');
            redirect('Students');
            return;
        }

        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        if ($extension !== 'csv') {
            $this->session->set_flashdata('msg', 'Only CSV files are allowed.');
            redirect('Students');
            return;
        }

        $result = $this->students_model->importFromCsv($_FILES['file']['tmp_name']);

        if (!empty($result['error'])) {
            $this->session->set_flashdata('msg', $result['error']);
        } else {
            $this->session->set_flashdata('msg', 'Import complete. Imported/updated: ' . $result['imported'] . ', Skipped: ' . $result['skipped']);
        }

        redirect('Students');
    }

    public function downloadSampleCsv() {
        $headers = array(
            array('rollnumber', 'studentname', 'pinnumber', 'housecode', 'option1', 'option2', 'option3', 'option4', 'option5', 'Points', 'Status')
        );
        array_to_csv($headers, 'student_import_sample.csv');
    }

    public function getDetails($id) {
        $data = $this->students_model->getData($id);
        if (empty($data)) {
            echo json_encode(array());
            return;
        }
        echo json_encode($data[0]);
    }
}
