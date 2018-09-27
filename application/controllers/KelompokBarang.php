<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KelompokBarang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mKelompokBarang');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $kelompokBarang = $this->mKelompokBarang->get_all();

        $data = array(
            'kelompok_barang' => $kelompokBarang
        );

        $this->template->display('kelompok_barang/view_kelompok_barang_list', $data);
    }

    public function read($id) {
        $row = $this->mKelompokBarang->get_by_id($id);
        if ($row) {
            $data = array(
                'kelompok_barang_id' => $row->kelompok_barang_id,
                'kelompok_barang_kode' => $row->kelompok_barang_kode,
                'kelompok_barang_nama' => $row->kelompok_barang_nama,
            );
            $this->template->display('kelompok_barang/view_kelompok_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('KelompokBarang'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('KelompokBarang/create_action'),
            'kelompok_barang_id' => set_value('kelompok_barang_id'),
            'kelompok_barang_kode' => set_value('kelompok_barang_kode'),
            'kelompok_barang_nama' => set_value('kelompok_barang_nama'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('kelompok_barang/view_kelompok_barang_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kelompok_barang_kode' => $this->input->post('kelompok_barang_kode', TRUE),
                'kelompok_barang_nama' => $this->input->post('kelompok_barang_nama', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mKelompokBarang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('KelompokBarang'));
        }
    }

    public function update($id) {
        $row = $this->mKelompokBarang->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('KelompokBarang/update_action'),
                'kelompok_barang_id' => set_value('kelompok_barang_id', $row->kelompok_barang_id),
                'kelompok_barang_kode' => set_value('kelompok_barang_kode', $row->kelompok_barang_kode),
                'kelompok_barang_nama' => set_value('kelompok_barang_nama', $row->kelompok_barang_nama),
            );
            $this->template->display('kelompok_barang/view_kelompok_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('KelompokBarang'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kelompok_barang_id', TRUE));
        } else {
            $data = array(
                'kelompok_barang_kode' => $this->input->post('kelompok_barang_kode', TRUE),
                'kelompok_barang_nama' => $this->input->post('kelompok_barang_nama', TRUE),
            );

            $this->mKelompokBarang->update($this->input->post('kelompok_barang_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('KelompokBarang'));
        }
    }

    public function delete($id) {
        $row = $this->mKelompokBarang->get_by_id($id);

        if ($row) {
            $this->mKelompokBarang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('KelompokBarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('KelompokBarang'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('kelompok_barang_nama', 'kelompok_barang_nama', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('kelompok_barang_kode', 'kelompok_barang_kode', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('kelompok_barang_id', 'kelompok_barang_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "kelompok_barang.xls";
        $judul = "Kelompok Barang";
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

        foreach ($this->mKelompokBarang->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelompok_barang_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelompok_barang_nama);
            // xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file KelompokBarang.php */
/* Location: ./application/controllers/KelompokBarang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */