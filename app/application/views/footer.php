</div></div></div>
<div class="modal fade" id="ubah-konseling" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah data konseling ke-</h4>
                <p>Isi semua field!</p>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="status-ubah-konseling"></p>
                </div>
                <?php echo form_open('','id="form-ubah-konseling"'); ?>
                <input type="hidden" name="id_konseling_update" id="id_konseling_update">
                <input type="hidden" name="id_pasien_update" id="id_pasien_update">
                <div class="form-group label-floating">
                    <label class="control-label">Masalah Motivasi</label>
                    <textarea class="form-control" name="masalah_motivasi_update" id="masalah_motivasi_update" required="required"></textarea>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Hal yang menghambat penyelesaian</label>
                    <textarea class="form-control" name="hal_yg_menghambat_penyelesaian_update" id="hal_yg_menghambat_penyelesaian_update" required="required"></textarea>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Hal yang mendukung penyelesaian</label>
                    <textarea class="form-control" name="hal_yg_mendukung_penyelesaian_update" id="hal_yg_mendukung_penyelesaian_update" required="required"></textarea>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Rencana tindak lanjut</label>
                    <textarea class="form-control" name="rencana_tindak_lanjut_update" id="rencana_tindak_lanjut_update" required="required"></textarea>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn btn-info btn-fill btn-wd sendBtn" type="button" name="btn-ubah-konseling" value="Simpan" onclick="updateKonseling()" id="btn-ubah-konseling">Simpan</button>
                <button class="btn btn-default submitBtn" data-dismiss="modal" type="button">Close</button></form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ganti-password" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <p>Isi semua field!</p>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="status-ganti-password"></p>
                </div>
                <?php echo form_open('','id="form-ganti-password"'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" class="form-control border-input" id="old_password" name="old_password" placeholder="Password Lama" value="" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control border-input" id="email" name="email" placeholder="Email" value="" required="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control border-input" id="new_password" name="new_password" placeholder="Password Baru" value="" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control border-input" id="passconf" name="passconf" placeholder="Konfirmasi Password" value="" required="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn btn-info btn-fill btn-wd sendBtn" type="button" onclick="gantiPassword()">Ganti Password</button>
                <button class="btn btn-default submitBtn" data-dismiss="modal" type="button">Close</button></form>
            </div>
        </div>
    </div>
</div>
<?php if($this->session->userdata('tipe')=='0'){ ?>
<div class="modal fade" id="buat-akun" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Akun Baru</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="status-buat-akun"></p>
                </div>
                <?php echo form_open('','id="form-buat-akun"'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control border-input" placeholder="Nama Lengkap" name="name_akunBaru" id="name_akunBaru" value="" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipe Akun</label>
                            <select class="form-control border-input" name="tipe_akunBaru" id="tipe_akunBaru">
                                <option value="1">Petugas</option>
                                <option value="2">Konselor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control border-input" placeholder="Username" name="username_akunBaru" id="username_akunBaru" value="" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control border-input" name="email_akunBaru" id="email_akunBaru" placeholder="Email" required="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control border-input" name="password_akunBaru" id="password_akunBaru" placeholder="Password" value="" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm</label>
                            <input type="password" class="form-control border-input" name="passconf_akunBaru" id="passconf_akunBaru" placeholder="Konfirmasi Password" value="" required="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-info btn-fill btn-wd sendBtn" type="button" onclick="buatAkun()">Buat Akun</button>
                <button class="btn btn-default submitBtn" data-dismiss="modal" type="button">Close</button></form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url(); ?>assets/js/paper-dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-table.js"></script>

<script>
    function logout(){
        var logout = confirm("Anda Yakin Logout?");
        if (logout == true) {
            window.location.replace("<?php echo base_url(); ?>logout");
        } else {
            alert("Logout dibatalkan");
        }
    };
</script>
<?php if($this->session->flashdata('response')){
?><script>
        $.notify({
            title: '<strong>Informasi Terbaru!<strong>',
            message: '<?php echo $this->session->flashdata('response'); ?>'
        },{
            type:'info',
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    </script>
<?php } ?>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        function load_unseen_notification(notif = 'tarik', id = null) {
            $.ajax({
                url: '<?php echo base_url()."home/notif/"; ?>',
                method: "POST",
                data: {
                    notif: notif,
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#notif-messages').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('#notif-count').html(data.unseen_notification);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            });
        }
        $(document).on('click', '.notif-item', function() {
            var id = $(this).data('id');
            $('#notif-count').html('');
            load_unseen_notification('hapus',id);
        });
        setInterval(function() {
            load_unseen_notification();;
        }, 3000);
    });
</script>
<script>
    $('#ubah-konseling').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    modal.find('.modal-title').text("Ubah data konseling ke-"+button.data('konseling_ke'))
    modal.find('#id_konseling_update').val(button.data('id_konseling'))
    modal.find('#id_pasien_update').val(button.data('id_pasien'))
    modal.find('#masalah_motivasi_update').val(button.data('masalah_motivasi'))
    modal.find('#hal_yg_menghambat_penyelesaian_update').val(button.data('hal_yg_menghambat_penyelesaian'))
    modal.find('#hal_yg_mendukung_penyelesaian_update').val(button.data('hal_yg_mendukung_penyelesaian'))
    modal.find('#rencana_tindak_lanjut_update').val(button.data('rencana_tindak_lanjut'))
   });
</script>
<script>
    function updateKonseling(){
        var id_konseling=$('#id_konseling_update').val();
        var id_pasien=$('#id_pasien_update').val();
        var masalah_motivasi=$('#masalah_motivasi_update').val();
        var hal_yg_menghambat_penyelesaian=$('#hal_yg_menghambat_penyelesaian_update').val();
        var hal_yg_mendukung_penyelesaian=$('#hal_yg_mendukung_penyelesaian_update').val();
        var rencana_tindak_lanjut=$('#rencana_tindak_lanjut_update').val();
        var stopNarkoba = $("[name='stopNarkoba']").val();
        var id_pasien=$('#id_pasien_update').val();
        $.ajax({
                type: 'POST',
                url: '<?php echo base_url()."konseling/ubah/"; ?>',
                cache: false,
                data: {
                    id_konseling: id_konseling,
                    masalah_motivasi: masalah_motivasi,
                    hal_yg_menghambat_penyelesaian: hal_yg_menghambat_penyelesaian,
                    hal_yg_mendukung_penyelesaian: hal_yg_mendukung_penyelesaian,
                    rencana_tindak_lanjut: rencana_tindak_lanjut,
                    stopNarkoba: stopNarkoba
                },
                beforeSend: function() {
                    $('.modal-body').css('opacity', '.5');
                },
                success: function(msg) {
                    if (msg == 'ok') {
                        $('.modal-body').css('opacity', '');
                        $('#status-ubah-konseling').html('<span class="alert alert-success">Data konseling berhasil diubah</span>');
                        location.reload(true);

                    } else {
                        $('#status-ubah-konseling').html('<span class="alert alert-danger">' + msg + '</span>');
                        $('.modal-body').css('opacity', '');
                        location.reload(true);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
    var table=$('#dashboard-table').DataTable( {
        "scrollY":"600px",
        "scrollY":"400px",
        "processing":true,
                "columnDefs": [
            { "visible": false, "targets": [0,4,6,9,10,11,12,13,14,15] }
          ],
        initComplete: function () {
            this.api().columns([2,3,5,6,7,8,9,10,11,12,13,14,15]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
    $('button.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
} );
</script>
<script type="text/javascript">
    var $table = $('#fresh-table'),
    $alertBtn = $('#alertBtn'),
    full_screen = false,
    window_height;
    $().ready(function(){
        window_height = $(window).height();
        table_height = window_height - 20;
    $table.bootstrapTable({
        toolbar: ".toolbar",
        showRefresh: true,
        search: true,
        showToggle: true,
        showColumns: true,
        pagination: true,
        striped: true,
        sortable: true,
        height: table_height,
        pageSize: 25,
        pageList: [25,50,100],
    formatRecordsPerPage: function(pageNumber){
        return pageNumber + " rows visible";
    },
        icons: {
        refresh: 'fas fa-sync',
        toggle: 'fa fa-th-list',
        columns: 'fa fa-columns',
        detailOpen: 'fa fa-plus-circle',
        detailClose: 'fas fa-minus-square'
    }
    });
    window.operateEvents = {
            'click .like': function (e, value, row, index) {
            alert('You click like icon, row: ' + JSON.stringify(row));
            },
            'click .edit': function (e, value, row, index) {
                $('#editPasien').modal('toggle');
            },
            'click .remove': function (e, value, row, index) {
                $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
        }
    };
    $alertBtn.click(function () {
        alert("You pressed on Alert");
    });
    $(window).resize(function () {
        $table.bootstrapTable('resetView');
        });
    });
</script>
<script type="text/javascript">
    function gantiPassword() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var old_password = $('#old_password').val();
        var email = $('#email').val();
        var new_password = $('#new_password').val();
        var passconf = $('#passconf').val();
        var stopNarkoba = $("[name='stopNarkoba']").val();
        if (old_password.trim() == '') {
            alert('Masukkan password lama');
            $('#old_password').focus();
            return false;
        } else if (email.trim() == '') {
            alert('Masukkan email');
            $('#email').focus();
            return false;
        } else if (email.trim() != '' && !reg.test(email)) {
            alert('Masukkan email yang benar.');
            $('#email').focus();
            return false;
        } else if (new_password.trim() == '') {
            alert('Masukkan password baru');
            $('#new_password').focus();
            return false;
        } else if (passconf.trim() == '') {
            alert('Masukkan konfirmasi password baru');
            $('#passconf').focus();
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()."home/ganti_password"; ?>',
                cache: false,
                data: {
                    old_password: old_password,
                    email: email,
                    new_password: new_password,
                    passconf: passconf,
                    stopNarkoba: stopNarkoba
                },
                beforeSend: function() {
                    $('.modal-body').css('opacity', '.5');
                },
                success: function(msg) {
                    if (msg == 'ok') {
                        refresh(msg);
                    } else {
                        refresh(msg);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    refresh("Terjadi error, coba ulangi lagi");
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            });
        }

        function refresh(msg) {
            if (msg == 'ok') {
                $('#status-ganti-password').html('<span class="alert alert-success">Password berhasil diubah</span>');
                $("#form-ganti-password").load(window.location.href + " #form-ganti-password");
                $('.modal-body').css('opacity', '');
            } else {
                $('#status-ganti-password').html('<span class="alert alert-danger">' + msg + '</span>');
                $("#form-ganti-password").load(window.location.href + " #form-ganti-password");
                $('.modal-body').css('opacity', '');
            }
        }
    } 
    <?php if ($this-> session->userdata('tipe') == '0') { ?>
        function buatAkun() {
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var name = $('#name_akunBaru').val();
            var username = $('#username_akunBaru').val();
            var email = $('#email_akunBaru').val();
            var password = $('#password_akunBaru').val();
            var passconf = $('#passconf_akunBaru').val();
            var stopNarkoba = $("[name='stopNarkoba']").val();
            var tipe = $('#tipe_akunBaru').val();
            if (name.trim() == '') {
                alert('Masukkan nama');
                $('#old_password').focus();
                return false;
            } else if (username.trim() == '') {
                alert('Masukkan username');
                $('#email').focus();
                return false;
            } else if (email.trim() == '') {
                alert('Masukkan email');
                $('#email').focus();
                return false;
            } else if (email.trim() != '' && !reg.test(email)) {
                alert('Masukkan email yang benar.');
                $('#email').focus();
                return false;
            } else if (password.trim() == '') {
                alert('Masukkan password');
                $('#new_password').focus();
                return false;
            } else if (passconf.trim() == '') {
                alert('Masukkan konfirmasi password');
                $('#passconf').focus();
                return false;
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()."home/buat_akun"; ?>',
                    cache: false,
                    data: {
                        name: name,
                        username: username,
                        email: email,
                        password: password,
                        passconf: passconf,
                        tipe: tipe,
                        stopNarkoba: stopNarkoba
                    },
                    beforeSend: function() {
                        $('.modal-body').css('opacity', '.5');
                    },
                    success: function(msg) {
                        if (msg == 'ok') {
                            refresh(msg);
                        } else {
                            refresh(msg);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        refresh("Terjadi error, coba ulangi lagi");
                        console.log(xhr.status);
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }
                });
            }

            function refresh(msg) {
                if (msg == 'ok') {
                    $('#status-buat-akun').html('<span class="alert alert-success">User berhasil dibuat</span>');
                    $("#form-buat-akun").load(window.location.href + " #form-buat-akun");
                    $('.modal-body').css('opacity', '');
                } else {
                    $('#status-buat-akun').html('<span class="alert alert-danger">' + msg + '</span>');
                    $("#form-buat-akun").load(window.location.href + " #form-buat-akun");
                    $('.modal-body').css('opacity', '');
                }
            }
        } 
        <?php } ?>
</script>
<script>
    $("#rehabilitasi").change(function(){
        if ($('#rehabilitasi').val()=="0") {
            $('#tempat_rehab').attr('disabled',"");
            $('#rawat').attr('disabled',"");
            $('#lama_rawat').attr('disabled',"");
            $('#no_rekam_medis').attr('disabled',"");
        }else if($('#rehabilitasi').val()=="1"){
            $('#tempat_rehab').removeAttr('disabled');
            $('#rawat').removeAttr('disabled');
            $('#lama_rawat').removeAttr('disabled');
            $('#no_rekam_medis').removeAttr('disabled');
        }
    });
    $("#menikah").change(function(){
        if ($('#menikah').val()=="0") {
            $('#nama_pasangan').attr('disabled',"");
        }else if($('#menikah').val()=="1"){
            $('#nama_pasangan').removeAttr('disabled');
        }
    });
</script>
</html>