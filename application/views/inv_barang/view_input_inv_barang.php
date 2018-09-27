<section class="content-header">
    <h1>
        Tambah
        <small>Inventarisasi Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen referensi</a></li>
        <li class="active">Inventarisasi Barang</li>
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
                    echo form_open('invBarang/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Kodefikasi Barang</label>
                            <select name='inv_barang_barang_id' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                                <?php
                                if (!empty($barang)) {
                                    foreach ($barang as $val) {
                                        echo "<option value=".$val->barang_id.">".$val->barang_nama."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="text" name="inv_barang_kode" class="form-control" required oninvalid="setCustomValidity('Isikan Kode Inventarisasi!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Inventarisasi" >
                                   <?php echo form_error('inv_barang_kode', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="inv_barang_nama" required oninvalid="setCustomValidity('Isikan Nama Inventarisasi!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Inventarisasi">
                            <?php echo form_error('inv_barang_nama', '<div class="text-red">', '</div>'); ?>
                        </div>    
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Simpan</button>                        
                        <a href="<?php echo site_url('invBarang'); ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>