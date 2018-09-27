<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class KodefikasiBarang extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }
    
    function index() {       
        $data['barang']=  $this->db->get('barang_ref')->result();
        $this->template->display('kodefikasi_barang/view_list_barang',$data);
    }
    
    function add() {
        if(isset($_POST['submit'])) {
            $data   =   array(  'barang_kode' =>  $_POST['barang_kode'],
                                'barang_nama'      =>  $_POST['barang_nama'],
                                'barang_sub_kelompok_barang_id'  =>  $_POST['barang_sub_kelompok_barang_id'],
                                'user_id' => $this->session->userdata('user_id'));
            $this->db->insert('barang_ref',$data);
            redirect('KodefikasiBarang');
        }
        else {
            $data['sub_kelompok']=  $this->db->get('sub_kelompok_barang_ref')->result();          
            $this->template->display('kodefikasi_barang/view_input_barang',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $data   =   array(  'barang_kode' =>  $_POST['barang_kode'],
                                'barang_nama'      =>  $_POST['barang_nama'],
                                'barang_sub_kelompok_barang_id'  =>  $_POST['barang_sub_kelompok_barang_id'],
                                'user_id' => $this->session->userdata('user_id'));

            $this->db->where('barang_id',$_POST['barang_id']);
            $this->db->update('barang_ref',$data);
            redirect('KodefikasiBarang');
        }
        else {
            $id= $this->uri->segment(3);
            $data['barang']=  $this->db->get_where('barang_ref',array('barang_id'=> $id))->row_array();
            $data['sub_kelompok']=  $this->db->get('sub_kelompok_barang_ref')->result();     
            $this->template->display('kodefikasi_barang/view_edit_barang',$data);
        }
    }
    
    
    function delete($id){
        $this->db->where('barang_id',$id);
        $this->db->delete('barang_ref');
        redirect('KodefikasiBarang');
    }
}