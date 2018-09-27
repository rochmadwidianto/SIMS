<section class="content-header">
    <h1>
        Ubah
        <small>Sub Kelompok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
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
                    echo form_open('subKelompokBarang/edit');
                ?>
                    
                    <div class="box-body">                   
                        <div class="form-group">
                                <label>Kelompok Barang</label>
                                <select name="sub_kelompok_kelompok_barang_id" class="form-control">
                                    <option value='0'>-- PILIH --</option>
                                    <?php
                                    foreach ($kelompok as $kel) {
                                        echo "<option value='$kel->kelompok_barang_id'";
                                        echo $sub_kelompok['sub_kelompok_kelompok_barang_id'] == $kel->kelompok_barang_id ? 'selected' : '';
                                        echo">$kel->kelompok_barang_nama</option>";
                                    }
                                    ?>
                                </select>
                        </div>  
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="hidden"  name="sub_kelompok_barang_id" value="<?php echo $sub_kelompok['sub_kelompok_barang_id'] ?>" >
                            <input type="tex" name="sub_kelompok_barang_kode" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Kode Sub Kelompok!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Sub Kelompok" value="<?php echo $sub_kelompok['sub_kelompok_barang_kode']; ?>" >
                        </div> 
                        <div class="form-group">
                            <label for="example">Nama</label>                           
                            <input type="tex" name="sub_kelompok_barang_nama" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Nama Sub Kelompok!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Sub Kelompok" value="<?php echo $sub_kelompok['sub_kelompok_barang_nama']; ?>" >
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