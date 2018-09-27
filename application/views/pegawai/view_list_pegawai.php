<section class="content-header">
    <h1>
        Pegawai
        <small>Daftar Pegawai</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen Referensi</a></li>
        <li class="active">Pegawai</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <h3 class='box-title'><a href="<?php echo base_url('pegawai/add'); ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah</a></h3>
                            <label calss='control-label' ></label>
                </div>
                <div class="box-body table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="25px">No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th>Tempat & Tanggal Lahir</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th width="70px">Aksi</th>
                            </tr>
                        </thead>
                       <?php
                       $no=1;

                       function arrJabatan($id) {
                            $CI = get_instance();
                            $result = $CI->db->get_where('jabatan_ref', array('jabatan_id' => $id))->row_array();
                            return $result['jabatan_nama'];
                        }

                       foreach ($pegawai as $val){    
                        $jabatan_nama = $val->pegawai_jabatan_id == 0 ? '' : arrJabatan($val->pegawai_jabatan_id);
                           echo"
                               <tr>
                               <td align='center'>$no</td>
                               <td>".$val->pegawai_kode."</td>
                               <td>".$val->pegawai_nama."</td>
                               <td>".$jabatan_nama."</td>
                               <td>".$val->pegawai_gender."</td>
                               <td>".$val->pegawai_agama."</td>
                               <td>".$val->pegawai_status_kawin."</td>
                               <td>".$val->pegawai_tempat_lahir.', '.date('d F Y', strtotime($val->pegawai_tanggal_lahir))."</td>
                               <td>".$val->pegawai_kontak."</td>
                               <td>".$val->pegawai_email."</td>
                               <td>".$val->pegawai_alamat."</td>                                                       
                               <td align='center' nowrap>" . anchor('pegawai/edit/' . $val->pegawai_id, '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'Ubah', 'class' => 'btn btn-warning btn-xs')) . " " . anchor('pegawai/delete/' . $val->pegawai_id, '<i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')", 'class' => 'btn btn-danger btn-xs')) . "</td>
                               </tr>";
                           $no++;
                       }
                       ?>
                    </Table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<script src="<?php echo base_url('assets/js/jquery-1.12.0.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>