<?php
    $pasien=$data['pasien'];
    $banyak_konseling=$data['banyak_konseling'];
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
                </div>
                <div class="col-md-8">
                    <?php //echo form_open('formulir/'.$pasien['id_pasien']); ?>
                        <div class="card">
                            <div class="header">
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#menu1">Formulir Pendaftaran</a></li>
                                    <?php if ($this->session->userdata('tipe')=='0'|| $this->session->userdata('tipe')=='2') {?>
                                    <li><a data-toggle="pill" href="#menu2">Formulir Konseling</a></li><?php }?>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="tab-content">

                                  <div id="menu1" class="tab-pane fade in active">
                                    <h3>Formulir Pendaftaran</h3>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group text-center">
                                                <a name="btn_formulir" href="<?php echo base_url('formulir/print/'.$pasien['id_pasien'].'/'.'dpn'); ?>" class="btn btn-primary col-xs-12" target="blank">Data Pengguna Narkoba</a>
                                            </div>
                                            <div class="form-group text-center">
                                                <a name="btn_formulir" href="<?php echo base_url('formulir/print/'.$pasien['id_pasien'].'/'.'sir'); ?>" class="btn btn-primary col-xs-12" target="blank">Formulir SIRENA</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group text-center">
                                                <a name="btn_formulir" href="<?php echo base_url('formulir/print/'.$pasien['id_pasien'].'/'.'lpt'); ?>" class="btn btn-primary col-xs-12" target="blank">Lembar Persetujuan Test Urin</a>
                                            </div>
                                            <div class="form-group text-center">
                                                <a name="btn_formulir" href="<?php echo base_url('formulir/print/'.$pasien['id_pasien'].'/'.'lpr'); ?>" class="btn btn-primary col-xs-12" target="blank">Lembar Persetujuan Rehabilitasi</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <?php if ($this->session->userdata('tipe')=='0'|| $this->session->userdata('tipe')=='2') {?>
                                  <div id="menu2" class="tab-pane fade">
                                    <h3>Formulir Konseling</h3>
                                    <div class="row">
                                        <?php if($banyak_konseling > 0){ ?>
                                        <div class="col-xs-6">
                                            <?php for ($i=0; $i < $banyak_konseling; $i++) { ?>
                                            <div class="form-group text-center">
                                                <a name="btn_formulir" href="<?php echo base_url('formulir/print/'.$pasien['id_pasien'].'/'.'rk'.($i+1)); ?>" target="blank" class="btn btn-primary col-xs-12">Resume Konseling <?php echo " ".($i+1); ?></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group text-center">
                                                <a name="btn_formulir" href="<?php echo base_url('formulir/print/'.$pasien['id_pasien'].'/'.'ak'); ?>" target="blank" class="btn btn-primary col-xs-12">Absensi Konseling</a>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="col-xs-12">
                                            <p>Pasien belum pernah melakukan konseling</p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                  </div>
                                  <?php }?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
