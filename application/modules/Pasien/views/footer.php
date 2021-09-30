    <!-- Modal Detail Dokter -->
    <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <form name="laporan" id="lp" method="post" action="<?= base_url().'Pasien/registrasiPasien'; ?>">
                            <input type="hidden" name="id_dokter" id="id_dokter">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Detail Dokter</h4>
                                </center>
                            </div>
                            <div class="modal-body" id="print-page">
                                
                                <div class="form-group" style="margin-bottom: -10px; margin-top: -5px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nama Dokter</label>
                                            <br>
                                            <div>
                                                <span id="nama_user">Surtinah</span><div style="float: right;" id="gender"><img style="margin-top: -2px" width="25" src="<?= base_url().'assets/path_icon/female.png' ?>"><label></label></div>
                                            </div> 

                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>SIP Dokter</label>
                                            <br>
                                                <div id="sip">028/162/SIP-TU/III/2003</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Alamat Praktik</label>
                                            <br>
                                            <div id="almt_user">Menowosari 10 RT 1 RW 1 Kedungsari, Magelang Utara, Kota Magelang</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nomor Telepon/HP</label>
                                            <br>
                                            <div id="no_telp_user">08574349xxx</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Spesialis</label>
                                            <br>
                                            <div id="nama_spes">Umum</div>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="form-group" style="margin-bottom: -10px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Jadwal Praktik</label>
                                            <br>
                                            <div id="jadwal">
                                                <div id="hari">
                                                    <input type="checkbox" id="senin" class="filled-in chk-col-orange" checked disabled />
                                                    <label for="senin">Senin</label>

                                                    <input type="checkbox" id="selasa" class="filled-in chk-col-purple" checked disabled />
                                                    <label for="selasa">Selasa</label>

                                                    <input type="checkbox" id="rabu" class="filled-in chk-col-pink" checked disabled />
                                                    <label for="rabu">Rabu</label>

                                                    <input type="checkbox" id="kamis" class="filled-in chk-col-deep-purple" checked disabled />
                                                    <label for="kamis">Kamis</label>

                                                    <input type="checkbox" id="jumat" class="filled-in chk-col-green" checked disabled />
                                                    <label for="jumat">Jum'at</label>

                                                    <input type="checkbox" id="sabtu" class="filled-in chk-col-light-blue" checked disabled />
                                                    <label for="sabtu">Sabtu</label>

                                                    <input type="checkbox" id="ahad" class="filled-in chk-col-red" checked disabled />
                                                    <label for="ahad">Ahad</label>
                                                </div>

                                                <div id="waktu">Waktu: <b>16:00 - 21:00</b></div>
                                            </div>
                                        </div>
                                    </div>                        
                                </div>

                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">Daftarkan</button>
                                <!-- <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button> -->
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/libscripts.bundle.js"></script>    
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/vendorscripts.bundle.js"></script>

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

    <!-- Input File -->
    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>

    <!-- Upload File -->
    <script type="text/javascript">
        showUpload();
        function showUpload() {
            $("#foto_user").fileinput({
                browseClass: "btn btn-primary btn-sm waves-effect",
                removeClass: "btn btn-danger btn-sm waves-effect",
                cancelClass: "btn btn-warning btn-sm waves-effect",
                showUpload: false,
                showCancel: false,
                mainTemplate: "{preview}\n" +
                "<div class='btn-group {class}'>\n" +
                "   <div class='btn-group'>\n" +
                "       {browse}\n" +
                "       {upload}\n" +
                "       {remove}\n" +
                "   </div>\n" +
                "   {caption}\n" +
                "</div>"
            });
        }
    </script>

    <!-- ================================================================ -->
    <!-- Cropper Image Plugin -->
    <!-- <script src="<?php echo base_url().'assets/'; ?>assets/vendor/cropper/js/cropper.min.js"></script> -->

    <!-- Cropper Image -->
    <!-- <script type="text/javascript">
        /* 03.21. Cropperjs */
        var Cropper = window.Cropper;
        if (typeof Cropper !== "undefined") {
          function each(arr, callback) {
            var length = arr.length;
            var i;

            for (i = 0; i < length; i++) {
              callback.call(arr, arr[i], i, arr);
            }

            return arr;
          }
          var previews = document.querySelectorAll(".cropper-preview");
          var options = {
            aspectRatio: 4 / 4,
            preview: ".img-preview",
            ready: function() {
              var clone = this.cloneNode();

              clone.className = "";
              clone.style.cssText =
                "display: block;" +
                "width: 100%;" +
                "min-width: 0;" +
                "min-height: 0;" +
                "max-width: none;" +
                "max-height: none;";
              each(previews, function(elem) {
                elem.appendChild(clone.cloneNode());
              });
            },
            crop: function(e) {
              var data = e.detail;
              var cropper = this.cropper;
              var imageData = cropper.getImageData();
              var previewAspectRatio = data.width / data.height;

              each(previews, function(elem) {
                var previewImage = elem.getElementsByTagName("img").item(0);
                var previewWidth = elem.offsetWidth;
                var previewHeight = previewWidth / previewAspectRatio;
                var imageScaledRatio = data.width / previewWidth;
                elem.style.height = previewHeight + "px";
                if (previewImage) {
                  previewImage.style.width =
                    imageData.naturalWidth / imageScaledRatio + "px";
                  previewImage.style.height =
                    imageData.naturalHeight / imageScaledRatio + "px";
                  previewImage.style.marginLeft = -data.x / imageScaledRatio + "px";
                  previewImage.style.marginTop = -data.y / imageScaledRatio + "px";
                }
              });
            },
            zoom: function(e) {}
          };

          if ($("#inputImage").length > 0) {
            var inputImage = $("#inputImage")[0];
            var image = $("#cropperImage")[0];

            var cropper;
            inputImage.onchange = function() {
              var files = this.files;
              var file;

              if (files && files.length) {
                file = files[0];
                $("#cropperContainer").css("display", "block");

                if (/^image\/\w+/.test(file.type)) {
                  uploadedImageType = file.type;
                  uploadedImageName = file.name;

                  image.src = uploadedImageURL = URL.createObjectURL(file);
                  if (cropper) {
                    cropper.destroy();
                  }
                  cropper = new Cropper(image, options);
                  inputImage.value = null;
                } else {
                  window.alert("Please choose an image file.");
                }
              }
            };
          }
        }
    </script> -->
    <!-- ================================================================ -->

    <script type="text/javascript">
        $('.foto_kejadian').fancybox({});
    </script>

    <!-- Change Kota -->
    <script type="text/javascript">
        var showCity = "<?= $showKota ?>";
        var kota = "<?= $kota ?>";
        var semuaKota = "<?= $semuaKota ?>";

        if (showCity == 'true') {
            showKota();
        }

        function showKota(){
            var id = $('#provinsi option:selected').attr('value');
            // alert(id);
            var html = '';
            if (id == 'semua_prov') {
                html = "<option selected value='semua_kota'>Semua Kota</option>";

                $('#kota').html(html);
                $('#kota').selectpicker('refresh');
            }else{
                $.post("<?= base_url() ?>/Pasien/showKota", {id_prov: id}, function(result){
                    var dt = JSON.parse(result);                   
                    
                    if (semuaKota == 'true') {
                        html += "<option value='semua_kota'>Semua Kota</option>";
                    }

                    for (var i = 0; i < dt.length; i++) {
                        if (kota == dt[i].id_kota) {
                            html += "<option selected value='"+dt[i].id_kota+"'>"+dt[i].type+' '+dt[i].nama_kota+"</option>";
                        }else{
                            html += "<option value='"+dt[i].id_kota+"'>"+dt[i].type+' '+dt[i].nama_kota+"</option>";
                        }
                    }

                    $('#kota').html(html);
                    $('#kota').selectpicker('refresh');
                });
            }
        };
    </script>

    <!-- Show Detail Dokter -->
    <script type="text/javascript">
        function showDokter(id='', id_dok='', jml_pasien='', jml_reg='', id_pasien='') {
            // alert(id+' - '+id_pasien);
            $.post("<?= base_url() ?>/Pasien/showDetailDokter", {id_user: id, id_pasien: id_pasien}, function(result){
                var dt = JSON.parse(result);

                $('#modal_detail #id_dokter').val(id_dok);
                $('#modal_detail #nama_user').html(dt.dokter.nama_user);
                $('#modal_detail #sip').html(dt.dokter.sip_dokter);
                $('#modal_detail #almt_user').html(dt.dokter.almt_user+', '+dt.dokter.type+' '+dt.dokter.nama_kota);
                $('#modal_detail #no_telp_user').html(dt.dokter.no_telp_user);
                $('#modal_detail #nama_spes').html(dt.dokter.nama_spes);
                if (dt.dokter.jk_user == 'Perempuan') {
                    var gender = 'female.png';
                }else{
                    var gender = 'male.png';
                }
                $('#modal_detail #gender img').attr('src',"<?= base_url()?>"+'assets/path_icon/'+gender);
                $('#modal_detail #gender label').html(dt.dokter.jk_user);

                $('#modal_detail #jadwal').html('');
                var styleHari = [
                        'filled-in chk-col-orange',
                        'filled-in chk-col-deep-purple',
                        'filled-in chk-col-pink',
                        'filled-in chk-col-blue-grey',
                        'filled-in chk-col-green',
                        'filled-in chk-col-light-blue',
                        'filled-in chk-col-red'
                    ];

                // Menampilkan Jadwal
                var namaHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Ahad'];
                for (var d = 0; d < namaHari.length; d++) {

                    var jdwl = '';
                    $('#modal_detail #jadwal').append("<div id='hari"+d+"' class='row'></div>");
                    for (var i = 0; i < dt.jadwal.length; i++) {

                        var hari = dt.jadwal[i].hari;

                        
                        if (namaHari[d] == hari) {

                            jdwl += "<div class='col-md-3'><input type='checkbox' id='"+hari+"' class='"+styleHari[i]+"' checked disabled />"+
                                    "<label for='"+hari+"'>"+hari+"</label> </div>"+
                                    "<div class='col-md-9'> ("+dt.jadwal[i].jam_buka+" - "+dt.jadwal[i].jam_tutup+") </div>";

                        }
                    }

                    if (jdwl == '') {
                        jdwl += "<div class='col-md-3'><input type='checkbox' id='"+namaHari[d]+"' class='filled-in chk-col-red' disabled />"+
                                "<label for='"+namaHari[d]+"'>"+namaHari[d]+"</label> </div>"+
                                "<div class='col-md-9'> (Tutup) </div>";
                    }
                    $('#modal_detail #jadwal #hari'+d).html(jdwl);
                }


                if (id == id_pasien) { //Jika Login sebagai dokter dan melihat detail dokter sendiri
                    $('#modal_detail #btn_simpan').attr('disabled','');
                    $('#modal_detail #btn_simpan').html('Ini Anda');
                    $('#modal_detail #btn_simpan').attr('class','btn btn-default waves-effect');
                }else{
                    if (jml_pasien == jml_reg) { //Jika kuota register sudah penuh
                        $('#modal_detail #btn_simpan').attr('disabled','');
                        $('#modal_detail #btn_simpan').html('Penuh');
                        $('#modal_detail #btn_simpan').attr('class','btn btn-default waves-effect');
                    }else{
                        if (dt.dokter.jml_reg > 0) {
                            $('#modal_detail #btn_simpan').removeAttr('disabled');
                            $('#modal_detail #btn_simpan').html('Batalkan');
                            $('#modal_detail #btn_simpan').attr('onclick','batalRegistrasi('+id_pasien+','+id_dok+')');
                            $('#modal_detail #btn_simpan').attr('type','button');
                            $('#modal_detail #btn_simpan').attr('class','btn btn-warning waves-effect');
                        }else{
                            $('#modal_detail #btn_simpan').removeAttr('disabled');
                            $('#modal_detail #btn_simpan').removeAttr('onclick');
                            $('#modal_detail #btn_simpan').attr('type','submit');
                            $('#modal_detail #btn_simpan').html('Daftarkan');
                            $('#modal_detail #btn_simpan').attr('class','btn btn-primary waves-effect');
                        }                   
                    }
                }
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

                        $.post("<?= base_url() ?>/Pasien/registrasiBatal", {id_pasien: id_pas, id_dokter: id_dok}, function(result){
                          // alert(result);
                            if (result == 'Success') {
                                swal("Registrasi dibatalkan!");  
                                // window.location.href = "<?//= base_url().'Pasien/index/' ?>";
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
        var MaskedInput = $('#tglLhr');
        //Date
        MaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
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

    <!-- Date picker -->
    <script type="text/javascript">
        $('#tgl_lhr').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'id'
        })
    </script>

    <script type="text/javascript">
        $('#waktu_awal').timepicker({
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
