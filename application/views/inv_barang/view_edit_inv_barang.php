<section class="content-header">
    <h1>
        Ubah
        <small>Inventarisasi Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
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
                    echo form_open('invBarang/edit');
                ?>
                    
                    <div class="box-body">                   
                        <div class="form-group">
                                <label>Kodefikasi Barang</label>
                                <select name="inv_barang_barang_id" class="form-control">
                                    <option value='0'>-- PILIH --</option>
                                    <?php
                                    foreach ($barang as $brg) {
                                        echo "<option value='$brg->barang_id'";
                                        echo $inv_barang['inv_barang_barang_id'] == $brg->barang_id ? 'selected' : '';
                                        echo">$brg->barang_nama</option>";
                                    }
                                    ?>
                                </select>
                        </div>  
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="hidden"  name="inv_barang_id" value="<?php echo $inv_barang['inv_barang_id'] ?>" >
                            <input type="tex" name="inv_barang_kode" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Kode Inventarisasi!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Inventarisasi" value="<?php echo $inv_barang['inv_barang_kode']; ?>" >
                        </div> 
                        <div class="form-group">
                            <label for="example">Nama</label>                           
                            <input type="tex" name="inv_barang_nama" class="form-control" id="inputError" required oninvalid="setCustomValidity('Isikan Nama Inventarisasi!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Inventarisasi" value="<?php echo $inv_barang['inv_barang_nama']; ?>" >
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