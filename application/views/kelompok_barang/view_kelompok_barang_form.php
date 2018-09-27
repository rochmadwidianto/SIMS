<section class='content-header'>
    <h1>
        Kelompok Barang
        <small>Form Kelompok Barang</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Kelompok Barang</li>
    </ol>
</section>        
<section class='content'>
    <div class='row'>
        <!-- left column -->
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class='box box-primary'>
                <div class='box-header'>
                    <div class='col-md-5'>
                        <form action="<?php echo $action; ?>" method="post">
                            <div class='box-body'>
                                <div class='form-group'>Kode <?php echo form_error('kelompok_barang_kode') ?>
                                    <input type="text" class="form-control" name="kelompok_barang_kode" id="kelompok_barang_kode" placeholder="Kode Kelompok Barang" autofocus value="<?php echo $kelompok_barang_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('kelompok_barang_nama') ?>
                                    <input type="text" class="form-control" name="kelompok_barang_nama" id="kelompok_barang_nama" placeholder="Nama Kelompok Barang" autofocus value="<?php echo $kelompok_barang_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="kelompok_barang_id" value="<?php echo $kelompok_barang_id; ?>" /> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> <?php echo $button ?></button> 
                                <a href="<?php echo site_url('kelompokBarang') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->