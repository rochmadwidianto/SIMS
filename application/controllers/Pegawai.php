<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {       
        $data['pegawai']=  $this->db->get('pegawai_ref')->result();
        $data['jabatan']=  $this->db->get('jabatan_ref')->result();
        $this->template->display('pegawai/view_list_pegawai',$data);
    }
    
    function add() {
        if(isset($_POST['submit'])) {
            $data   =   array(  'pegawai_kode' =>  $_POST['pegawai_kode'],
                                'pegawai_nama'      =>  $_POST['pegawai_nama'],
                                'pegawai_gender'      =>  $_POST['pegawai_gender'],
                                'pegawai_agama'      =>  $_POST['pegawai_agama'],
                                'pegawai_status_kawin'      =>  $_POST['pegawai_status_kawin'],
                                'pegawai_tempat_lahir'      =>  $_POST['pegawai_tempat_lahir'],
                                'pegawai_tanggal_lahir'      =>  $_POST['pegawai_tanggal_lahir'],
                                'pegawai_kontak'      =>  $_POST['pegawai_kontak'],
                                'pegawai_email'      =>  $_POST['pegawai_email'],
                                'pegawai_alamat'      =>  $_POST['pegawai_alamat'],
                                'pegawai_jabatan_id'  =>  $_POST['pegawai_jabatan_id'],
                                'user_id' => $this->session->userdata('user_id'));
            $this->db->insert('pegawai_ref',$data);
            redirect('Pegawai');
        }
        else {
            $data['jabatan']=  $this->db->get('jabatan_ref')->result();          
            $this->template->display('pegawai/view_input_pegawai',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $data   =   array(  'pegawai_kode' =>  $_POST['pegawai_kode'],
                                'pegawai_nama'      =>  $_POST['pegawai_nama'],
                                'pegawai_gender'      =>  $_POST['pegawai_gender'],
                                'pegawai_agama'      =>  $_POST['pegawai_agama'],
                                'pegawai_status_kawin'      =>  $_POST['pegawai_status_kawin'],
                                'pegawai_tempat_lahir'      =>  $_POST['pegawai_tempat_lahir'],
                                'pegawai_tanggal_lahir'      =>  $_POST['pegawai_tanggal_lahir'],
                                'pegawai_kontak'      =>  $_POST['pegawai_kontak'],
                                'pegawai_email'      =>  $_POST['pegawai_email'],
                                'pegawai_alamat'      =>  $_POST['pegawai_alamat'],
                                'pegawai_jabatan_id'  =>  $_POST['pegawai_jabatan_id'],
                                'user_id' => $this->session->userdata('user_id'));

            $this->db->where('pegawai_id',$_POST['pegawai_id']);
            $this->db->update('pegawai_ref',$data);
            redirect('Pegawai');
        }
        else {
            $id= $this->uri->segment(3);
            $data['pegawai']=  $this->db->get_where('pegawai_ref',array('pegawai_id'=> $id))->row_array();
            $data['jabatan']=  $this->db->get('jabatan_ref')->result();     
            $this->template->display('pegawai/view_edit_pegawai',$data);
        }
    }
    
    function delete($id){
        $this->db->where('pegawai_id',$id);
        $this->db->delete('pegawai_ref');
        redirect('Pegawai');
    }
}