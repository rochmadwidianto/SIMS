<section class="content-header">
    <h1>
        Ubah
        <small>Konversi Satuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
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
                    echo form_open('konversisatuan/edit');
                ?>
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="hidden"  name="konv_satuan_id" value="<?php echo $konv_satuan['konv_satuan_id'] ?>" >
                            <input type="tex" name="konv_satuan_kode" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Kode Konversi Satuan!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Konversi Satuan" value="<?php echo $konv_satuan['konv_satuan_kode']; ?>" >
                        </div> 
                        <div class="form-group">
                            <label for="example">Nama</label>
                            <input type="tex" name="konv_satuan_nama" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Nama Konversi Satuan!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Konversi Satuan" value="<?php echo $konv_satuan['konv_satuan_nama']; ?>" >
                        </div> 
                        <div class="form-group">
                            <label for="example">Nilai</label>                           
                            <input type="tex" name="konv_satuan_nilai" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Nilai Konversi Satuan!')"
                                   oninput="setCustomValidity('')" placeholder="Nilai Konversi Satuan" value="<?php echo $konv_satuan['konv_satuan_nilai']; ?>" >
                        </div>                       
                        <div class="form-group">
                                <label>Satuan Barang</label>
                                <select name="konv_satuan_satuan_id" class="form-control">
                                    <option value='0'>-- PILIH --</option>
                                    <?php
                                    foreach ($satuan as $sat) {
                                        echo "<option value='$sat->satuan_id'";
                                        echo $konv_satuan['konv_satuan_satuan_id'] == $sat->satuan_id ? 'selected' : '';
                                        echo">$sat->satuan_nama</option>";
                                    }
                                    ?>
                                </select>
                        </div>                      
                                           
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Simpan</button>
                        <a href="<?php echo site_url('konversisatuan'); ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>