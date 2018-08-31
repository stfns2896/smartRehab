		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pasien</p>
                                            <?php echo $data['banyak_pasien']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Konseling</p>
                                            <?php echo $data['banyak_pasien_konseling']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fas fa-users"></i> Banyak Pasien
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pendaftaran</p>
                                            <?php echo $data['datang_bulan_ini']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Bulan ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="far fa-id-card"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Verifikasi</p>
                                            <?php echo $data['verifikasi_bulan_ini']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Bulan ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Penyaringan User</h4>
                                <p class="category">Pilih Kategori dibawah tabel untuk menyaring dan toggle untuk menampilkan kolom</p>
                            </div>
                            <div class="content">
                                <div class="content table-responsive table-full-width">
                                    <button class="btn btn-primary toggle-vis" data-column="0">No.Identitas</button>
                                    <button class="btn btn-info toggle-vis" data-column="1">Nama</button>
                                    <button class="btn btn-warning toggle-vis" data-column="2">Jenis Kelamin</button>
                                    <button class="btn btn-danger toggle-vis" data-column="4">Tanggal Lahir</button>
                                    <button class="btn btn-success toggle-vis" data-column="6">Provinsi</button>
                                    <button class="btn btn-warning toggle-vis" data-column="9">Gol. Darah</button>
                                    <button class="btn btn-info toggle-vis" data-column="10">Pekerjaan</button>
                                    <button class="btn btn-primary toggle-vis" data-column="11">Suku</button>
                                    <button class="btn btn-info toggle-vis" data-column="12">Status Menikah</button>
                                    <button class="btn btn-success toggle-vis" data-column="14">Sumber Biaya</button>
                                    <button class="btn btn-danger toggle-vis" data-column="15">Sumber Pasien</button>
                                    <table id="dashboard-table" class="display table table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th data-field="id">No. Identitas</th>
                                                <th data-field="Nama" data-sortable="true">Nama</th>
                                                <th data-field="Jenis Kelamin" data-sortable="true">Jenis Kelamin</th>
                                                <th data-field="Pernah Rehabilitasi" data-sortable="true">Pernah Rehabilitasi</th>
                                                <th data-field="Tanggal Lahir" data-sortable="true">Tanggal Lahir</th>
                                                <th data-field="Tempat Lahir" data-sortable="true">Tempat Lahir</th>
                                                <th data-field="Provinsi" data-sortable="true">Provinsi</th>
                                                <th data-field="Agama" data-sortable="true">Agama</th>
                                                <th data-field="Umur" data-sortable="true">Umur</th>
                                                <th data-field="Gol. Darah" data-sortable="true">Gol. Darah</th>
                                                <th data-field="Pekerjaan" data-sortable="true">Pekerjaan</th>
                                                <th data-field="Suku" data-sortable="true">Suku</th>
                                                <th data-field="Menikah" data-sortable="true">Menikah</th>
                                                <th data-field="Pend. Terakhir" data-sortable="true">Pend. Terakhir</th>
                                                <th data-field="Sumber Biaya" data-sortable="true">Sumber Biaya</th>
                                                <th data-field="Sumber Pasien" data-sortable="true">Sumber Pasien</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabel-pasien">
                                            <?php foreach($data['pasien'] as $p){?>
                                            <tr>
                                                <td><?php echo $p['id']; ?></td>
                                                <td><?php echo $p['nama']; ?> <?php if($p['notif_status']==0){ ?><span class="label label-primary">Pendaftar Baru</span><?php } ?> <?php if($p['sudah_verifikasi']==0){ ?><span class="label label-warning">Belum Verifikasi</span><?php } ?> </td>
                                                <td><?php echo $p['jenis_kelamin']; ?></td>
                                                <td><?php echo $p['pernah_rehabilitasi']==1 ? "Pernah":"Belum"; ?></td>
                                                <td><?php echo date_format(date_create($p['tgl_lahir']),'d/m/Y'); ?></td>
                                                <td><?php echo $p['tempat_lahir']; ?></td>
                                                <td><?php echo $p['nama_provinsi']; ?></td>
                                                <td><?php echo $p['nama_agama']; ?></td>
                                                <td><?php echo date('n')<date('n',strtotime($p['tgl_lahir']))?date('Y')-date('Y',strtotime($p['tgl_lahir']))-1:date('Y')-date('Y',strtotime($p['tgl_lahir'])); ?></td>
                                                <td><?php echo $p['goldar']; ?></td>
                                                <td><?php echo $p['pekerjaan']; ?></td>
                                                <td><?php echo $p['suku']; ?></td>
                                                <td><?php echo $p['menikah']==1 ? "Sudah":"Belum"; ?></td>
                                                <td><?php echo $p['pend_terakhir']; ?></td>
                                                <td><?php echo $p['sumber_biaya']; ?></td>
                                                <td><?php echo $p['sumber_pasien']; ?></td>
                                                <div class="row">
                                                    <td>
                                                        <div class="col-xs-4">
                                                            <a href="<?php echo base_url('pasien/'.$p['id_pasien']); ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-pencil-alt"></i></a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="<?php echo base_url('formulir/'.$p['id_pasien']); ?>" data-toggle="tooltip" data-placement="bottom" title="Cetak"><i class="fas fa-print"></i></a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="<?php echo base_url('konseling/'.$p['id_pasien']); ?>" data-toggle="tooltip" data-placement="bottom" title="Konseling"><i class="ti-user"></i></a>
                                                        </div>
                                                    </td>
                                                </div>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th data-field="id">No. Identitas</th>
                                                <th data-field="Nama" data-sortable="true">Nama</th>
                                                <th data-field="Jenis Kelamin" data-sortable="true">Jenis Kelamin</th>
                                                <th data-field="Pernah Rehabilitasi" data-sortable="true">Pernah Rehabilitasi</th>
                                                <th data-field="Tanggal Lahir" data-sortable="true">Tanggal Lahir</th>
                                                <th data-field="Tempat Lahir" data-sortable="true">Tempat Lahir</th>
                                                <th data-field="Provinsi" data-sortable="true">Provinsi</th>
                                                <th data-field="Agama" data-sortable="true">Agama</th>
                                                <th data-field="Umur" data-sortable="true">Umur</th>
                                                <th data-field="Gol. Darah" data-sortable="true">Gol. Darah</th>
                                                <th data-field="Pekerjaan" data-sortable="true">Pekerjaan</th>
                                                <th data-field="Suku" data-sortable="true">Suku</th>
                                                <th data-field="Menikah" data-sortable="true">Menikah</th>
                                                <th data-field="Pend. Terakhir" data-sortable="true">Pend. Terakhir</th>
                                                <th data-field="Sumber Biaya" data-sortable="true">Sumber Biaya</th>
                                                <th data-field="Sumber Pasien" data-sortable="true">Sumber Pasien</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated a second ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>