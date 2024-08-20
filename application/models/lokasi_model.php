<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lokasi_model extends CI_Model
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

    public function get_proyek_with_lokasi()
    {
        $this->db->select('tbl_lokasi.*, GROUP_CONCAT(tbl_proyek.nama_proyek SEPARATOR ", ") as nama_proyek');
        $this->db->from('tbl_lokasi');
        $this->db->join('tbl_proyek_lokasi', 'tbl_lokasi.id = tbl_proyek_lokasi.lokasi_id', 'left');
        $this->db->join('tbl_proyek', 'tbl_proyek_lokasi.proyek_id = tbl_proyek.id', 'left');
        $this->db->group_by('tbl_lokasi.id');

        return $this->db->get()->result();
    }
}