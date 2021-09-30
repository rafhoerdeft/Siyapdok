    <!-- Modal Detail Pasien -->
    <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <!-- <form name="laporan" id="lp" method="post" action="<?//= base_url().'Dokter/registrasiPasien'; ?>"> -->
                            <!-- <input type="hidden" name="id_dokter" id="id_dokter"> -->
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Detail Pasien</h4>
                                </center>
                            </div>
                            <div class="modal-body" id="print-page">
                                
                                <div class="form-group" style="margin-bottom: -10px; margin-top: -5px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nama Pasien</label>
                                            <div>
                                                <span id="nama_user">Surtinah</span><div style="float: right;" id="gender"><img style="margin-top: -2px" width="25" src="<?= base_url().'assets/path_icon/female.png' ?>"><label></label></div>
                                            </div> 

                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Tanggal Lahir</label>
                                            <div id="tgl_lahir_user">12-12-2012</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Alamat Pasien</label>
                                            <div id="almt_user">Menowosari 10 RT 1 RW 1 Kedungsari, Magelang Utara, Kota Magelang</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nomor Telepon/HP</label>
                                            <div id="no_telp_user">08574349xxx</div>
                                        </div>
                                    </div>                        
                                </div>

                                <hr>
                                <b>Data Medik</b>

                                <div class="form-group" style="margin-bottom: -30px">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Gol. Darah: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="gol_darah">O</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tensi: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="tensi">120/180</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -30px">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Jantung: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="jantung">Tidak</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Diabetes: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="diabetes">Tidak</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -20px">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Haemophilia: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="haemophilia">Tidak</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Hepatitis: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="hepatitis">Tidak</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -5px">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row" style="margin-bottom: 20px">
                                                <div class="col-md-12">
                                                    <label>Alergi Obat: </label>
                                                    <div id="alergi_obat">Obat Kurap</div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 20px">
                                                <div class="col-md-12">
                                                    <label>Alergi Makanan: </label>
                                                    <div id="alergi_makanan">Dada dan Paha Ayam</div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 20px">
                                                <div class="col-md-12">
                                                    <label>Lain-Lain: </label>
                                                    <div id="lain">Terserah loe dahh</div>
                                                </div>
                                            </div>     
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12" id="photos">
                                                    <img src="" id="foto_user" width="125" height="125">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                        
                                </div>

                                <!-- <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Alergi Makanan</label>
                                            <div id="alergi_makanan">Dada dan Paha Ayam</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Lain-Lain</label>
                                            <div id="lain">Terserah loe dahh</div>
                                        </div>
                                    </div>                        
                                </div> -->
                                
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">Daftarkan</button>
                                <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                            </div> -->
                        <!-- </form> -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/libscripts.bundle.js"></script>    
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Light Gallery Plugin Js --> 
    <!-- <script src="<?php //echo base_url().'assets/'; ?>assets/plugins/light-gallery/js/lightgallery-all.js"></script>  -->

    <!-- Sweet Alert -->
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/sweetalert/sweetalert.min.js"></script>  
    <script src="<?php echo base_url().'assets/'; ?>assets/js/pages/ui/dialogs.js"></script> 

    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> <!-- Bootstrap Colorpicker Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-spinner/js/jquery.spinner.js"></script> <!-- Jquery Spinner Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js --> 

    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js --> 

    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 

    <!-- Bootstrap Material Datetime Picker Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

    <!-- Bootstrap 4 Datepicker -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="<?=base_url().'assets/'; ?>assets/plugins/datepicker-4/gijgo.min.js" type="text/javascript"></script>

    <!-- date-range-picker -->
    <!-- <script src="<?php //echo base_url().'assets/';?>assets/plugins/daterangepicker/moment-new.min.js"></script> -->
    <!-- <script src="<?php //echo base_url().'assets/';?>assets/plugins/daterangepicker/daterangepicker.js"></script> -->

    <!-- Jquery DataTable Plugin Js --> 
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/datatablescripts.bundle.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/mainscripts.bundle.js"></script>

    <!-- Image Galery -->
    <script src="<?php echo base_url().'assets/'; ?>assets/js/pages/medias/image-gallery.js"></script> 

    <!-- Fancybox -->
    <script type="text/javascript" src="<?php echo base_url().'assets/';?>assets/plugins/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/';?>assets/plugins/fancybox/jquery.fancybox.pack.js"></script>

    <script src="<?php echo base_url().'assets/'; ?>assets/js/pages/forms/form-validation.js"></script> 
    <script src="<?php echo base_url().'assets/'; ?>assets/js/pages/forms/advanced-form-elements.js"></script> 
    <script src="<?php echo base_url().'assets/'; ?>assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- Show Detail Pasien -->
    <script type="text/javascript">
        function showPasien(id='', tgl_lhr='') {
            // alert(id);
            $.post("<?= base_url() ?>/Dokter/showDetailPasien", {id_pasien: id}, function(result){
                var dt = JSON.parse(result);

                $('#modal_detail #nama_user').html(dt.nama_user);
                $('#modal_detail #tgl_lahir_user').html(tgl_lhr);
                $('#modal_detail #almt_user').html(dt.almt_user+', '+dt.type+' '+dt.nama_kota);
                $('#modal_detail #no_telp_user').html(dt.no_telp_user);
                if (dt.jk_user == 'Perempuan') {
                    var gender = 'female.png';
                }else{
                    var gender = 'male.png';
                }
                $('#modal_detail #gender img').attr('src',"<?= base_url()?>"+'assets/path_icon/'+gender);
                $('#modal_detail #gender label').html(dt.jk_user);

                $('#modal_detail #gol_darah').html(dt.gol_darah);
                $('#modal_detail #tensi').html(dt.tensi);
                $('#modal_detail #jantung').html(dt.jantung);
                $('#modal_detail #diabetes').html(dt.diabetes);
                $('#modal_detail #haemophilia').html(dt.haemophilia);
                $('#modal_detail #hepatitis').html(dt.hepatitis);
                $('#modal_detail #alergi_makanan').html(dt.alergi_makanan);
                $('#modal_detail #alergi_obat').html(dt.alergi_obat);
                $('#modal_detail #lain').html(dt.lain);
                // $('#modal_detail #foto_user').attr('src',"<?//= base_url().'assets/path_profile/' ?>"+dt.foto_user);
                var photos = '';
                if (dt.foto_user == null || dt.foto_user == '') {
                    photos = "<div style='width: 125px; height: 125px; border: 2px double grey;'><center><label style='margin-top: 50px;'>Tidak ada foto</label></center></div>";
                }else{
                    photos = "<img src='<?= base_url() ?>assets/path_profile/"+dt.foto_user+"' id='foto_user' width='125' height='125'>";
                }
                $('#modal_detail #photos').html(photos);
            });
        }

        function batalRegistrasi(id_pasien='', id_dokter='') {
            var id_pas = parseInt(id_pasien);
            var id_dok = parseInt(id_dokter);
            // alert(id_dok);
            swal({
              title: "Batal Registrasi",
              text: "Apakah registrasi akan dibatalkan?",
              type: "info",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true,
            }, function () {
                setTimeout(function () {

                        $.post("<?= base_url() ?>/Dokter/registrasiBatal", {id_pasien: id_pas, id_dokter: id_dok}, function(result){
                          // alert(result);
                            if (result == 'Success') {
                                swal("Registrasi dibatalkan!");  
                                // window.location.href = "<?//= base_url().'Dokter/index/' ?>";
                                location.reload();
                            }else{
                                swal("Gagal!");
                                location.reload();
                            }
                        });
                }, 700);
            });
        }
    </script>

    <script type="text/javascript">
        var MaskedInput = $('#buka');
        //Date
        MaskedInput.find('.waktu').inputmask('hh:mm', { placeholder: '__:__' });

        var MaskedInput = $('#tutup');
        MaskedInput.find('.waktuxx').inputmask('hh:mm', { placeholder: '__:__' });
    </script>

    <script type="text/javascript">
        $('.foto_kejadian').fancybox({});
    </script>

    <script type="text/javascript">
        function fancy() {
            $('.file_photo').fancybox({});
        }
    </script>

    <!-- Sorting Datatable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data-histori').DataTable( {
                "order": [[ 0, "desc" ]]
            } );
        } );
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

        function showSuccessMessage(input) {
            swal({
                title: input+"!",
                text: "Data Berhasil "+input+"!",
                type: "success",
                timer: 1000,
                showConfirmButton: false
            });
        }

        function showFailedMessage(input) {
            swal({
                title: "Gagal!",
                text: "Data Gagal "+input+"!",
                type: "error",
                timer: 1000,
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
                    url  : "<?php echo base_url('Kebencanaan/deleteUnit')?>",
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

    <!-- Date picker -->
    <script type="text/javascript">
        $('#tgl_lhr').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'id'
        })

        $('#tgl_lhr2').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'id'
        })
    </script>

    <!-- Setting Jadwal Praktik -->
    <script type="text/javascript">
        $("#hari #Senin").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_senin"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_senin"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_senin"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_senin"]').prop('disabled', true);
            }
        });

        $("#hari #Selasa").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_selasa"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_selasa"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_selasa"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_selasa"]').prop('disabled', true);
            }
        });

        $("#hari #Rabu").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_rabu"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_rabu"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_rabu"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_rabu"]').prop('disabled', true);
            }
        });

        $("#hari #Kamis").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_kamis"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_kamis"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_kamis"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_kamis"]').prop('disabled', true);
            }
        });

        $("#hari #Jumat").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_jumat"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_jumat"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_jumat"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_jumat"]').prop('disabled', true);
            }
        });

        $("#hari #Sabtu").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_sabtu"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_sabtu"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_sabtu"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_sabtu"]').prop('disabled', true);
            }
        });

        $("#hari #Ahad").on('change', function() {
            if(this.checked) {
                $('#buka [name="jam_buka_ahad"]').prop('disabled', false);
                $('#tutup [name="jam_tutup_ahad"]').prop('disabled', false);
            }else{
                $('#buka [name="jam_buka_ahad"]').prop('disabled', true);
                $('#tutup [name="jam_tutup_ahad"]').prop('disabled', true);
            }
        });
    </script>

    <!-- Time Picker -->
    <script type="text/javascript">
        $('#jam_buka_senin').timepicker({
            autoclose: true
        });
        $('#jam_buka_selasa').timepicker({
            autoclose: true
        });
        $('#jam_buka_rabu').timepicker({
            autoclose: true
        });
        $('#jam_buka_kamis').timepicker({
            autoclose: true
        });
        $('#jam_buka_jumat').timepicker({
            autoclose: true
        });
        $('#jam_buka_sabtu').timepicker({
            autoclose: true
        });
        $('#jam_buka_ahad').timepicker({
            autoclose: true
        });

        $('#jam_tutup_senin').timepicker({
            autoclose: true
        });
        $('#jam_tutup_selasa').timepicker({
            autoclose: true
        });
        $('#jam_tutup_rabu').timepicker({
            autoclose: true
        });
        $('#jam_tutup_kamis').timepicker({
            autoclose: true
        });
        $('#jam_tutup_jumat').timepicker({
            autoclose: true
        });
        $('#jam_tutup_sabtu').timepicker({
            autoclose: true
        });
        $('#jam_tutup_ahad').timepicker({
            autoclose: true
        });
    </script>

    <script type="text/javascript">
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
            return true;
        }
    </script>

</body>

</html>
