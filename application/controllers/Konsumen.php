<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konsumen extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mKonsumen');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $konsumen = $this->mKonsumen->get_all();

        $data = array(
            'konsumen_data' => $konsumen
        );

        $this->template->display('konsumen/view_konsumen_list', $data);
    }

    public function read($id) {
        $row = $this->mKonsumen->get_by_id($id);
        if ($row) {
            $data = array(
                'konsumen_id' => $row->konsumen_id,
                'konsumen_kode' => $row->konsumen_kode,
                'konsumen_nama' => $row->konsumen_nama,
                'konsumen_nama_pemilik' => $row->konsumen_nama_pemilik,
                'konsumen_telp' => $row->konsumen_telp,
                'konsumen_alamat' => $row->konsumen_alamat,
            );
            $this->template->display('konsumen/view_konsumen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('konsumen/create_action'),
            'konsumen_id' => set_value('konsumen_id'),
            'konsumen_kode' => set_value('konsumen_kode'),
            'konsumen_nama' => set_value('konsumen_nama'),
            'konsumen_nama_pemilik' => set_value('konsumen_nama_pemilik'),
            'konsumen_telp' => set_value('konsumen_telp'),
            'konsumen_alamat' => set_value('konsumen_alamat'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('konsumen/view_konsumen_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'konsumen_kode' => $this->input->post('konsumen_kode', TRUE),
                'konsumen_nama' => $this->input->post('konsumen_nama', TRUE),
                'konsumen_nama_pemilik' => $this->input->post('konsumen_nama_pemilik', TRUE),
                'konsumen_telp' => $this->input->post('konsumen_telp', TRUE),
                'konsumen_alamat' => $this->input->post('konsumen_alamat', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mKonsumen->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konsumen'));
        }
    }

    public function update($id) {
        $row = $this->mKonsumen->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('konsumen/update_action'),
                'konsumen_id' => set_value('konsumen_id', $row->konsumen_id),
                'konsumen_kode' => set_value('konsumen_kode', $row->konsumen_kode),
                'konsumen_nama' => set_value('konsumen_nama', $row->konsumen_nama),
                'konsumen_nama_pemilik' => set_value('konsumen_nama_pemilik', $row->konsumen_nama_pemilik),
                'konsumen_telp' => set_value('konsumen_telp', $row->konsumen_telp),
                'konsumen_alamat' => set_value('konsumen_alamat', $row->konsumen_alamat),
            );
            $this->template->display('konsumen/view_konsumen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('konsumen_id', TRUE));
        } else {
            $data = array(
                'konsumen_kode' => $this->input->post('konsumen_kode', TRUE),
                'konsumen_nama' => $this->input->post('konsumen_nama', TRUE),
                'konsumen_nama_pemilik' => $this->input->post('konsumen_nama_pemilik', TRUE),
                'konsumen_telp' => $this->input->post('konsumen_telp', TRUE),
                'konsumen_alamat' => $this->input->post('konsumen_alamat', TRUE),
            );

            $this->mKonsumen->update($this->input->post('konsumen_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konsumen'));
        }
    }

    public function delete($id) {
        $row = $this->mKonsumen->get_by_id($id);

        if ($row) {
            $this->mKonsumen->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konsumen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('konsumen_kode', 'konsumen_kode', 'trim');
        $this->form_validation->set_rules('konsumen_nama', 'konsumen_nama', 'trim');
        $this->form_validation->set_rules('konsumen_nama_pemilik', 'konsumen_nama_pemilik', 'trim');
        $this->form_validation->set_rules('konsumen_telp', 'konsumen_telp', 'trim');
        $this->form_validation->set_rules('konsumen_alamat', 'konsumen_alamat', 'trim');
        $this->form_validation->set_rules('konsumen_id', 'konsumen_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "konsumen.xls";
        $judul = "Konsumen";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pemilik");
        xlsWriteLabel($tablehead, $kolomhead++, "Telp");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
        // xlsWriteLabel($tablehead, $kolomhead++, "User");

        foreach ($this->mKonsumen->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->konsumen_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->konsumen_nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->konsumen_nama_pemilik);
            xlsWriteLabel($tablebody, $kolombody++, $data->konsumen_telp);
            xlsWriteLabel($tablebody, $kolombody++, $data->konsumen_alamat);
            // xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */