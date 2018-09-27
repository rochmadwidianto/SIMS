<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mSatuan');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $satuan = $this->mSatuan->get_all();

        $data = array(
            'satuan_data' => $satuan
        );

        $this->template->display('satuan/view_satuan_list', $data);
    }

    public function read($id) {
        $row = $this->mSatuan->get_by_id($id);
        if ($row) {
            $data = array(
                'satuan_id' => $row->satuan_id,
                'satuan_kode' => $row->satuan_kode,
                'satuan_nama' => $row->satuan_nama,
            );
            $this->template->display('satuan/view_satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('satuan/create_action'),
            'satuan_id' => set_value('satuan_id'),
            'satuan_kode' => set_value('satuan_kode'),
            'satuan_nama' => set_value('satuan_nama'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('satuan/view_satuan_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'satuan_kode' => $this->input->post('satuan_kode', TRUE),
                'satuan_nama' => $this->input->post('satuan_nama', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mSatuan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('satuan'));
        }
    }

    public function update($id) {
        $row = $this->mSatuan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('satuan/update_action'),
                'satuan_id' => set_value('satuan_id', $row->satuan_id),
                'satuan_kode' => set_value('satuan_kode', $row->satuan_kode),
                'satuan_nama' => set_value('satuan_nama', $row->satuan_nama),
            );
            $this->template->display('satuan/view_satuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('satuan_id', TRUE));
        } else {
            $data = array(
                'satuan_kode' => $this->input->post('satuan_kode', TRUE),
                'satuan_nama' => $this->input->post('satuan_nama', TRUE),
            );

            $this->mSatuan->update($this->input->post('satuan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('satuan'));
        }
    }

    public function delete($id) {
        $row = $this->mSatuan->get_by_id($id);

        if ($row) {
            $this->mSatuan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('satuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('satuan_kode', 'satuan_kode', 'trim|required');
        $this->form_validation->set_rules('satuan_nama', 'satuan_nama', 'trim|required');
        $this->form_validation->set_rules('satuan_id', 'satuan_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "satuan_barang.xls";
        $judul = "Satuan Barang";
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

        foreach ($this->mSatuan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->satuan_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->satuan_nama);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Satuan.php */
/* Location: ./application/controllers/Satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */