<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class KonversiSatuan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }
    
    function index() {       
        $data['satuan']=  $this->db->get('konversi_satuan_ref')->result();
        $this->template->display('konversi_satuan/view_list_konv_satuan',$data);
    }
    
    function add() {
        if(isset($_POST['submit'])) {
            $data   =   array(  'konv_satuan_kode' =>  $_POST['konv_satuan_kode'],
                                'konv_satuan_nama' =>  $_POST['konv_satuan_nama'],
                                'konv_satuan_nilai'      =>  $_POST['konv_satuan_nilai'],
                                'konv_satuan_satuan_id'  =>  $_POST['konv_satuan_satuan_id'],
                                'user_id' => $this->session->userdata('user_id'));
            $this->db->insert('konversi_satuan_ref',$data);
            redirect('KonversiSatuan');
        }
        else {
            $data['satuan']=  $this->db->get('satuan_ref')->result();          
            $this->template->display('konversi_satuan/view_input_konv_satuan',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $data   =   array(  'konv_satuan_kode' =>  $_POST['konv_satuan_kode'],
                                'konv_satuan_nama' =>  $_POST['konv_satuan_nama'],
                                'konv_satuan_nilai'      =>  $_POST['konv_satuan_nilai'],
                                'konv_satuan_satuan_id'  =>  $_POST['konv_satuan_satuan_id'],
                                'user_id' => $this->session->userdata('user_id'));

            $this->db->where('konv_satuan_id',$_POST['konv_satuan_id']);
            $this->db->update('konversi_satuan_ref',$data);
            redirect('KonversiSatuan');
        }
        else {
            $id= $this->uri->segment(3);
            $data['konv_satuan']=  $this->db->get_where('konversi_satuan_ref',array('konv_satuan_id'=> $id))->row_array();
            $data['satuan']=  $this->db->get('satuan_ref')->result();     
            $this->template->display('konversi_satuan/view_edit_konv_satuan',$data);
        }
    }
    
    
    function delete($id){
        $this->db->where('konv_satuan_id',$id);
        $this->db->delete('konversi_satuan_ref');
        redirect('KonversiSatuan');
    }
}