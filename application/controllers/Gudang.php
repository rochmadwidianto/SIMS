<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gudang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mGudang');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $dataGudang = $this->mGudang->get_all();

        $data = array(
            'data_gudang' => $dataGudang
        );

        $this->template->display('gudang/view_gudang_list', $data);
    }

    public function read($id) {
        $row = $this->mGudang->get_by_id($id);
        if ($row) {
            $data = array(
                'gudang_id' => $row->gudang_id,
                'gudang_kode' => $row->gudang_kode,
                'gudang_nama' => $row->gudang_nama,
                'gudang_keterangan' => $row->gudang_keterangan,
            );
            $this->template->display('gudang/view_gudang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Gudang'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('Gudang/create_action'),
            'gudang_id' => set_value('gudang_id'),
            'gudang_kode' => set_value('gudang_kode'),
            'gudang_nama' => set_value('gudang_nama'),
            'gudang_keterangan' => set_value('gudang_keterangan'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('gudang/view_gudang_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'gudang_kode' => $this->input->post('gudang_kode', TRUE),
                'gudang_nama' => $this->input->post('gudang_nama', TRUE),
                'gudang_keterangan' => $this->input->post('gudang_keterangan', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mGudang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Gudang'));
        }
    }

    public function update($id) {
        $row = $this->mGudang->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('Gudang/update_action'),
                'gudang_id' => set_value('gudang_id', $row->gudang_id),
                'gudang_kode' => set_value('gudang_kode', $row->gudang_kode),
                'gudang_nama' => set_value('gudang_nama', $row->gudang_nama),
                'gudang_keterangan' => set_value('gudang_keterangan', $row->gudang_keterangan),
            );
            $this->template->display('gudang/view_gudang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Gudang'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('gudang_id', TRUE));
        } else {
            $data = array(
                'gudang_kode' => $this->input->post('gudang_kode', TRUE),
                'gudang_nama' => $this->input->post('gudang_nama', TRUE),
                'gudang_keterangan' => $this->input->post('gudang_keterangan', TRUE),
            );

            $this->mGudang->update($this->input->post('gudang_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Gudang'));
        }
    }

    public function delete($id) {
        $row = $this->mGudang->get_by_id($id);

        if ($row) {
            $this->mGudang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Gudang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Gudang'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('gudang_kode', 'gudang_kode', 'trim');
        $this->form_validation->set_rules('gudang_nama', 'gudang_nama', 'trim');
        $this->form_validation->set_rules('gudang_keterangan', 'gudang_keterangan', 'trim');
        $this->form_validation->set_rules('gudang_id', 'gudang_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "gudang.xls";
        $judul = "Gudang";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

        foreach ($this->mGudang->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->gudang_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->gudang_nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->gudang_keterangan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */