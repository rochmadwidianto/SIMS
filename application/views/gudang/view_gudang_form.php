<section class='content-header'>
    <h1>
        Gudang
        <small>Form Gudang</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Gudang</li>
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
                                <div class='form-group'>Kode <?php echo form_error('gudang_kode') ?>
                                    <input type="text" class="form-control" name="gudang_kode" id="gudang_kode" placeholder="Kode Gudang" autofocus value="<?php echo $gudang_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('gudang_nama') ?>
                                    <input type="text" class="form-control" name="gudang_nama" id="gudang_nama" placeholder="Nama Gudang" value="<?php echo $gudang_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Keterangan <?php echo form_error('gudang_keterangan') ?>
                                    <textarea type="text" class="form-control" name="gudang_keterangan" id="gudang_keterangan" placeholder="Keterangan Gudang"><?php echo $gudang_keterangan; ?></textarea>
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="gudang_id" value="<?php echo $gudang_id; ?>" /> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> <?php echo $button ?></button> 
                                <a href="<?php echo site_url('gudang') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->