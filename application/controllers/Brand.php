<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brand extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mBrand');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $brand = $this->mBrand->get_all();

        $data = array(
            'brand_data' => $brand
        );

        $this->template->display('brand/view_brand_list', $data);
    }

    public function read($id) {
        $row = $this->mBrand->get_by_id($id);
        if ($row) {
            $data = array(
                'brand_id' => $row->brand_id,
                'brand_kode' => $row->brand_kode,
                'brand_nama' => $row->brand_nama,
                'brand_keterangan' => $row->brand_keterangan,
            );
            $this->template->display('brand/view_brand_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('brand'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('brand/create_action'),
            'brand_id' => set_value('brand_id'),
            'brand_kode' => set_value('brand_kode'),
            'brand_nama' => set_value('brand_nama'),
            'brand_keterangan' => set_value('brand_keterangan'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('brand/view_brand_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'brand_kode' => $this->input->post('brand_kode', TRUE),
                'brand_nama' => $this->input->post('brand_nama', TRUE),
                'brand_keterangan' => $this->input->post('brand_keterangan', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mBrand->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('brand'));
        }
    }

    public function update($id) {
        $row = $this->mBrand->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('brand/update_action'),
                'brand_id' => set_value('brand_id', $row->brand_id),
                'brand_kode' => set_value('brand_kode', $row->brand_kode),
                'brand_nama' => set_value('brand_nama', $row->brand_nama),
                'brand_keterangan' => set_value('brand_keterangan', $row->brand_keterangan),
            );
            $this->template->display('brand/view_brand_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('brand'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('brand_id', TRUE));
        } else {
            $data = array(
                'brand_kode' => $this->input->post('brand_kode', TRUE),
                'brand_nama' => $this->input->post('brand_nama', TRUE),
                'brand_keterangan' => $this->input->post('brand_keterangan', TRUE),
            );

            $this->mBrand->update($this->input->post('brand_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('brand'));
        }
    }

    public function delete($id) {
        $row = $this->mBrand->get_by_id($id);

        if ($row) {
            $this->mBrand->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('brand'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('brand'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('brand_kode', 'brand_kode', 'trim');
        $this->form_validation->set_rules('brand_nama', 'brand_nama', 'trim');
        $this->form_validation->set_rules('brand_keterangan', 'brand_keterangan', 'trim');
        $this->form_validation->set_rules('brand_id', 'brand_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "brand.xls";
        $judul = "Brand";
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

        foreach ($this->mBrand->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->brand_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->brand_nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->brand_keterangan);
            // xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Brand.php */
/* Location: ./application/controllers/Brand.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */