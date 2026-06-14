<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Configuration_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0", $category = "")
    {
        $sql = "SELECT * FROM config WHERE 1=1 ";

        if ($id > 0) {
            $sql .= " AND id = " . (int) $id;
        }

        if ($category !== "") {
            $sql .= " AND Category = " . $this->db->escape($category);
        }

        $sql .= " ORDER BY Category ASC, ConfigNameKey ASC ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getCategories()
    {
        $sql = "SELECT DISTINCT Category FROM config ORDER BY Category ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_invoice_config()
    {
        $this->db->where('Category', 'Invoice');
        $query = $this->db->get('config');

        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$row['ConfigNameKey']] = $row['Value'];
        }

        return $result;
    }
    public function insertOrUpdate($data)
    {
        $allowed = array('Category', 'ConfigNameKey', 'Value', 'ValueTwo', 'Comment');
        $row = array();
        foreach ($allowed as $field) {
            if (array_key_exists($field, $data)) {
                $row[$field] = $data[$field];
            }
        }
        if (!isset($row['ValueTwo']) || $row['ValueTwo'] === null) {
            $row['ValueTwo'] = '';
        }
        if (!isset($row['Comment']) || $row['Comment'] === null) {
            $row['Comment'] = '';
        }

        if (isset($data['id']) && $data['id'] > 0) {
            $id = (int) $data['id'];
            return $this->db->where('id', $id)->update('config', $row);
        }

        return $this->db->insert('config', $row);
    }

    public function delete($id)
    {
        return $this->db->where('id', (int) $id)->delete('config');
    }
}
