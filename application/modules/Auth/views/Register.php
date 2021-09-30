<?php  ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SIYAPDOK</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url().'assets/';?>path_logo/S_Logo_2_SM.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>assets/css/auth_registrasi.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>assets/css/color_skins.css">

    <!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets/';?>assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url().'assets/'; ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <link href="<?=base_url().'assets/'; ?>assets/plugins/datepicker-4/gijgo.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        label.sukses{
            color: #5aad01;
            font-size: 9pt;
            margin-top: 5px;
        }
    </style>

</head>

<body class="theme-blue">
<div class="authentication">
    <div class="card" style="margin-top: 50px; position: relative;">
        <div class="body">
            <div class="row clearfix">
                
                <form class="col-lg-12 col-md-12 col-sm-12" id="sign_up" method="POST" action="<?= base_url().'Auth/proses_register' ?>">
                    <h5 class="title">Daftar Akun</h5>

                    <div class="row">
                        <!-- Kolom 1 -->
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left;">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Nama User
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                            <input type="text" autocomplete="off" class="form-control" name="nama_user" id="nama_user" style="margin-bottom: -4px;" required>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Jenis Kelamin
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <div id="oldPass" class="form-line" style="margin-top: -6px;"> -->
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="jk_user" id="jk_user">
                                               <option value="Laki-Laki">Laki-Laki</option>
                                               <option value="Perempuan">Perempuan</option>
                                           </select>
                                        </div>
                                       <!-- </div> -->
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Tanggal Lahir
                                    </div>
                                    <div class="col-md-8">
                                        <div id="tglLhr" class="form-line" style="margin-top: -6px;">
                                            <input type="text" autocomplete="off" class="form-control date" placeholder="Ex: 30/07/2016" name="tgl_lhr" id="tgl_lhr" style="margin-bottom: -4px;" required>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Provinsi
                                    </div>
                                    <div class="col-md-8">
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="provinsi" id="provinsi" data-live-search="true" required>
                                            <option disabled value="" selected>-- Pilih Provinsi --</option>
                                            <?php foreach ($prov as $key) { ?>
                                               <option value="<?= $key->id_prov ?>"><?= $key->nama_prov ?></option>
                                           <?php } ?>
                                           </select>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Kota
                                    </div>
                                    <div class="col-md-8">
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="kota" id="kota" data-live-search="true" required>
                                               <option disabled value="">-- Pilih Kota --</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>                        
                            </div>           
                        </div>

                        <!-- Kolom 2 -->
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left;">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Alamat
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                            <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="almt_user" id="almt_user" style="margin-bottom: -4px;"></textarea>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Nomor HP
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                            <input type="text" autocomplete="off" onkeypress="return inputAngka(event);" maxlength="13" class="form-control" name="no_hp" id="no_hp" required style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Username
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" autocomplete="off" class="form-line" style="margin-top: -6px;">
                                            <input type="text" class="form-control" name="username" id="username" style="margin-bottom: -4px;" required>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Password
                                    </div>
                                    <div class="col-md-8">
                                        <div id="newPass" class="form-line" style="margin-top: -6px;">
                                            <input type="password" class="form-control" name="password" id="password" required style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>  

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Re Password
                                    </div>
                                    <div class="col-md-8">
                                        <div id="rePass" class="form-line" style="margin-top: -6px;">
                                            <input type="password" class="form-control" name="re_password" id="re_password" required style="margin-bottom: -4px;">
                                        </div>
                                        <label id="error_rePass" class="sukses" for="new_pass" style="display: block;"></label>
                                    </div>
                                </div>                        
                            </div>  

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <a href="<?= base_url().'Auth/' ?>"><button type="button" id="back_login" class="btn btn-raised btn-block bg-primary waves-effect" style="color: white; font-weight: bold;"><i class="material-icons" style="margin-top: -7px">keyboard_return</i> Kembali ke login</button></a>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <button type="submit" id="register" class="btn btn-raised btn-block bg-dark-red waves-effect" style="color: white; font-weight: bold;">Daftar</button>
                            </div> 
                        </div>
                    </div>                      
                </form>                  
            </div>
        </div>
    </div>
</div>


<!-- Jquery Core Js -->
<script src="<?php echo base_url().'assets/'; ?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url().'assets/'; ?>assets/bundles/vendorscripts.bundle.js"></script>
<script src="<?php echo base_url().'assets/'; ?>assets/bundles/mainscripts.bundle.js"></script>
<!-- Sweet Alert -->
<script src="<?php echo base_url().'assets/'; ?>assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 
<script src="<?php echo base_url().'assets/'; ?>assets/js/pages/ui/dialogs.js"></script> 

<script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url().'assets/'; ?>assets/plugins/autosize/autosize.js"></script>

<script src="<?php echo base_url().'assets/'; ?>assets/js/pages/forms/form-validation.js"></script> 
<script src="<?php echo base_url().'assets/'; ?>assets/js/pages/forms/advanced-form-elements.js"></script> 
<script src="<?php echo base_url().'assets/'; ?>assets/js/pages/forms/basic-form-elements.js"></script>

<script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css --> 
<script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js --> 
<script src="<?=base_url().'assets/'; ?>assets/plugins/datepicker-4/gijgo.min.js" type="text/javascript"></script>
    
<script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>


<!-- <script src="<?php //echo base_url().'assets/'; ?>assets/bundles/mainscripts.bundle.js"></script> -->
<!-- Custom Js --> 

<script type="text/javascript">
    var MaskedInput = $('#tglLhr');

    //Date
    MaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
</script>
    
<!-- Change Kota -->
<script type="text/javascript">
    $('#provinsi').on('change',function(){
        var id = $('#provinsi option:selected').attr('value');
        // alert(id);
        $.post("<?= base_url() ?>/Auth/showKota", {id_prov: id}, function(result){
            var dt = JSON.parse(result);

            var html = '';
            for (var i = 0; i < dt.length; i++) {
                html += "<option value='"+dt[i].id_kota+"'>"+dt[i].type+' '+dt[i].nama_kota+"</option>";
            }

            $('#kota').html(html);
            $('#kota').selectpicker('refresh');
        });
    });
</script>

<!-- Ulangi Password -->
<script type="text/javascript">
    $('#re_password').keyup(function(){
        var newp = $('#password').val();
        var conf = $(this).val();
        if(newp == conf){
            if(newp == '' || newp == null){
                if (conf == '' || conf == null) {
                    $('#rePass').removeClass('form-line focused error');
                    $('#rePass').addClass('form-line');
                    $('#error_rePass').html('');
                    $('#register').attr('disabled',false);
                }else{
                    $('#rePass').removeClass('form-line focused error');
                    $('#rePass').addClass('form-line');
                    $('#error_rePass').html('Password cocok.');
                    $('#error_rePass').removeClass('error');
                    $('#error_rePass').addClass('sukses');
                    $('#register').attr('disabled',false);

                    $('#error_rePass').css('margin-bottom','-16px');
                }
            }else{
                $('#rePass').removeClass('form-line focused error');
                $('#rePass').addClass('form-line');
                $('#error_rePass').html('Password cocok.');
                $('#error_rePass').removeClass('error');
                $('#error_rePass').addClass('sukses');
                $('#register').attr('disabled',false);

                $('#error_rePass').css('margin-bottom','-16px');
            }
        } else if (newp!=conf){
            $('#rePass').removeClass('form-line');
            $('#rePass').addClass('form-line focused error');
            $('#error_rePass').html('Password tidak cocok.');
            $('#error_rePass').removeClass('sukses');
            $('#error_rePass').addClass('error');
            $('#register').attr('disabled',true);

            $('#error_rePass').css('margin-bottom','-16px');
        }
    })

    $('#password').keyup(function(){
        var newp = $(this).val();
        var conf = $('#re_password').val();
        if(newp == conf){
            if(newp == '' || newp == null){
                if (conf == '' || conf == null) {
                    $('#rePass').removeClass('form-line focused error');
                    $('#rePass').addClass('form-line');
                    $('#error_rePass').html('');
                    $('#register').attr('disabled',false);
                }else{
                    $('#rePass').removeClass('form-line focused error');
                    $('#rePass').addClass('form-line');
                    $('#error_rePass').html('Password cocok.');
                    $('#error_rePass').removeClass('error');
                    $('#error_rePass').addClass('sukses');
                    $('#register').attr('disabled',false);

                    $('#error_rePass').css('margin-bottom','-16px');
                }
            }else{
                $('#rePass').removeClass('form-line focused error');
                $('#rePass').addClass('form-line');
                $('#error_rePass').html('Password cocok.');
                $('#error_rePass').removeClass('error');
                $('#error_rePass').addClass('sukses');
                $('#register').attr('disabled',false);

                $('#error_rePass').css('margin-bottom','-16px');
            }
        } else if (newp!=conf){
            $('#rePass').removeClass('form-line');
            $('#rePass').addClass('form-line focused error');
            $('#error_rePass').html('Password tidak cocok.');
            $('#error_rePass').removeClass('sukses');
            $('#error_rePass').addClass('error');
            $('#register').attr('disabled',true);

            $('#error_rePass').css('margin-bottom','-16px');
        }
    })
</script>

<!-- Input Angka -->
<script type="text/javascript">
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }
</script>

<!-- DatePicker -->
<script type="text/javascript">
    $('#tgl_lhr').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'id'
    })
</script>

 <!-- Fungsi Dialog -->
<script type="text/javascript">
    //These codes takes from http://t4t5.github.io/sweetalert/
    function showBasicMessage() {
        swal("Here's a message!");
    }

    function showWithTitleMessage() {
        swal("Here's a message!", "It's pretty, isn't it?");
    }

    function validasiMessage(){
        swal({
            title: "Dilarang!",
            text: "Data tidak boleh lebih dari jumlah permintaan!",
            type: "error",
            timer: 1000,
            showConfirmButton: false
        });
    }

    function showSuccessMessage(data) {
        swal({
            title: "Berhasil!",
            text: data,
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
    }

    function showFailedMessage(input) {
        swal({
            title: "Gagal!",
            text: input,
            type: "error",
            timer: 1500,
            showConfirmButton: false
        });
    }

    function showConfirmMessage(id) {
        swal({
            title: "Anda yakin data akan dihapus?",
            text: "Data tidak akan dapat di kembalikan lagi!!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Damkar/deleteUnit')?>",
                dataType : "html",
                data : {id:id},
                success: function(data){
                    // alert(data);

                    $('#tbl-unit').DataTable().destroy();
                    showUnit();
                    $('#tbl-unit').DataTable().draw();
                    // kode_otomatis();
                    // $('#editModal #pilihBrg').attr('selected','');
                    // $('#editModal').modal('hide');

                    if(data=='Success'){
                        showSuccessMessage('Dihapus');
                    }else{
                        showFailedMessage('Dihapus');
                    } 
                }
            });
            return false;
            // swal("Hapus!", "Data telah berhasil dihapus.", "success");
        });
    }

    function showCancelMessage() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }
</script>

<script type="text/javascript">
    $('#sign_up').submit(function(){
        var dataInput = $(this).serialize();
        $('.page-loader-wrapper2').show();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Auth/proses_register')?>",
            dataType : "html",
            data : dataInput,
            success: function(data){
                // alert(data);
                if(data!='Sukses'){
                    showFailedMessage(data+' Silahkan coba lagi');
                }
                else {
                    showSuccessMessage('Registrasi berhasil! Silahkan login untuk masuk');
                    setInterval(function() {
                        window.location = "<?= base_url().'Auth'; ?>";
                    }, 1500);
                }
            }
        });
        return false;
    });
</script>

</body>
</html>