<section class="content-header">
    <h1>
        Tambah
        <small>Kodefikasi Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen referensi</a></li>
        <li class="active">Kodefikasi Barang</li>
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
                    echo form_open('kodefikasiBarang/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Sub Kelompok Barang</label>
                            <select name='barang_sub_kelompok_barang_id' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                                <?php
                                if (!empty($sub_kelompok)) {
                                    foreach ($sub_kelompok as $val) {
                                        echo "<option value=".$val->sub_kelompok_barang_id.">".$val->sub_kelompok_barang_nama."</option>";                                        
                                    }
                                }
                                ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="text" name="barang_kode" class="form-control" required oninvalid="setCustomValidity('Isikan Kode Barang!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Barang" >
                                   <?php echo form_error('sbarang_kode', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="barang_nama" required oninvalid="setCustomValidity('Isikan Nama Barang!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Barang">
                            <?php echo form_error('barang_nama', '<div class="text-red">', '</div>'); ?>
                        </div>    
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Simpan</button>                        
                        <a href="<?php echo site_url('kodefikasiBarang'); ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>