<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['item1'] = 'Proyek';
        $data['item2'] = 'Lokasi';

        $data['total_proyek'] = $this->db->count_all('tbl_proyek');
        $data['total_lokasi'] = $this->db->count_all('tbl_lokasi');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
