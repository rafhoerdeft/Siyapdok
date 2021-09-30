<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LIST DOKTER
                <small class="text-muted">Pilih Dokter yang akan kamu kunjungi untuk berobat</small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label>Cari berdasarkan tempat tinggal</label>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: -20px">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <form method="GET" action="<?= base_url().'Pasien/index' ?>">
                                        <div class="row">

                                            <div class="col-lg-11 col-md-11 col-sm-11">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div style="margin-top: -30px">
                                                                        <!-- <label>Provinsi</label> -->
                                                                       <select onchange="showKota()" class="form-control show-tick" name="provinsi" id="provinsi" data-live-search="true" required>
                                                                        <option disabled value="" selected>-- Pilih Provinsi --</option>
                                                                        <option <?= ($provinsi == 'semua_prov'?'selected':'') ?> value="semua_prov">Semua Provinsi</option>
                                                                        <?php foreach ($prov as $key) { ?>
                                                                           <option <?= ($key->id_prov == $provinsi?'selected':'') ?> value="<?= $key->id_prov ?>"><?= $key->nama_prov ?></option>
                                                                       <?php } ?>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div style="margin-top: -30px">
                                                                        <!-- <label>Kota</label> -->
                                                                       <select class="form-control show-tick" name="kota" id="kota" data-live-search="true" required>
                                                                            <option disabled value="">-- Pilih Kota --</option>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>  
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div style="margin-top: -30px">
                                                                        <!-- <label>Kota</label> -->
                                                                       <select class="form-control show-tick" name="spesialis" id="spesialis" data-live-search="true" required>
                                                                            <option <?= ($spes == 'semua_spes'?'selected':'') ?> value="semua_spes">Semua Spesialis</option>
                                                                            <?php foreach ($dataSpes as $key) { ?>
                                                                                <option <?= ($key->id_spes == $spes?'selected':'') ?> value="<?= $key->id_spes ?>"><?= $key->nama_spes ?></option>
                                                                            <?php } ?>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-1 col-sm-1 col-lg-1" style="float: right; ">
                                                <button type="submit" onclick="clear_data()" class="btn bg-light-blue btn-sm btn-block waves-effect"><i class="material-icons" style="margin-bottom: 8px; margin-left: -2px; font-size: 20pt; font-weight: bold">search</i></button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>

                    <div class="body">

                        <div class="container-fluid">
                            <div class="row clearfix">
                                <?php if ($user == '' || $user == null) { ?>
                                    <label style="font-size: 20pt; font-weight: bold; margin: auto;">Data tidak ditemukan</label>
                                <?php }else{  
                                    foreach ($user as $data) { ?>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="card product_item">
                                                <div class="body">
                                                    <div class="cp_img">
                                                        <center>
                                                            <!-- <div style="width: 200px; height: 200px; overflow: hidden;"> -->
                                                                <img style="width: 400px; height: 200px; " src="<?= base_url().'assets/path_profile/'.$data->foto_user ?>" alt="Product" class="img-fluid" />
                                                            <!-- </div> -->
                                                        </center>
                                                        <div class="hover">
                                                            <a style="width: 100px" href="javascript:void(0);" data-toggle="modal" data-target="#modal_detail" onclick="showDokter(<?= $data->id_user ?>, <?= $data->id_dokter ?>,<?= $data->jml_pasien ?>, <?= $data->jml_reg ?>, <?= $id_user ?>)" class="btn btn-primary waves-effect waves-float"><i class="zmdi zmdi-plus"></i> Detail</a>
                                                            <!-- <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float"><i class="zmdi zmdi-shopping-cart"></i></a> -->
                                                        </div>
                                                    </div>
                                                    <div class="product_details">
                                                        <h5><a href="product-details.html"><?= $data->nama_user ?></a></h5>
                                                        <ul class="product_price list-unstyled">
                                                            <li class="new_price" style="color: #2170ef; font-size: 10pt"><?= $data->almt_user.', '.($data->type=='Kabupaten'?'Kab. ':$data->type).' '.$data->nama_kota ?></li>
                                                            <li class="old_price"><label <?= ($data->jml_reg==$data->jml_pasien?"style='color: red;'":"") ?>>(Pasien: <b><?= $data->jml_reg.'/'.$data->jml_pasien ?></b>)</label></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                
                                        </div>
                                    <?php }} ?>
                            </div>

                            <br>
                            <div class="row clearfix">
                                <div style="text-decoration: none; margin: auto;">
                                    <?= $pages ?>
                                </div>
                            </div>
                        </div>   

                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Input Angka -->
<script type="text/javascript">
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }
</script>

<!-- Print Page  -->
<script type="text/javascript">
    function printLaporan(n){
        // var button = $('#buttonPrintInvoice').hide();
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(n).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        // document.body.innerHTML = restorepage;
        // $('#detailInvoice').modal('hide');
        window.location.href = "<?=base_url().'Damkar/historiAduan' ?>";
    }
</script>






