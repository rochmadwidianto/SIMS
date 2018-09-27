<section class='content-header'>
    <h1>
        Konsumen
        <small>Form Konsumen</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Konsumen</li>
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
                                <div class='form-group'>Kode <?php echo form_error('konsumen_kode') ?>
                                    <input type="text" class="form-control" name="konsumen_kode" id="konsumen_kode" placeholder="Kode Outlet" autofocus value="<?php echo $konsumen_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('konsumen_nama') ?>
                                    <input type="text" class="form-control" name="konsumen_nama" id="konsumen_nama" placeholder="Nama Outlet" value="<?php echo $konsumen_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Pemilik <?php echo form_error('konsumen_nama_pemilik') ?>
                                    <input type="text" class="form-control" name="konsumen_nama_pemilik" id="konsumen_nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $konsumen_nama_pemilik; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Telp <?php echo form_error('konsumen_telp') ?>
                                    <input type="text" class="form-control" name="konsumen_telp" id="konsumen_telp" placeholder="Telephone Supplier" value="<?php echo $konsumen_telp; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Alamat <?php echo form_error('konsumen_alamat') ?>
                                    <textarea type="text" class="form-control" name="konsumen_alamat" id="konsumen_alamat" placeholder="Alamat Supplier"><?php echo $konsumen_alamat; ?></textarea>
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="konsumen_id" value="<?php echo $konsumen_id; ?>" /> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> <?php echo $button ?></button> 
                                <a href="<?php echo site_url('jabatan') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->