<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('lokasi_model');
    }

    // View Get Data Lokasi
    public function index()
    {
        $data['title'] = 'Lokasi';
        $data['lokasi'] = $this->lokasi_model->get_data('tbl_lokasi')->result();
        $data['lokasi'] = $this->lokasi_model->get_proyek_with_lokasi();
        $this->load->model('proyek_model');
        $data['proyek'] = $this->proyek_model->get_data('tbl_proyek')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('lokasi', $data);
        $this->load->view('templates/footer');
    }

    // View Form Add Data Lokasi
    public function tambah()
    {
        $data['title'] = 'Lokasi';
        $this->load->model('proyek_model');
        $data['proyek'] = $this->proyek_model->get_data('tbl_proyek')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_lokasi', $data);
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
                'nama_lokasi' => $this->input->post('nama_lokasi', true),
                'negara' => $this->input->post('negara', true),
                'provinsi' => $this->input->post('provinsi', true),
                'kota' => $this->input->post('kota', true),
            ];

            $this->lokasi_model->insert_data('tbl_lokasi', $data);

            $lokasi_id = $this->db->insert_id();
            $proyek_id = $this->input->post('proyek_id');

            if ($proyek_id && $proyek_id != 'Pilih Proyek') {
                $this->addRelation($lokasi_id);
            }
            redirect('lokasi');
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
                'nama_lokasi' => $this->input->post('nama_lokasi', true),
                'negara' => $this->input->post('negara', true),
                'provinsi' => $this->input->post('provinsi', true),
                'kota' => $this->input->post('kota', true),
            ];

            $where = ['id' => $id];

            $this->lokasi_model->update_data('tbl_lokasi', $data, $where);

            $this->db->where('lokasi_id', $id);
            $this->db->delete('tbl_proyek_lokasi');

            $proyek_id = $this->input->post('proyek_id');
            if ($proyek_id && $proyek_id != 'Pilih Proyek') {
                $this->addRelation($id);
            }

            redirect('lokasi');
        }
    }

    // Function Delete Data
    public function delete($id)
    {
        $this->db->where('lokasi_id', $id);
        $this->db->delete('tbl_proyek_lokasi');

        $where = ['id' => $id];
        $this->lokasi_model->delete_data('tbl_lokasi', $where);

        redirect('lokasi');
    }

    // Function add relasi location
    public function addRelation($id)
    {
        $proyek_id = $this->input->post('proyek_id');

        if ($proyek_id) {
            $data_proyek_lokasi = array(
                'lokasi_id' => $id,
                'proyek_id' => $proyek_id
            );

            $this->db->insert('tbl_proyek_lokasi', $data_proyek_lokasi);
        }
    }

    // Function Rules
    public function _rules()
    {
        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
    }
}
