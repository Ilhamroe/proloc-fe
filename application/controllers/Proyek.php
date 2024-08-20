<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('proyek_model');
    }

    // View Get Data Proyek
    public function index()
    {
        $data['title'] = 'Proyek';
        $data['proyek'] = $this->proyek_model->get_data('tbl_proyek')->result();
        $data['proyek'] = $this->proyek_model->get_lokasi_with_proyek();
        $this->load->model('lokasi_model');
        $data['lokasi'] = $this->lokasi_model->get_data('tbl_lokasi')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proyek', $data);
        $this->load->view('templates/footer');
    }

    // View Form Add Data Proyek
    public function tambah()
    {
        $data['title'] = 'Proyek';
        $this->load->model('lokasi_model');
        $data['lokasi'] = $this->lokasi_model->get_data('tbl_lokasi')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_proyek', $data);
        $this->load->view('templates/footer');
    }

    // Function Add Data
    public function tambah_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nama_proyek' => $this->input->post('nama_proyek', true),
                'client' => $this->input->post('client', true),
                'tgl_mulai' => $this->input->post('tgl_mulai', true),
                'tgl_selesai' => $this->input->post('tgl_selesai', true),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek', true),
                'keterangan' => $this->input->post('keterangan', true),
            ];

            $this->proyek_model->insert_data('tbl_proyek', $data);

            $proyek_id = $this->db->insert_id();
            $lokasi_id = $this->input->post('lokasi_id');

            if ($lokasi_id && $lokasi_id != "Pilih Lokasi") {
                $this->addRelation($proyek_id);
            }

            redirect('proyek');
        }
    }

    // Function Edit Data
    public function edit($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama_proyek' => $this->input->post('nama_proyek', true),
                'client' => $this->input->post('client', true),
                'tgl_mulai' => $this->input->post('tgl_mulai', true),
                'tgl_selesai' => $this->input->post('tgl_selesai', true),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek', true),
                'keterangan' => $this->input->post('keterangan', true),
            ];

            $where = ['id' => $id];

            $this->proyek_model->update_data('tbl_proyek', $data, $where);

            $this->db->where('proyek_id', $id);
            $this->db->delete('tbl_proyek_lokasi');

            $lokasi_id = $this->input->post('lokasi_id');
            if ($lokasi_id && $lokasi_id != "Pilih Lokasi") {
                $this->addRelation($id);
            }

            redirect('proyek');
        }
    }

    // Function Delete Data
    public function delete($id)
    {
        $this->db->where('proyek_id', $id);
        $this->db->delete('tbl_proyek_lokasi');

        $where = ['id' => $id];
        $this->proyek_model->delete_data('tbl_proyek', $where);

        redirect('proyek');
    }

    // Function add relasi location
    public function addRelation($id)
    {
        $lokasi_id = $this->input->post('lokasi_id');

        if ($lokasi_id) {
            $data_proyek_lokasi = array(
                'proyek_id' => $id,
                'lokasi_id' => $lokasi_id
            );

            $this->db->insert('tbl_proyek_lokasi', $data_proyek_lokasi);
        }
    }

    // Function Rules
    public function _rules()
    {
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required|trim');
        $this->form_validation->set_rules('client', 'Client', 'required|trim');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('pimpinan_proyek', 'Pimpinan Proyek', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }

}