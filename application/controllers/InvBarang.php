<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class InvBarang extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }
    
    function index() {       
        $data['barang']=  $this->db->get('inv_barang')->result();
        $this->template->display('inv_barang/view_list_inv_barang',$data);
    }
    
    function add() {
        if(isset($_POST['submit'])) {
            $data   =   array(  'inv_barang_kode' =>  $_POST['inv_barang_kode'],
                                'inv_barang_nama'      =>  $_POST['inv_barang_nama'],
                                'inv_barang_barang_id'  =>  $_POST['inv_barang_barang_id'],
                                'user_id' => $this->session->userdata('user_id'));
            $this->db->insert('inv_barang',$data);
            redirect('InvBarang');
        }
        else {
            $data['barang']=  $this->db->get('barang_ref')->result();          
            $this->template->display('inv_barang/view_input_inv_barang',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $data   =   array(  'inv_barang_kode' =>  $_POST['inv_barang_kode'],
                                'inv_barang_nama'      =>  $_POST['inv_barang_nama'],
                                'inv_barang_barang_id'  =>  $_POST['inv_barang_barang_id'],
                                'user_id' => $this->session->userdata('user_id'));

            $this->db->where('inv_barang_id',$_POST['inv_barang_id']);
            $this->db->update('inv_barang',$data);
            redirect('InvBarang');
        }
        else {
            $id = $this->uri->segment(3);
            $data['inv_barang'] =  $this->db->get_where('inv_barang',array('inv_barang_id'=> $id))->row_array();
            $data['barang'] =  $this->db->get('barang_ref')->result();     
            $this->template->display('inv_barang/view_edit_inv_barang',$data);
        }
    }
    
    
    function delete($id){
        $this->db->where('inv_barang_id',$id);
        $this->db->delete('inv_barang');
        redirect('InvBarang');
    }
}