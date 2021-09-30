<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA PROFIL</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <!-- <h2> BASIC EXAMPLE </h2> -->
                        <!-- <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul> -->
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-lg-9" style="margin-bottom: -35px;">
                                <?= $this->session->userdata('alert_profil'); ?>
                            </div>
                            <!-- <div class="col-md-3 col-sm-3 col-lg-3" style="float: right;">
                                <button onclick="clear_data()" data-toggle="modal" data-target="#modal_add" class="btn bg-light-blue btn-block waves-effect" style="margin-bottom: -15px"><i class="material-icons" style="margin-bottom: 13px;">widgets</i> TAMBAH KONTAK</button>
                            </div> -->
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <form method="POST" action="<?= base_url().'Pasien/simpanProfil' ?>" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <!-- Kolom 1 -->
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left;">
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nama User</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                            <input type="text" autocomplete="off" class="form-control" name="nama_user" id="nama_user" style="margin-bottom: -4px;" required value="<?= $dataProfil->nama_user ?>">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <!-- <div id="oldPass" class="form-line" style="margin-top: -6px;"> -->
                                                        <div style="margin-top: -17px">
                                                           <select class="form-control show-tick" name="jk_user" id="jk_user">
                                                               <option <?= ($dataProfil->jk_user=='Laki-Laki'?'selected':'') ?> value="Laki-Laki">Laki-Laki</option>
                                                               <option <?= ($dataProfil->jk_user=='Perempuan'?'selected':'') ?> value="Perempuan">Perempuan</option>
                                                           </select>
                                                        </div>
                                                       <!-- </div> -->
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="tglLhr" class="form-line" style="margin-top: -6px;">
                                                            <input type="text" autocomplete="off" class="form-control date" placeholder="Ex: 30/07/2016" name="tgl_lhr" id="tgl_lhr" style="margin-bottom: -4px;" required value="<?= date('d/m/Y', strtotime($dataProfil->tgl_lahir_user)) ?>">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Provinsi</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div style="margin-top: -17px">
                                                           <select onchange="showKota()" class="form-control show-tick" name="provinsi" id="provinsi" data-live-search="true" required>
                                                            <option disabled value="" selected>-- Pilih Provinsi --</option>
                                                            <?php foreach ($prov as $key) { ?>
                                                               <option <?= ($dataProfil->id_prov==$key->id_prov?'selected':'') ?> value="<?= $key->id_prov ?>"><?= $key->nama_prov ?></option>
                                                           <?php } ?>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Kota</label>
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
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                            <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="almt_user" id="almt_user" style="margin-bottom: -4px;"><?= $dataProfil->almt_user ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nomor HP</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                            <input type="text" autocomplete="off" onkeypress="return inputAngka(event);" maxlength="13" class="form-control" name="no_hp" id="no_hp" required style="margin-bottom: -4px;" value="<?= $dataProfil->no_telp_user ?>">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="oldPass" autocomplete="off" class="form-line" style="margin-top: -6px;">
                                                            <input type="text" class="form-control" name="username" id="username" style="margin-bottom: -4px;" required value="<?= $dataProfil->username ?>">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="newPass" class="form-line" style="margin-top: -6px;">
                                                            <input type="password" class="form-control" name="password" id="password" style="margin-bottom: -4px;" placeholder="Isi password jika ingin dirubah">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>  

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Re Password</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="rePass" class="form-line" style="margin-top: -6px;">
                                                            <input type="password" class="form-control" name="re_password" id="re_password" style="margin-bottom: -4px;" placeholder="Ulangi password yang ingin dirubah">
                                                        </div>
                                                        <label id="error_rePass" class="sukses" for="new_pass" style="display: block;"></label>
                                                    </div>
                                                </div>                        
                                            </div>  

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <center>
                                                            <?php if ($dataProfil->foto_user == null || $dataProfil->foto_user == '') { ?>
                                                                    <div style="width: 160px; height: 160px; border: 2px double grey; "><label style="margin-top: 65px">Tidak ada foto</label></div>
                                                            <?php }else{ ?>
                                                                    <img height="160" width="160" src="<?= base_url().'assets/path_profile/'.$dataProfil->foto_user ?>">
                                                            <?php } ?>
                                                        
                                                            <!-- <label style="width: 160px" class="btn bg-light-blue waves-effect" for="inputImage" title="Upload image file">
                                                                <input type="file" class="sr-only" id="inputImage" name="foto_user" accept="image/*">
                                                            Ganti Foto
                                                            </label> -->
                                                        </center>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <!-- <div class="row">
                                                            <div class="col-md-6">
                                                                <div id="cropperContainer" style="height: 250px; width: 250px">
                                                                    <img id="cropperImage" alt="Cropper Image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div style="width: 250px; height: 250px; overflow: hidden;">
                                                                    <div class="cropper-preview"></div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div id="icon" style="margin-top: -5px;">
                                                            <input type="file" class="file-loading" accept="image/*" name="foto_user" id="foto_user" style="margin-bottom: -4px;">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-block btn-primary waves-effect">Simpan</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="reset" class="btn btn-block btn-warning waves-effect">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clear - Edit - Hapus User -->
<script type="text/javascript">
    function clear_data() {
        $('#modal_add #nomor').val('');
        $('#modal_add #kontak').val('');
    }

    function editNomor(id='', kontak='', nomor='') {
        // $.post("<?//= base_url() ?>/Pasien/showEditInfo", {id_no_telp: id}, function(result){
        //     var dt = JSON.parse(result);
            $('#modal_edit #id_no_telp').val(id);
            $('#modal_edit #nomor').val(nomor);
            $('#modal_edit #kontak').val(kontak);
        // });
    }

    function hapusNomor(id='') {
        var ids = parseInt(id);
        swal({
          title: "Hapus Data",
          text: "Apakah data nomor telepon akan dihapus?",
          type: "info",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
        }, function () {
            setTimeout(function () {

                    $.post("<?= base_url() ?>/Pasien/hapusNomor", {id_no_telp: id}, function(result){
                      // alert(result);
                        if (result == 'Success') {
                            swal("Data berhasil dihapus!");  
                            window.location.href = "<?= base_url().'Pasien/nomorTelp/' ?>";
                        }else{
                            swal("Gagal!");
                        }
                    });
            }, 700);
        });
    }
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






