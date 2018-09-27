<section class='content-header'>
    <h1>
        Jabatan
        <small>Form Jabatan</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Jabatan</li>
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
                                <div class='form-group'>Kode <?php echo form_error('jabatan_kode') ?>
                                    <input type="text" class="form-control" name="jabatan_kode" id="jabatan_kode" placeholder="Kode Jabatan" autofocus value="<?php echo $jabatan_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('jabatan_nama') ?>
                                    <input type="text" class="form-control" name="jabatan_nama" id="jabatan_nama" placeholder="Nama Jabatan" value="<?php echo $jabatan_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Keterangan <?php echo form_error('jabatan_keterangan') ?>
                                    <textarea type="text" class="form-control" name="jabatan_keterangan" id="jabatan_keterangan" placeholder="Keterangan Jabatan"><?php echo $jabatan_keterangan; ?></textarea>
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="jabatan_id" value="<?php echo $jabatan_id; ?>" /> 
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