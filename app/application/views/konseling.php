<div class="content">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="content table-responsive table-full-width">
                <div class="toolbar">
                    <?php echo $this->session->flashdata('response'); ?>
                </div>
                <table id="fresh-table" class="table table-striped">
                    <thead>
                        <th data-field="id">No. Identitas</th>
                        <th data-field="Nama" data-sortable="true">Nama</th>
                        <th data-field="Jenis Kelamin" data-sortable="true">Jenis Kelamin</th>
                        <th data-field="Umur" data-sortable="true">Umur</th>
                        <th data-field="Banyak Konseling" data-sortable="true">Banyak Konseling</th>
                        <th data-field="Ubah Data">Ubah Data</th>
                    </thead>
                    <tbody>
                        <?php foreach($pasien as $p){?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo $p['nama']; ?></td>
                            <td><?php echo $p['jenis_kelamin']; ?></td>
                            <td><?php echo date('n')<date('n',strtotime($p['tgl_lahir']))?date('Y')-date('Y',strtotime($p['tgl_lahir']))-1:date('Y')-date('Y',strtotime($p['tgl_lahir'])); ?></td>
                            <td><?php echo $p['banyak_konseling']; ?></td>
                            <td><a class="btn btn-info" href="<?php echo base_url('konseling/'.$p['id_pasien']); ?>">Kelola</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
