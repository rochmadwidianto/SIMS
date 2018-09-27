<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SubKelompokBarang extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }
    
    function index() {       
        $data['kelompok']=  $this->db->get('sub_kelompok_barang_ref')->result();
        $this->template->display('sub_kelompok_barang/view_list_sub_kelompok_barang',$data);
    }
    
    function add() {
        if(isset($_POST['submit'])) {
            $data   =   array(  'sub_kelompok_barang_kode' =>  $_POST['sub_kelompok_barang_kode'],
                                'sub_kelompok_barang_nama'      =>  $_POST['sub_kelompok_barang_nama'],
                                'sub_kelompok_kelompok_barang_id'  =>  $_POST['sub_kelompok_kelompok_barang_id'],
                                'user_id' => $this->session->userdata('user_id'));
            $this->db->insert('sub_kelompok_barang_ref',$data);
            redirect('SubKelompokBarang');
        }
        else {
            $data['kelompok']=  $this->db->get('kelompok_barang_ref')->result();          
            $this->template->display('sub_kelompok_barang/view_input_sub_kelompok_barang',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $data   =   array(  'sub_kelompok_barang_kode' =>  $_POST['sub_kelompok_barang_kode'],
                                'sub_kelompok_barang_nama'      =>  $_POST['sub_kelompok_barang_nama'],
                                'sub_kelompok_kelompok_barang_id'  =>  $_POST['sub_kelompok_kelompok_barang_id'],
                                'user_id' => $this->session->userdata('user_id'));

            $this->db->where('sub_kelompok_barang_id',$_POST['sub_kelompok_barang_id']);
            $this->db->update('sub_kelompok_barang_ref',$data);
            redirect('SubKelompokBarang');
        }
        else {
            $id= $this->uri->segment(3);
            $data['sub_kelompok']=  $this->db->get_where('sub_kelompok_barang_ref',array('sub_kelompok_barang_id'=> $id))->row_array();
            $data['kelompok']=  $this->db->get('kelompok_barang_ref')->result();     
            $this->template->display('sub_kelompok_barang/view_edit_sub_kelompok_barang',$data);
        }
    }
    
    
    function delete($id){
        $this->db->where('sub_kelompok_barang_id',$id);
        $this->db->delete('sub_kelompok_barang_ref');
        redirect('SubKelompokBarang');
    }
}