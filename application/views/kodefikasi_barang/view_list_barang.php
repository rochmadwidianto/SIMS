<section class="content-header">
    <h1>
        Kodefikasi Barang
        <small>Daftar Kodefikasi Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen Referensi</a></li>
        <li class="active">Kodefikasi Barang</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <h3 class='box-title'><a href="<?php echo base_url('kodefikasiBarang/add'); ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah</a></h3>
                            <label calss='control-label' ></label>
                </div>
                <div class="box-body table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="25px">No</th>
                                <th width="200px">Kode</th>
                                <th>Nama</th>
                                <th>Sub Kelompok Barang</th>
                                <th width="70px">Aksi</th>
                            </tr>
                        </thead>
                       <?php
                       $no=1;
                       function chek($id) {
                            $CI = get_instance();
                            $result = $CI->db->get_where('sub_kelompok_barang_ref', array('sub_kelompok_barang_id' => $id))->row_array();
                            return $result['sub_kelompok_barang_nama'];
                        }
                       foreach ($barang as $r){    
                        $sub_kelompok_ref = $r->barang_sub_kelompok_barang_id == 0 ? '-- PILIH --' : chek($r->barang_sub_kelompok_barang_id);
                           echo"
                               <tr>
                               <td align='center'>$no</td>
                               <td>".$r->barang_kode."</td>
                               <td>".$r->barang_nama."</td>
                               <td>".$sub_kelompok_ref."</td>                                                       
                               <td align='center' nowrap>" . anchor('kodefikasiBarang/edit/' . $r->barang_id, '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'Ubah', 'class' => 'btn btn-warning btn-xs')) . " " . anchor('kodefikasiBarang/delete/' . $r->barang_id, '<i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')", 'class' => 'btn btn-danger btn-xs')) . "</td>
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