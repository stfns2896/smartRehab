<?php
$pasien=$data['pasien'];
$atribut=$data['atribut'];
$agama=$atribut['agama'];
$provinsi=$atribut['provinsi'];
$sumber_biaya=$atribut['sumber_biaya'];
$sumber_pasien=$atribut['sumber_pasien'];
$narkoba=$atribut['narkoba'];
$pasien_narkoba=$data['pasien_narkoba'];
?>
    <div class="content">
        <div class="container-fluid">
            <div class="wrapper">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#informasi-dasar">Informasi Dasar</a></li>
                    <li><a data-toggle="tab" href="#informasi-detail">Informasi Detail</a></li>
                    <li><a data-toggle="tab" href="#riwayat-pengguna">Riwayat Pengguna</a></li>
                </ul>
                <div class="card">
                    <?php echo form_open('pasien/'.$pasien['id_pasien']); ?>
                    <div class="content">
                    <div class="tab-content">
                        <div id="informasi-dasar" class="tab-pane fade in active">
                            <br>
                            <h3 class="text-center">Informasi Dasar</h3>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Lengkap </label>
                                        <input id="fullname" name="fullname" type="text" class="form-control" value="<?php echo $pasien['nama']; ?>">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">No. Telepon </label>
                                        <input id="no_telp" name="no_telp" type="tel" class="form-control" value="<?php echo $pasien['no_telp']; ?>">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jenis Kelamin </label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="" disabled selected></option>
                                            <option value="LAKI-LAKI">Laki-Laki</option>
                                            <option value="PEREMPUAN">Perempuan</option>
                                        </select>
                                        <script> $("#jenis_kelamin > [value='<?php echo $pasien['jenis_kelamin']; ?>']").attr("selected","selected"); </script>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email </label>
                                        <input name="email_pasien" id="email_pasien" type="email" class="form-control" value="<?php echo $pasien['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5 col-sm-offset-1 col-xs-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tempat Lahir</label>
                                        <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $pasien['tempat_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tanggal Lahir</label>
                                        <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="text" value="<?php echo date_format(date_create($pasien['tgl_lahir']), 'd/m/Y'); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-7 col-sm-offset-1 col-xs-7">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Alamat </label>
                                        <input name="alamat" id="alamat" class="form-control" value="<?php echo $pasien['alamat']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Provinsi</label>
                                        <select class="form-control valid" name="provinsi" id="provinsi" aria-invalid="false">
                                            <option disabled="" selected=""></option>
                                            <?php foreach ($provinsi as $key) {
    ?>
                                            <option value="<?php echo $key['id_provinsi']; ?>"><?php echo $key['nama_provinsi']; ?></option>
                                            <?php
} ?>
                                        </select>
                                        <script> $("#provinsi > [value='<?php echo $pasien['id_provinsi']; ?>']").attr("selected","selected"); </script>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="informasi-detail" class="tab-pane fade">
                            <br>
                            <h3 class="text-center">Informasi Detail</h3>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">No. Identitas</label>
                                            <input class="form-control" name="no_identitas" id="no_identitas" type="text" value="<?php echo $pasien['id']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Agama</label>
                                            <select class="form-control" name="agama" id="agama">
                                                <option selected="" disabled=""></option>
                                                <?php foreach ($agama as $key) {
        ?>
                                                <option value="<?php echo $key['id_agama']; ?>"><?php echo $key['nama_agama']; ?></option>
                                                <?php
    } ?>
                                            </select>
                                            <script> $("#agama > [value='<?php echo $pasien['id_agama']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Suku</label>
                                            <input class="form-control" name="suku" id="suku" type="text" value="<?php echo $pasien['suku']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pendidikan Terakhir</label>
                                            <select class="form-control" name="pend_terakhir" id="pend_terakhir">
                                                <option selected="" disabled=""></option>
                                                <option value="SD">SD/Sederajat</option>
                                                <option value="SMP">SMP/Sederajat</option>
                                                <option value="SMA">SMA/Sederajat</option>
                                                <option value="S1">S1/Sederajat</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                            <script> $("#pend_terakhir > [value='<?php echo $pasien['pend_terakhir']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pekerjaan</label>
                                            <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" value="<?php echo $pasien['pekerjaan']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">No. Telepon Keluarga</label>
                                            <input class="form-control" name="telp_keluarga" id="telp_keluarga" type="text" value="<?php echo $pasien['nomer_telp_keluarga']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipe Identitas</label>
                                            <select class="form-control" name="tipe_identitas" id="tipe_identitas">
                                                <option selected="" disabled=""></option>
                                                <option value="KTP">Kartu Tanda Penduduk</option>
                                                <option value="SIM">SIM</option>
                                                <option value="KTM">Kartu Mahasiswa</option>
                                                <option value="PELAJAR">Kartu Pelajar</option>
                                            </select>
                                            <script> $("#tipe_identitas > [value='<?php echo $pasien['jenis_id']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Golongan Darah</label>
                                            <select class="form-control" name="goldar" id="goldar">
                                                <option selected="" disabled=""></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                            <script> $("#goldar > [value='<?php echo $pasien['goldar']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status Menikah</label>
                                            <select name="menikah" id="menikah" class="form-control">
                                                <option selected="" disabled=""></option>
                                                <option value="0">Belum</option>
                                                <option value="1">Sudah</option>
                                                <option value="2">Janda/Duda</option>
                                            </select>
                                            <script> $("#menikah > [value='<?php echo $pasien['menikah']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Pasangan</label>
                                            <input class="form-control" name="nama_pasangan" id="nama_pasangan" type="text" value="<?php echo $pasien['nama_pasangan']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Ayah</label>
                                            <input class="form-control" name="nama_ayah" id="nama_ayah" type="text" value="<?php echo $pasien['nama_ayah']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Ibu</label>
                                            <input class="form-control" name="nama_ibu" id="nama_ibu" type="text" value="<?php echo $pasien['nama_ibu']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Alamat Keluarga</label>
                                            <textarea class="form-control" name="alamat_keluarga" id="alamat_keluarga"><?php echo $pasien['alamat_keluarga']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="riwayat-pengguna" class="tab-pane fade">
                            <br>
                            <h3 class="text-center">Riwayat Pengguna</h3>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Mulai Pakai</label>
                                            <input class="form-control" name="mulai_pakai" id="mulai_pakai" type="text" value="<?php
                                                // $date = date_create($pasien['mulai_pakai']);
                                                // echo date_format($date, 'd/m/Y');
                                                echo $pasien['mulai_pakai'];
                                            ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cara Pakai</label>
                                            <input class="form-control" name="cara_pakai" id="cara_pakai" type="text" value="<?php echo $pasien['cara_pakai']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frekuensi</label>
                                            <input class="form-control" name="frekuensi" id="frekuensi" type="text" value="<?php echo $pasien['frekuensi']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Terakhir Pakai</label>
                                            <input class="form-control" name="terakhir_pakai" id="terakhir_pakai" type="text" value="
                                            <?php
                                                // echo date_format(date_create($pasien['terakhir_pakai']), 'd/m/Y');
                                                echo $pasien['terakhir_pakai'];
                                            ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sumber Biaya</label>
                                            <select class="form-control" name="sumber_biaya" id="sumber_biaya">
                                                <option selected="" disabled=""></option>
                                                <?php foreach ($sumber_biaya as $key) {
                                                ?>
                                                <option value="<?php echo $key['id_sumber_biaya']; ?>"><?php echo $key['keterangan'] ?></option>
                                                <?php
                                            } ?>
                                            </select>
                                            <script> $("#sumber_biaya > [value='<?php echo $pasien['id_sumber_biaya']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sumber Pasien</label>
                                            <select class="form-control" name="sumber_pasien" id="sumber_pasien">
                                                <option selected="" disabled=""></option>
                                                <?php foreach ($sumber_pasien as $key) {
                                                ?>
                                                <option value="<?php echo $key['id_sumber_pasien']; ?>"><?php echo $key['keterangan']; ?></option>
                                                <?php
                                            } ?>
                                            </select>
                                            <script> $("#sumber_pasien > [value='<?php echo $pasien['id_sumber_pasien']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pernah Rehabilitasi</label>
                                            <select name="rehabilitasi" id="rehabilitasi" class="form-control">
                                                <option selected="" disabled=""></option>
                                                <option value="1">Pernah</option>
                                                <option value="0">Belum</option>
                                            </select>
                                            <script> $("#rehabilitasi > [value='<?php echo $pasien['pernah_rehabilitasi']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tempat Rehabilitasi</label>
                                            <input class="form-control" name="tempat_rehab" id="tempat_rehab" type="text" value="<?php echo $pasien['tempat_rehabilitasi']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">No. Rekam Medis</label>
                                            <input class="form-control" name="no_rekam_medis" id="no_rekam_medis" type="text" value="<?php echo $pasien['no_rekam_medis']; ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status Rawat</label>
                                            <select name="rawat" id="rawat" class="form-control">
                                                <option selected="" disabled=""></option>
                                                <option value="JALAN">Jalan</option>
                                                <option value="INAP">Inap</option>
                                            </select>
                                            <script> $("#rawat > [value='<?php echo $pasien['status_rawat']; ?>']").attr("selected","selected"); </script>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Lama Rawat</label>
                                            <input class="form-control" name="lama_rawat" id="lama_rawat" type="text" value="<?php echo $pasien['lama_rawat']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Jenis Narkoba</label>
                                            <select class="selectpicker" name="jenis_narkoba[]" data-size="2" id="jenis_narkoba" data-style="btn btn-danger" data-title="Jenis Narkoba" data-live-search="true" data-dropup-auto="false"  multiple>
                                                <?php foreach ($narkoba as $key) {
                                                ?>
                                                <option value="<?php echo $key['id_jenis_narkoba']; ?>"><?php echo $key['nama_narkoba']; ?></option>
                                                <?php
                                            } ?>
                                            </select>
                                            <script> $('.selectpicker').selectpicker('val', [<?php foreach ($pasien_narkoba as $pn) {
                                                echo "'".$pn['id_jenis_narkoba']."',";
                                            } ?>]); </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btn-ubah-pasien" value="ubah" class="btn btn-primary btn-fill btn-wd" role="button">SIMPAN</button>
                        <?php if ($pasien['sudah_verifikasi']==0) {
                                                ?>
                        <input type="hidden" value="sudah" name="verifikasi">
                        <button type="submit" name="btn-verifikasi-pasien" value="verifikasi" class="btn btn-warning btn-fill btn-wd" role="button">VERIFIKASI</button>
                        <?php
                                            } ?>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>