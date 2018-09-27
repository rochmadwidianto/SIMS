<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KondisiBarang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mKondisiBarang');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $kondisiBarang = $this->mKondisiBarang->get_all();

        $data = array(
            'kondisi_barang_data' => $kondisiBarang
        );

        $this->template->display('kondisi_barang/view_kondisi_barang_list', $data);
    }

    public function read($id) {
        $row = $this->mKondisiBarang->get_by_id($id);
        if ($row) {
            $data = array(
                'kondisi_barang_id' => $row->kondisi_barang_id,
                'kondisi_barang_kode' => $row->kondisi_barang_kode,
                'kondisi_barang_nama' => $row->kondisi_barang_nama,
            );
            $this->template->display('kondisi_barang/view_kondisi_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kondisiBarang'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('kondisiBarang/create_action'),
            'kondisi_barang_id' => set_value('kondisi_barang_id'),
            'kondisi_barang_kode' => set_value('kondisi_barang_kode'),
            'kondisi_barang_nama' => set_value('kondisi_barang_nama'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('kondisi_barang/view_kondisi_barang_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kondisi_barang_kode' => $this->input->post('kondisi_barang_kode', TRUE),
                'kondisi_barang_nama' => $this->input->post('kondisi_barang_nama', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mKondisiBarang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kondisiBarang'));
        }
    }

    public function update($id) {
        $row = $this->mKondisiBarang->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('kondisiBarang/update_action'),
                'kondisi_barang_id' => set_value('kondisi_barang_id', $row->kondisi_barang_id),
                'kondisi_barang_kode' => set_value('kondisi_barang_kode', $row->kondisi_barang_kode),
                'kondisi_barang_nama' => set_value('kondisi_barang_nama', $row->kondisi_barang_nama),
            );
            $this->template->display('kondisi_barang/view_kondisi_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kondisiBarang'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kondisi_barang_id', TRUE));
        } else {
            $data = array(
                'kondisi_barang_kode' => $this->input->post('kondisi_barang_kode', TRUE),
                'kondisi_barang_nama' => $this->input->post('kondisi_barang_nama', TRUE),
            );

            $this->mKondisiBarang->update($this->input->post('kondisi_barang_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kondisiBarang'));
        }
    }

    public function delete($id) {
        $row = $this->mKondisiBarang->get_by_id($id);

        if ($row) {
            $this->mKondisiBarang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kondisiBarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kondisiBarang'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('kondisi_barang_kode', 'kondisi_barang_kode', 'trim');
        $this->form_validation->set_rules('kondisi_barang_nama', 'kondisi_barang_nama', 'trim');
        $this->form_validation->set_rules('kondisi_barang_id', 'kondisi_barang_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "kondisi_barang.xls";
        $judul = "Kondisi Barang";
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
        // xlsWriteLabel($tablehead, $kolomhead++, "User");

        foreach ($this->mKondisiBarang->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kondisi_barang_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->kondisi_barang_nama);
            // xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file KondisiBarang.php */
/* Location: ./application/controllers/KondisiBarang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */