<section class="content-header">
    <h1>
        Tambah
        <small>Sub Kelompok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen referensi</a></li>
        <li class="active">Sub Kelompok Barang</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open('subKelompokBarang/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Kelompok Barang</label>
                            <select name='sub_kelompok_kelompok_barang_id' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                                <?php
                                if (!empty($kelompok)) {
                                    foreach ($kelompok as $val) {
                                        echo "<option value=".$val->kelompok_barang_id.">".$val->kelompok_barang_nama."</option>";                                        
                                    }
                                }
                                ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="text" name="sub_kelompok_barang_kode" class="form-control" required oninvalid="setCustomValidity('Isikan Kode Sub Kelompok!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Sub Kelompok" >
                                   <?php echo form_error('sub_kelompok_barang_kode', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="sub_kelompok_barang_nama" required oninvalid="setCustomValidity('Isikan Nama Sub Kelompok!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Sub Kelompok">
                            <?php echo form_error('sub_kelompok_barang_nama', '<div class="text-red">', '</div>'); ?>
                        </div>    
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Simpan</button>                        
                        <a href="<?php echo site_url('subKelompokBarang'); ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>