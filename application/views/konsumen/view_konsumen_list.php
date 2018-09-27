<section class='content-header'>
    <h1>
        Konsumen
        <small>Daftar Konsumen</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Daftar Konsumen</li>
    </ol>
</section>        
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>  
                <div class='box-header with-border'>
                    <h3 class='box-title'><?php echo anchor('konsumen/create/', '<i class="fa fa-plus"></i> Tambah', array('class' => 'btn btn-success btn-sm')); ?>
                        <?php echo anchor(site_url('konsumen/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
                    <table class="table table-bordered table-striped table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th width="25px">No</th>
                                <th width="200px">Kode</th>
                                <th>Nama</th>
                                <th>Nama Pemilik</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th width="70px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($konsumen_data as $konsumen) {
                                ?>
                                <tr>
                                    <td align="center"><?php echo ++$start ?></td>
                                    <td><?php echo $konsumen->konsumen_kode ?></td>
                                    <td><?php echo $konsumen->konsumen_nama ?></td>
                                    <td><?php echo $konsumen->konsumen_nama_pemilik ?></td>
                                    <td><?php echo $konsumen->konsumen_telp ?></td>
                                    <td><?php echo $konsumen->konsumen_alamat ?></td>
                                    <td align="center" nowrap>
                                        <?php
                                        echo anchor(site_url('konsumen/update/' . $konsumen->konsumen_id), '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'Ubah', 'class' => 'btn btn-warning btn-xs'));
                                        ?>
                                        <?php
                                        echo anchor(site_url('konsumen/delete/' . $konsumen->konsumen_id), '<i class="fa fa-trash"></i>', array('data-toggle' => 'tooltip', 'title' => 'Hapus', 'class' => 'btn btn-danger btn-xs'));
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>
