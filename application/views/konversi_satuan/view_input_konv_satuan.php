<section class="content-header">
    <h1>
        Tambah
        <small>Konversi satuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen referensi</a></li>
        <li class="active">Konversi Satuan</li>
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
                    echo form_open('konversiSatuan/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="text" name="konv_satuan_kode" class="form-control" required oninvalid="setCustomValidity('Isikan Kode Konversi Satuan!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Konversi Satuan" >
                                   <?php echo form_error('konv_satuan_kode', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="example">Nama</label>
                            <input type="text" name="konv_satuan_nama" class="form-control" required oninvalid="setCustomValidity('Isikan Nama Konversi Satuan!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Konversi Satuan" >
                                   <?php echo form_error('konv_satuan_nama', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nilai</label>
                            <input type="text" class="form-control" name="konv_satuan_nilai" required oninvalid="setCustomValidity('Isikan Nilai Konversi Satuan!')"
                                   oninput="setCustomValidity('')" placeholder="Nilai Konversi satuan">
                            <?php echo form_error('konv_satuan_nilai', '<div class="text-red">', '</div>'); ?>
                        </div>   
                        <div class="form-group">
                            <label for="">Satuan Barang</label>
                            <select name='konv_satuan_satuan_id' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                                <?php
                                if (!empty($satuan)) {
                                    foreach ($satuan as $val) {
                                        echo "<option value=".$val->satuan_id.">".$val->satuan_nama."</option>";                                        
                                    }
                                }
                                ?>
                            </select>
                        </div>   
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Simpan</button>                        
                        <a href="<?php echo site_url('konversiSatuan'); ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>