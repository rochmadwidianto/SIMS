<section class="content-header">
    <h1>
        Ubah
        <small>Pegawai</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Manajemen Referensi</a></li>
        <li class="active">Pegawai</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-6">
                <?php
                    echo form_open('pegawai/edit');
                ?>
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Kode</label>
                            <input type="hidden"  name="pegawai_id" value="<?php echo $pegawai['pegawai_id'] ?>" >
                            <input type="text" name="pegawai_kode" class="form-control" value="<?php echo $pegawai['pegawai_kode']; ?>" required oninvalid="setCustomValidity('Isikan Kode Pegawai!')"
                                   oninput="setCustomValidity('')" placeholder="Kode Pegawai" >
                                   <?php echo form_error('pegawai_kode', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="example">Nama</label>
                            <input type="text" name="pegawai_nama" class="form-control" value="<?php echo $pegawai['pegawai_nama']; ?>" required oninvalid="setCustomValidity('Isikan Nama Pegawai!')"
                                   oninput="setCustomValidity('')" placeholder="Nama Pegawai" >
                                   <?php echo form_error('pegawai_nama', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="pegawai_jabatan_id" class="form-control">
                                <option value='0'>-- PILIH --</option>
                                <?php
                                foreach ($jabatan as $val) {
                                    echo "<option value='$val->jabatan_id'";
                                    echo $pegawai['pegawai_jabatan_id'] == $val->jabatan_id ? 'selected' : '';
                                    echo">$val->jabatan_nama</option>";
                                }
                                ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name='pegawai_gender' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                            <option value='Laki - Laki' <?php echo $pegawai['pegawai_gender'] == 'Laki - Laki' ? 'selected' : ''; ?>>
                                Laki - Laki
                            </option>
                            <option value='Perempuan' <?php echo $pegawai['pegawai_gender'] == 'Perempuan' ? 'selected' : ''; ?>>
                                Perempuan
                            </option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select name='pegawai_agama' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                            <option value='Islam' <?php echo $pegawai['pegawai_agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                            <option value='Kristen' <?php echo $pegawai['pegawai_agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                            <option value='Katholik' <?php echo $pegawai['pegawai_agama'] == 'Katholik' ? 'selected' : ''; ?>>Katholik</option>
                            <option value='Hindu' <?php echo $pegawai['pegawai_agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                            <option value='Budha' <?php echo $pegawai['pegawai_agama'] == 'Budha' ? 'selected' : ''; ?>>Budha</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="">Status Kawin</label>
                            <select name='pegawai_status_kawin' class="form-control ">
                            <option value='0'>-- PILIH --</option>
                            <option value='Menikah' <?php echo $pegawai['pegawai_status_kawin'] == 'Menikah' ? 'selected' : ''; ?>>
                                Menikah
                            </option>
                            <option value='Belum Menikah' <?php echo $pegawai['pegawai_status_kawin'] == 'Belum Menikah' ? 'selected' : ''; ?>>
                                Belum Menikah
                            </option>
                            </select>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Simpan</button>
                        <a href="<?php echo site_url('pegawai'); ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="box-body"> 
                        <div class="form-group">
                            <label for="example">Tempat Lahir</label>
                            <input type="text" name="pegawai_tempat_lahir" class="form-control" value="<?php echo $pegawai['pegawai_tempat_lahir']; ?>" required oninvalid="setCustomValidity('Isikan Tempat Lahir!')"
                                   oninput="setCustomValidity('')" placeholder="Tempat Lahir" >
                                   <?php echo form_error('pegawai_tempat_lahir', '<div class="text-red">', '</div>'); ?>
                        </div>   
                        <div class="form-group">
                            <label for="example">Tanggal Lahir</label>
                            <input type="datetime" name="pegawai_tanggal_lahir" class="form-control datepicker" value="<?php echo $pegawai['pegawai_tanggal_lahir']; ?>" required data-date-format="yyyy-mm-dd" id="datepicker" oninvalid="setCustomValidity('Isikan Tanggal Lahir!')"
                                   oninput="setCustomValidity('')" placeholder="Tanggal Lahir" >
                                   <?php echo form_error('pegawai_tanggal_lahir', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="example">Kontak</label>
                            <input type="text" name="pegawai_kontak" class="form-control" value="<?php echo $pegawai['pegawai_kontak']; ?>" required oninvalid="setCustomValidity('Isikan Kontak Pegawai!')"
                                   oninput="setCustomValidity('')" placeholder="Kontak Pegawai" >
                                   <?php echo form_error('pegawai_kontak', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="pegawai_email" value="<?php echo $pegawai['pegawai_email']; ?>" required oninvalid="setCustomValidity('Isikan Email Pegawai!')"
                                   oninput="setCustomValidity('')" placeholder="Email Pegawai">
                            <?php echo form_error('pegawai_email', '<div class="text-red">', '</div>'); ?>
                        </div>     
                        <div class="form-group">
                            <label for="example">Alamat</label>
                            <input type="text" name="pegawai_alamat" class="form-control" value="<?php echo $pegawai['pegawai_alamat']; ?>" required oninvalid="setCustomValidity('Isikan Alamat Pegawai!')"
                                   oninput="setCustomValidity('')" placeholder="Alamat Pegawai" >
                                   <?php echo form_error('pegawai_alamat', '<div class="text-red">', '</div>'); ?>
                        </div>  
                    </div><!-- /.box-body -->
                </div>
                </div>
            </div>
        </div>
    </div>
</section>