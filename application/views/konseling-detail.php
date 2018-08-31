<?php
$pasien=$data['pasien'];
$konseling=$data['konseling'];
$banyak_konseling=$konseling['banyak_konseling'];
$konseling=$konseling['konseling'];
?>
<div class="content">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image"></div>
                        <div class="content">
                            <div class="author">
                                <img class="avatar" src="">
                                <h4 class="title"><?php echo $pasien["nama"]; ?></h4>
                            </div>
                            <p class="description text-center"></p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <h5>
                                        <?php echo $banyak_konseling; ?>
                                        <br>
                                        <small>Banyak konseling</small>
                                    </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5>
                                        <?php echo date('n')<date('n',strtotime($pasien['tgl_lahir']))?date('Y')-date('Y',strtotime($pasien['tgl_lahir']))-1:date('Y')-date('Y',strtotime($pasien['tgl_lahir'])); ?>
                                        <br>
                                        <small>Umur</small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Data konseling</h4>
                            <span class="text-muted"><small>Maksimal pasien 8 kali konseling</small></span>
                        </div>
                        <hr>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="row">
                                        <?php
                                        echo form_open('konseling/'.$pasien['id_pasien']);
                                        if($konseling){
                                        foreach($konseling as $key){ ?>
                                        <div class="col-xs-7">
                                            id konseling <?php echo $key['id_konseling']; ?><br>
                                            <span class="text-muted"><small><?php echo $key['tanggal_kedatangan']; ?></small></span>
                                        </div>
                                        <div class="col-xs-5 text-right">
                                            <a class="btn btn-sm btn-primary btn-icon" data-toggle="modal" data-backdrop="static" href="#ubah-konseling" data-id_pasien="<?php echo $key['id_pasien']; ?>" data-konseling_ke="<?php echo $key['konseling_ke']; ?>" data-id_konseling="<?php echo $key['id_konseling']; ?>" data-masalah_motivasi="<?php echo $key['masalah_motivasi']; ?>" data-hal_yg_menghambat_penyelesaian="<?php echo $key['hal_yg_menghambat_penyelesaian']; ?>" data-hal_yg_mendukung_penyelesaian="<?php echo $key['hal_yg_mendukung_penyelesaian']; ?>" data-rencana_tindak_lanjut="<?php echo $key['rencana_tindak_lanjut']; ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <!-- <button name="hapus_konseling" type="submit" value="<?php// echo $key['id_konseling'] ?>" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-trash"></i></button> -->
                                        </div>
                                        <?php }}
                                        echo form_close();
                                         ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php echo form_open('konseling/'.$pasien['id_pasien']); ?>
                        <?php if($banyak_konseling<8){ ?>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah data konseling</h4>
                            </div>
                            <div class="content">
                                <div class="form-group label-floating">
                                    <label class="control-label">Masalah Motivasi</label>
                                    <textarea class="form-control" name="masalah_motivasi" id="masalah_motivasi" required="required"></textarea>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Hal yang menghambat penyelesaian</label>
                                    <textarea class="form-control" name="hal_yg_menghambat_penyelesaian" id="hal_yg_menghambat_penyelesaian" required="required"></textarea>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Hal yang mendukung penyelesaian</label>
                                    <textarea class="form-control" name="hal_yg_mendukung_penyelesaian" id="hal_yg_mendukung_penyelesaian" required="required"></textarea>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Rencana tindak lanjut</label>
                                    <textarea class="form-control" name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" required="required"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="btn-tambah-konseling" value="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
