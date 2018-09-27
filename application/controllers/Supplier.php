<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mSupplier');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $supplier = $this->mSupplier->get_all();

        $data = array(
            'supplier_data' => $supplier
        );

        $this->template->display('supplier/view_supplier_list', $data);
    }

    public function read($id) {
        $row = $this->mSupplier->get_by_id($id);
        if ($row) {
            $data = array(
                'supplier_id' => $row->supplier_id,
                'supplier_kode' => $row->supplier_kode,
                'supplier_nama' => $row->supplier_nama,
                'supplier_telp' => $row->supplier_telp,
                'supplier_alamat' => $row->supplier_alamat,
            );
            $this->template->display('supplier/view_supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('supplier/create_action'),
            'supplier_id' => set_value('supplier_id'),
            'supplier_kode' => set_value('supplier_kode'),
            'supplier_nama' => set_value('supplier_nama'),
            'supplier_telp' => set_value('supplier_telp'),
            'supplier_alamat' => set_value('supplier_alamat'),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->template->display('supplier/view_supplier_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'supplier_kode' => $this->input->post('supplier_kode', TRUE),
                'supplier_nama' => $this->input->post('supplier_nama', TRUE),
                'supplier_telp' => $this->input->post('supplier_telp', TRUE),
                'supplier_alamat' => $this->input->post('supplier_alamat', TRUE),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->mSupplier->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }

    public function update($id) {
        $row = $this->mSupplier->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('supplier/update_action'),
                'supplier_id' => set_value('supplier_id', $row->supplier_id),
                'supplier_kode' => set_value('supplier_kode', $row->supplier_kode),
                'supplier_nama' => set_value('supplier_nama', $row->supplier_nama),
                'supplier_telp' => set_value('supplier_telp', $row->supplier_telp),
                'supplier_alamat' => set_value('supplier_alamat', $row->supplier_alamat),
            );
            $this->template->display('supplier/view_supplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('supplier_id', TRUE));
        } else {
            $data = array(
                'supplier_kode' => $this->input->post('supplier_kode', TRUE),
                'supplier_nama' => $this->input->post('supplier_nama', TRUE),
                'supplier_telp' => $this->input->post('supplier_telp', TRUE),
                'supplier_alamat' => $this->input->post('supplier_alamat', TRUE),
            );

            $this->mSupplier->update($this->input->post('supplier_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }

    public function delete($id) {
        $row = $this->mSupplier->get_by_id($id);

        if ($row) {
            $this->mSupplier->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('supplier_kode', 'supplier_kode', 'trim');
        $this->form_validation->set_rules('supplier_nama', 'supplier_nama', 'trim');
        $this->form_validation->set_rules('supplier_telp', 'supplier_telp', 'trim');
        $this->form_validation->set_rules('supplier_alamat', 'supplier_alamat', 'trim');
        $this->form_validation->set_rules('supplier_id', 'supplier_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "supplier.xls";
        $judul = "Supplier";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Telp");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
        // xlsWriteLabel($tablehead, $kolomhead++, "User");

        foreach ($this->mSupplier->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->supplier_kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->supplier_nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->supplier_telp);
            xlsWriteLabel($tablebody, $kolombody++, $data->supplier_alamat);
            // xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */