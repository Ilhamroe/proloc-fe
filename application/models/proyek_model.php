<?php
defined('BASEPATH') or exit('No direct script access allowed');

class proyek_model extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
    }

    public function get_lokasi_with_proyek()
    {
        $this->db->select('tbl_proyek.*, GROUP_CONCAT(tbl_lokasi.nama_lokasi SEPARATOR ", ") as nama_lokasi');
        $this->db->from('tbl_proyek');
        $this->db->join('tbl_proyek_lokasi', 'tbl_proyek.id = tbl_proyek_lokasi.proyek_id', 'left');
        $this->db->join('tbl_lokasi', 'tbl_proyek_lokasi.lokasi_id = tbl_lokasi.id', 'left');
        $this->db->group_by('tbl_proyek.id');

        return $this->db->get()->result();
    }
}