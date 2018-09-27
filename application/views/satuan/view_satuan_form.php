<section class='content-header'>
    <h1>
        Satuan
        <small>Form Satuan</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Satuan</li>
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
                                <div class='form-group'>Kode <?php echo form_error('satuan_kode') ?>
                                    <input type="text" class="form-control" name="satuan_kode" id="satuan_kode" placeholder="Kode Satuan Barang" autofocus value="<?php echo $satuan_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('satuan_nama') ?>
                                    <input type="text" class="form-control" name="satuan_nama" id="satuan_nama" placeholder="Nama Satuan Barang" autofocus value="<?php echo $satuan_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="satuan_id" value="<?php echo $satuan_id; ?>" /> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> <?php echo $button ?></button> 
                                <a href="<?php echo site_url('satuan') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->