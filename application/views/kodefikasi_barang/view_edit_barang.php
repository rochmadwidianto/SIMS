<section class="content-header">
    <h1>
        Ubah
        <small>Kodefikasi Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
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
                    echo form_open('kodefikasiBarang/edit');
                ?>
                    
                    <div class="box-body">                   
                        <div class="form-group">
                                <label>Sub Kelompok Barang</label>
                                <select name="barang_sub_kelompok_barang_id" class="form-control">
                                    <option value='0'>-- PILIH --</option>
                                    <?php
                                    foreach ($sub_kelompok as $kel) {
                                        echo "<option value='$kel->sub_kelompok_barang_id'";
                                        echo $barang['barang_sub_kelompok_barang_id'] == $kel->sub_kelompok_barang_id ? 'selected' : '';
                                        echo">$kel->sub_kelompok_barang_nama</option>";
                                    }
                                    ?>
                                </select>
                        </div>  
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="hidden"  name="barang_id" value="<?php echo $barang['barang_id'] ?>" >
                            <input type="tex" name="sub_kelompok_barang_kode" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Kode Barang!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Barang" value="<?php echo $barang['barang_kode']; ?>" >
                        </div> 
                        <div class="form-group">
                            <label for="example">Nama</label>                           
                            <input type="tex" name="barang_nama" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Nama Barang!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Barang" value="<?php echo $barang['barang_nama']; ?>" >
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