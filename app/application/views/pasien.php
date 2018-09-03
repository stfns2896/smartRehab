<div class="content">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="content table-responsive table-full-width">
                <div class="toolbar">
                </div>
                <table id="fresh-table" class="table table-striped">
                    <thead>
                        <th data-field="id">No. Identitas</th>
                        <th data-field="Nama" data-sortable="true">Nama</th>
                        <th data-field="Jenis Kelamin" data-sortable="true">Jenis Kelamin</th>
                        <th data-field="Pernah Rehabilitasi" data-sortable="true">Pernah Rehabilitasi</th>
                        <th data-field="Tanggal Lahir" data-sortable="true">Tanggal Lahir</th>
                        <th data-field="Ubah Data">Ubah Data</th>
                    </thead>
                    <tbody id="tabel-pasien">
                        <?php foreach($pasien as $p){?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo $p['nama']; ?> <?php if($p['notif_status']==0){ ?><span class="label label-primary">Pendaftar Baru</span><?php } ?> <?php if($p['sudah_verifikasi']==0){ ?><span class="label label-warning">Belum Verifikasi</span><?php } ?> </td>
                            <td><?php echo $p['jenis_kelamin']; ?></td>
                            <td><?php echo $p['pernah_rehabilitasi']==1 ? "Pernah":"Belum"; ?></td>
                            <td><?php echo date_format(date_create($p['tgl_lahir']),'d/m/Y'); ?></td>
                            <td><a class="btn btn-info" href="<?php echo base_url('pasien/'.$p['id_pasien']); ?>">Ubah</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
