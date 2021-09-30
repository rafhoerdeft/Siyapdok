<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA MEDIK</h2>
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
                                <?= $this->session->userdata('alert_rekam'); ?>
                            </div>
                            <!-- <div class="col-md-3 col-sm-3 col-lg-3" style="float: right;">
                                <button onclick="clear_data()" data-toggle="modal" data-target="#modal_add" class="btn bg-light-blue btn-block waves-effect" style="margin-bottom: -15px"><i class="material-icons" style="margin-bottom: 13px;">widgets</i> TAMBAH KONTAK</button>
                            </div> -->
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <form method="POST" action="<?= base_url().'Pasien/simpanRekam' ?>" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="row">

                                        <?php if ($dataRekam == null || $dataRekam == '') { ?>
                                                    <!-- Kolom 1 -->
                                                    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left;">

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Golongan Darah</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div style="margin-top: -17px">
                                                                       <select class="form-control show-tick" name="gol_darah" id="gol_darah">
                                                                           <option value="A">A</option>
                                                                           <option value="B">B</option>
                                                                           <option value="AB">AB</option>
                                                                           <option value="O">O</option>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>                                          

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Jantung</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="jantung" id="jantung">
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Diabetes</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="diabetes" id="diabetes" >
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Haemophilia</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="haemophilia" id="haemophilia" >
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Hepatitis</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="hepatitis" id="hepatitis" >
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
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
                                                                    <label>Tensi</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                                        <input type="text" autocomplete="off" class="form-control" name="tensi" id="tensi" style="margin-bottom: -4px;" required >
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>  

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Alergi Obat</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                                        <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="alergi_obat" id="alergi_obat" style="margin-bottom: -4px;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div> 

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Alergi Makanan</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                                        <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="alergi_makanan" id="alergi_makanan" style="margin-bottom: -4px;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>  

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Lain-Lain</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" autocomplete="off" class="form-line" style="margin-top: -6px;">
                                                                        <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="lain" id="lain" style="margin-bottom: -4px;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
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
                                        <?php }else{ ?>

                                                    <!-- Kolom 1 -->
                                                    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left;">

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Golongan Darah</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div style="margin-top: -17px">
                                                                       <select class="form-control show-tick" name="gol_darah" id="gol_darah">
                                                                           <option <?= ($dataRekam->gol_darah=='A'?'selected':'') ?> value="A">A</option>
                                                                           <option <?= ($dataRekam->gol_darah=='B'?'selected':'') ?> value="B">B</option>
                                                                           <option <?= ($dataRekam->gol_darah=='AB'?'selected':'') ?> value="AB">AB</option>
                                                                           <option <?= ($dataRekam->gol_darah=='O'?'selected':'') ?> value="O">O</option>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>                                          

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Jantung</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="jantung" id="jantung" <?= ($dataRekam->jantung=='Ya'?'checked':'') ?>>
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Diabetes</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="diabetes" id="diabetes" <?= ($dataRekam->diabetes=='Ya'?'checked':'') ?>>
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Haemophilia</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="haemophilia" id="haemophilia" <?= ($dataRekam->haemophilia=='Ya'?'checked':'') ?>>
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Hepatitis</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="switch">
                                                                        <label>Tidak</label>
                                                                        <label>
                                                                            <input value="Ya" type="checkbox" name="hepatitis" id="hepatitis" <?= ($dataRekam->hepatitis=='Ya'?'checked':'') ?>>
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                        <label>Ya</label>
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
                                                                    <label>Tensi</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                                        <input type="text" autocomplete="off" class="form-control" name="tensi" id="tensi" style="margin-bottom: -4px;" required value="<?= $dataRekam->tensi ?>">
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>  

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Alergi Obat</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                                        <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="alergi_obat" id="alergi_obat" value="<?= $dataRekam->alergi_obat ?>" style="margin-bottom: -4px;"><?= $dataRekam->alergi_obat ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div> 

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Alergi Makanan</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" class="form-line" style="margin-top: -6px;">
                                                                        <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="alergi_makanan" id="alergi_makanan" value="<?= $dataRekam->alergi_makanan ?>" style="margin-bottom: -4px;"><?= $dataRekam->alergi_makanan ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>  

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Lain-Lain</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div id="oldPass" autocomplete="off" class="form-line" style="margin-top: -6px;">
                                                                        <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="lain" id="lain" value="<?= $dataRekam->lain ?>" style="margin-bottom: -4px;"><?= $dataRekam->lain ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
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
                                        <?php } ?>
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






