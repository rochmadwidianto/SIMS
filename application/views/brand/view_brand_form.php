<section class='content-header'>
    <h1>
        Brand
        <small>Form Brand</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Brand</li>
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
                                <div class='form-group'>Kode <?php echo form_error('brand_kode') ?>
                                    <input type="text" class="form-control" name="brand_kode" id="brand_kode" placeholder="Kode Brand" autofocus value="<?php echo $brand_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('brand_nama') ?>
                                    <input type="text" class="form-control" name="brand_nama" id="brand_nama" placeholder="Nama Brand" value="<?php echo $brand_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Keterangan <?php echo form_error('brand_keterangan') ?>
                                    <textarea type="text" class="form-control" name="brand_keterangan" id="brand_keterangan" placeholder="Keterangan Brand"><?php echo $brand_keterangan; ?></textarea>
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="brand_id" value="<?php echo $brand_id; ?>" /> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> <?php echo $button ?></button> 
                                <a href="<?php echo site_url('brand') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->