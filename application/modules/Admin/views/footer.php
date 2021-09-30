    <!-- Jquery Core Js -->
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/libscripts.bundle.js"></script>    
    <script src="<?php echo base_url().'assets/'; ?>assets/bundles/vendorscripts.bundle.js"></script>

    <!-- <script src="<?php //echo base_url().'assets/'; ?>assets/plugins/dropzone/dropzone.js"></script>  --> 

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

    <script src="<?php echo base_url().'assets/'; ?>assets/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>

    <script type="text/javascript">
        // showUpload();
        function showUpload(id) {
            $("#"+id).fileinput({
                browseClass: "btn btn-primary btn-sm waves-effect",
                removeClass: "btn btn-danger btn-sm waves-effect",
                cancelClass: "btn btn-warning btn-sm waves-effect",
                showUpload: false,
                showCancel: false,
                mainTemplate: "{preview}\n" +
                "<div class='btn-group {class}'>\n" +
                // "   <div class='btn-group'>\n" +
                "       {browse}\n" +
                "       {upload}\n" +
                "       {remove}\n" +
                // "   </div>\n" +
                "   {caption}\n" +
                "</div>"
            });
        }
    </script>

    <!-- Change Kota -->
    <script type="text/javascript">
        function showKota(){
            var id = $('#modal_add #provinsi option:selected').attr('value');
            // alert(id);
            var html = '';
            if (id == 'semua_prov') {
                html = "<option selected value='semua_kota'>Semua Kota</option>";

                $('#kota').html(html);
                $('#kota').selectpicker('refresh');
            }else{
                $.post("<?= base_url() ?>/Admin/showKota", {id_prov: id}, function(result){
                    var dt = JSON.parse(result);                   

                    for (var i = 0; i < dt.length; i++) {
                        html += "<option value='"+dt[i].id_kota+"'>"+dt[i].type+' '+dt[i].nama_kota+"</option>";
                    }

                    $('#modal_add #kota').html(html);
                    $('#modal_add #kota').selectpicker('refresh');
                });
            }
        };

        function showKotaEdit(id_prov='', kota=''){
            var id;
            if (id_prov == '') {
                id = $('#modal_edit #provinsi option:selected').attr('value');
            }else{
                id = id_prov
            }
            // alert(id);
            var html = '';
            $.post("<?= base_url() ?>/Admin/showKota", {id_prov: id}, function(result){
                var dt = JSON.parse(result);                   

                for (var i = 0; i < dt.length; i++) {
                    if (kota == dt[i].id_kota) {
                        html += "<option selected value='"+dt[i].id_kota+"'>"+dt[i].type+' '+dt[i].nama_kota+"</option>";
                    }else{
                        html += "<option value='"+dt[i].id_kota+"'>"+dt[i].type+' '+dt[i].nama_kota+"</option>";
                    }
                }

                $('#modal_edit #kota').html(html);
                $('#modal_edit #kota').selectpicker('refresh');
            });
        };
    </script>

    <script type="text/javascript">
        var MaskedInput = $('#tglLhr');
        //Date
        MaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
    </script>


    <script type="text/javascript">
        $('.foto_kejadian').fancybox({});
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

    <!-- UBAH PASSWORD -->
    <script type="text/javascript">
        // $("#old_pass").on('click',function(){
        //     $('#oldPass').attr('class','form-line focused');
        //     $('#error_oldPass').html('');
        // });
        // $("#new_pass").on('click',function(){
        //     $('#newPass').attr('class','form-line focused');
        //     $('#error_newPass').html('');
        // });
        // $("#new_pass2").on('click',function(){
        //     $('#newPass2').attr('class','form-line focused');
        //     $('#error_newPass2').html('');
        // });

        // UBAH PASSWORD
        $('#Modal_Ubah_Pwd #btn_simpan').on('click',function(){
            var id = <?php echo $this->session->userdata('id_login'); ?>;
            var oldPass=$('#Modal_Ubah_Pwd #old_pass').val();
            var newPass=$('#Modal_Ubah_Pwd #new_pass').val();
            var newPass2=$('#Modal_Ubah_Pwd #new_pass2').val();
            // $('#coba').html(sabar);
            if (oldPass=='' || newPass=='' || newPass2=='') {
                if (oldPass=='') {
                    $('#oldPass').attr('class','form-line focused error');
                    $('#error_oldPass').html('Field harus diisi.');
                }
                if (newPass=='') {
                    $('#newPass').attr('class','form-line focused error');
                    $('#error_newPass').html('Field harus diisi.');
                }
                if (newPass2=='') {
                    $('#newPass2').attr('class','form-line focused error');
                    $('#error_newPass2').html('Field harus diisi.');
                }
            }else{
                $('.page-loader-wrapper2').show();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Damkar/changePassword')?>",
                    dataType : "html",
                    data : {id:id, oldPass:oldPass, newPass:newPass},
                    success: function(data){
                        // alert(data);
                        $('.page-loader-wrapper2').hide();  
                        $('#Modal_Ubah_Pwd').modal('hide');   
                        $("#cp")[0].reset();
                        $('#oldPass').attr('class','form-line');
                        $('#newPass').attr('class','form-line');
                        $('#newPass2').attr('class','form-line');
                        $('#error_oldPass').attr('style','color:red');
                        $('#error_oldPass').html('');
                        $('#error_newPass').attr('style','color:red');
                        $('#error_newPass').html('');
                        $('#error_newPass2').attr('style','color:red');
                        $('#error_newPass2').html('');

                        if(data=='Success'){
                            showSuccessMessage('Tersimpan');
                        }else{
                            showFailedMessage('Tersimpan');
                        }  
                    }
                });
                return false;
            }
        });

        // VALIDASI PASSWORD LAMA
        function validPass(){
            var id = <?php echo $this->session->userdata('id_login'); ?>;
            var pass = $('#old_pass').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Damkar/validPassword')?>",
                dataType : "html",
                data : {id:id, pass:pass},
                success: function(data){     
                    // alert(data);         
                    if(data=='Valid'){
                        $('#oldPass').attr('class','form-line focused success');
                        $('#error_oldPass').attr('style','color:green');
                        $('#error_oldPass').html('Password valid.');
                        $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
                        if ($('#newPass2').attr('class')=='form-line focused error') {
                            $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
                        }
                    }else{
                        $('#oldPass').attr('class','form-line focused error');
                        $('#error_oldPass').attr('style','color:red');
                        $('#error_oldPass').html('Password tidak valid.');
                        $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
                    }  
                    if (pass=='') {
                        $('#oldPass').attr('class','form-line focused');
                        $('#error_oldPass').html('');
                        $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
                    }
                }
            });
            return false;
        }

        // ULANGI PASS
        function ulangPass(){
            var pass1 = $('#new_pass').val();
            var pass2 = $('#new_pass2').val();

            if(pass1==pass2){
                $('#newPass2').attr('class','form-line focused success');
                $('#error_newPass2').attr('style','color:green');
                $('#error_newPass2').html('Password cocok.');
                $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
                if ($('#oldPass').attr('class')=='form-line focused error') {
                    $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
                }
            }else{
                $('#newPass2').attr('class','form-line focused error');
                $('#error_newPass2').attr('style','color:red');
                $('#error_newPass2').html('Password tidak cocok.');
                $('#Modal_Ubah_Pwd #btn_simpan').attr('disabled','');
            }  
            if (pass2=='') {
                $('#newPass2').attr('class','form-line focused');
                $('#error_newPass2').html('');
                $('#Modal_Ubah_Pwd #btn_simpan').removeAttr('disabled');
            }
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

    <script type="text/javascript">
        $('#waktu_awal').timepicker({
            autoclose: true
        });
        $('#waktu_akhir').timepicker({
            autoclose: true
        });

        $('#waktu_awal2').timepicker({
            autoclose: true
        });
        $('#waktu_akhir2').timepicker({
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
