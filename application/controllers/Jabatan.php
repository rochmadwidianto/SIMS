<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mJabatan');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $jabatan = $this->mJabatan->get_all();

        $data = array(
            'jabatan_data' => $jabatan
        );

        $this->template->display('jabatan/view_jabatan_list', $data);
    }

    public function read($id) {
        $row = $this->mJabatan->get_by_id($id);
        if ($row) {
            $data = array(
                'jabatan_id' => $row->jabatan_id,
                'jabatan_kode' => $row->jabatan_kode,
                'jabatan_nama' => $row->jabatan_nama,
                'jabatan_keterangan' => $row->jabatan_keterangan,
            );
            $this->template->display('jabatan/view_jabatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('jabatan/create_action'),
            'jabatan_id' => set_value('jabatan_id'),
            'jabatan_kode' => set_value('jabatan_kode'),
            'jabatan_nama' => set_value('jabatan_nama'),
            'jabatan_keterangan' => set_value('jabatan_keterangan'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('jabatan/view_jabatan_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'jabatan_kode' => $this->input->post('jabatan_kode', TRUE),
                'jabatan_nama' => $this->input->post('jabatan_nama', TRUE),
                'jabatan_keterangan' => $this->input->post('jabatan_keterangan', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mJabatan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jabatan'));
        }
    }

    public function update($id) {
        $row = $this->mJabatan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('jabatan/update_action'),
                'jabatan_id' => set_value('jabatan_id', $row->jabatan_id),
                'jabatan_kode' => set_value('jabatan_kode', $row->jabatan_kode),
                'jabatan_nama' => set_value('jabatan_nama', $row->jabatan_nama),
                'jabatan_keterangan' => set_value('jabatan_keterangan', $row->jabatan_keterangan),
            );
            $this->template->display('jabatan/view_jabatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jabatan_id', TRUE));
        } else {
            $data = array(
                'jabatan_kode' => $this->input->post('jabatan_kode', TRUE),
                'jabatan_nama' => $this->input->post('jabatan_nama', TRUE),
                'jabatan_keterangan' => $this->input->post('jabatan_keterangan', TRUE),
            );

            $this->mJabatan->update($this->input->post('jabatan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jabatan'));
        }
    }

    public function delete($id) {
        $row = $this->mJabatan->get_by_id($id);

        if ($row) {
            $this->mJabatan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jabatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('jabatan_kode', 'jabatan_kode', 'trim');
        $this->form_validation->set_rules('jabatan_nama', 'jabatan_nama', 'trim');
        $this->form_validation->set_rules('jabatan_keterangan', 'jabatan_keterangan', 'trim');
        $this->form_validation->set_rules('jabatan_id', 'jabatan_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "jabatan.xls";
        $judul = "Jabatan";
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
        // xlsWriteLabel($tablehead, $kolomhead++, "User");

        foreach ($this->mJabatan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_keterangan);
            // xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */