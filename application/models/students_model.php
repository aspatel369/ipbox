<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Students_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0") {
        $sql = "SELECT s.*, h.house_name
                FROM student s
                LEFT JOIN house h ON h.id = s.house";

        if ($id > 0) {
            $sql .= " WHERE s.id = " . (int)$id;
        }

        $sql .= " ORDER BY s.id DESC";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getHouseInfo($houseId) {
        $sql = "SELECT h.id, h.caller_group, v.points
                FROM house h
                LEFT JOIN v_house v ON v.house_id = h.id
                WHERE h.id = ?";
        $query = $this->db->query($sql, array((int)$houseId));
        return $query->row_array();
    }

    public function normalizeStatus($status) {
        $status = strtolower(trim($status));
        return ($status === 'inactive') ? 'inactive' : 'active';
    }

    public function insertOrUpdate($data) {
        $houseId = (int)$data['house'];
        $houseInfo = $this->getHouseInfo($houseId);

        $record = array(
            'name' => trim($data['name']),
            'roll_no' => trim($data['roll_no']),
            'pin_no' => (int)$data['pin_no'],
            'DOB' => !empty($data['DOB']) ? $data['DOB'] : '0000-00-00',
            'house' => $houseId,
            'option1' => $data['option1'],
            'option2' => $data['option2'],
            'option3' => $data['option3'],
            'option4' => $data['option4'],
            'option5' => $data['option5'],
            'status' => $this->normalizeStatus($data['status']),
            'class' => 0,
            'flag' => 0,
            'caller_group' => $houseInfo ? (int)$houseInfo['caller_group'] : 0,
        );

        $id = isset($data['id']) ? (int)$data['id'] : 0;

        if ($id > 0) {
            return $this->db->where('id', $id)->update('student', $record);
        }

        $points = $houseInfo ? (float)$houseInfo['points'] : 0;
        $record['available_balance'] = $points > 0 ? round($points / 4, 2) : 0;
        $record['used_balance'] = 0;

        return $this->db->insert('student', $record);
    }

    public function toggleStatus($id) {
        $row = $this->getData($id);
        if (empty($row)) {
            return false;
        }

        $current = strtolower($row[0]['status']);
        $newStatus = ($current === 'active') ? 'inactive' : 'active';

        return $this->db->where('id', (int)$id)->update('student', array('status' => $newStatus));
    }

    public function rollNoExists($rollNo, $excludeId = 0) {
        $this->db->where('roll_no', $rollNo);
        if ($excludeId > 0) {
            $this->db->where('id !=', (int)$excludeId);
        }
        return $this->db->count_all_results('student') > 0;
    }

    public function importFromCsv($filePath) {
        $imported = 0;
        $skipped = 0;
        $handle = fopen($filePath, 'r');

        if ($handle === false) {
            return array('imported' => 0, 'skipped' => 0, 'error' => 'Unable to read the uploaded file.');
        }

        $rowIndex = 0;
        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            $rowIndex++;
            if ($rowIndex === 1) {
                continue;
            }

            if (count($row) < 8) {
                $skipped++;
                continue;
            }

            $rollNo = trim($row[0]);
            $name = trim($row[1]);
            $pinNo = trim($row[2]);
            $houseId = (int)trim($row[3]);
            $option1 = trim($row[4]);
            $option2 = trim($row[5]);
            $option3 = isset($row[6]) ? trim($row[6]) : '';
            $option4 = isset($row[7]) ? trim($row[7]) : '';
            $option5 = isset($row[8]) ? trim($row[8]) : '';
            $points = isset($row[9]) ? trim($row[9]) : '';
            $status = isset($row[10]) ? trim($row[10]) : 'active';

            if ($rollNo === '' || $name === '' || $pinNo === '' || $houseId <= 0 || $option1 === '' || $option2 === '') {
                $skipped++;
                continue;
            }

            $houseInfo = $this->getHouseInfo($houseId);
            if (!$houseInfo) {
                $skipped++;
                continue;
            }

            if ($points === '' || !is_numeric($points)) {
                $housePoints = (float)$houseInfo['points'];
                $availableBalance = $housePoints > 0 ? round($housePoints / 4, 2) : 0;
            } else {
                $availableBalance = (float)$points;
            }

            $record = array(
                'name' => $name,
                'roll_no' => $rollNo,
                'pin_no' => (int)$pinNo,
                'DOB' => '0000-00-00',
                'house' => $houseId,
                'caller_group' => (int)$houseInfo['caller_group'],
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'option5' => $option5,
                'available_balance' => $availableBalance,
                'used_balance' => 0,
                'status' => $this->normalizeStatus($status),
                'class' => 0,
                'flag' => 0,
            );

            if ($this->rollNoExists($rollNo)) {
                $this->db->where('roll_no', $rollNo);
                $updated = $this->db->update('student', $record);
                if ($updated) {
                    $imported++;
                } else {
                    $skipped++;
                }
            } else {
                if ($this->db->insert('student', $record)) {
                    $imported++;
                } else {
                    $skipped++;
                }
            }
        }

        fclose($handle);

        return array('imported' => $imported, 'skipped' => $skipped, 'error' => '');
    }

    public function delete($id) {
        return $this->db->where('id', (int)$id)->delete('student');
    }
}
