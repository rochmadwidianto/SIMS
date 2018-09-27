<section class='content-header'>
    <h1>
        Supplier
        <small>Form Supplier</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Manajemen Referensi</a></li>
        <li class='active'>Form Supplier</li>
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
                                <div class='form-group'>Kode <?php echo form_error('supplier_kode') ?>
                                    <input type="text" class="form-control" name="supplier_kode" id="supplier_kode" placeholder="Kode Supplier" autofocus value="<?php echo $supplier_kode; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Nama <?php echo form_error('supplier_nama') ?>
                                    <input type="text" class="form-control" name="supplier_nama" id="supplier_nama" placeholder="Nama Supplier" value="<?php echo $supplier_nama; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Telp <?php echo form_error('supplier_telp') ?>
                                    <input type="text" class="form-control" name="supplier_telp" id="supplier_telp" placeholder="Telephone Supplier" value="<?php echo $supplier_telp; ?>" />
                                </div>                                
                            </div>
                            <div class='box-body'>
                                <div class='form-group'>Alamat <?php echo form_error('supplier_alamat') ?>
                                    <textarea type="text" class="form-control" name="supplier_alamat" id="supplier_alamat" placeholder="Alamat Supplier"><?php echo $supplier_alamat; ?></textarea>
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="supplier_id" value="<?php echo $supplier_id; ?>" /> 
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