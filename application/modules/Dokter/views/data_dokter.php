<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA DOKTER</h2>
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
                                <?= $this->session->userdata('alert_dok'); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <form method="POST" action="<?= base_url().'Dokter/simpanDataDok' ?>">
                            <div class="row clearfix">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <!-- Kolom 1 -->
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: left;">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Nomor STR
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="judul" class="form-line" style="margin-top: -5px;">
                                                            <input required type="text" class="form-control" name="str" id="str" style="margin-bottom: -4px;" value="<?= $dataDok->no_str ?>" placeholder="312322352234235253">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Nomor SIP
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="judul" class="form-line" style="margin-top: -5px;">
                                                            <input required type="text" class="form-control" name="sip" id="sip" style="margin-bottom: -4px;" value="<?= $dataDok->sip_dokter ?>" placeholder="028/162/SIP-TU/III/2003">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Spesialis
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div style="margin-top: -17px">
                                                           <select class="form-control show-tick" name="id_spes" id="id_spes">
                                                                <?php foreach ($dataSpes as $key) { ?>
                                                                   <option <?= ($key->id_spes == $dataDok->id_spes?'selected':'') ?> value="<?= $key->id_spes ?>"><?= $key->nama_spes ?></option>
                                                               <?php } ?>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Jml. Maks Pasien
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div id="judul" class="form-line" style="margin-top: -5px;">
                                                            <input required type="text" class="form-control" onkeypress="return inputAngka(event);" maxlength="4" name="jml_pasien" id="jml_pasien" value="<?= $dataDok->jml_pasien ?>" style="margin-bottom: -4px;" placeholder="50">
                                                        </div>
                                                    </div>
                                                </div>                        
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Jadwal Praktik</h4>
                                    <br>
                                    <div class="row">

                                        <?php $days = array('senin','selasa','rabu','kamis','jumat','sabtu','ahad'); ?>

                                        <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: left;" id="hari">
                                            <b>HARI</b>

                                            <?php 
                                                foreach ($days as $key) { 
                                                    $hari = ucfirst($key);
                                                    $xx = 0;
                                                    foreach ($dataJdwl as $val) {
                                                        if ($hari == $val->hari) { 
                                                            $xx++;
                                                        }
                                                    }

                                                    if ($xx > 0) {
                                            ?>
                                                        <div class="form-group" style="margin-bottom: -10px">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?= ucfirst($key) ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="switch">
                                                                        <label>
                                                                            <input value="<?= ucfirst($key) ?>" type="checkbox" name="<?= ucfirst($key) ?>" id="<?= ucfirst($key) ?>" checked>
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                            <?php }else{ ?>
                                                        <div class="form-group" style="margin-bottom: -10px">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?= ucfirst($key) ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="switch">
                                                                        <label>
                                                                            <input value="<?= ucfirst($key) ?>" type="checkbox" name="<?= ucfirst($key) ?>" id="<?= ucfirst($key) ?>">
                                                                            <span class="lever switch-col-red"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                            <?php }} ?>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4" id="buka">
                                            <b>JAM BUKA</b>

                                            <?php 
                                                foreach ($days as $key) { 
                                                    $hari = ucfirst($key);
                                                    $xx = 0;
                                                    $value = '';
                                                    $dis = 'disabled';
                                                    foreach ($dataJdwl as $val) {
                                                        if ($hari == $val->hari) { 
                                                            $xx++;
                                                            $value = $val->jam_buka;
                                                            $dis = '';
                                                        }
                                                    }
                                            ?>
                                                    <div class="form-group" style="margin-bottom: -12px">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div id="buka_<?= $key  ?>" class="form-line" style="margin-top: -5px;">
                                                                    <input <?= $dis ?> required type="text" class="form-control waktu" name="jam_buka_<?= $key  ?>" id="jam_buka_<?= $key  ?>" style="margin-bottom: -3px;" value="<?= $value ?>" placeholder="07.00">
                                                                </div>
                                                            </div>
                                                        </div>                        
                                                    </div>
                                            <?php } ?>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4" id="tutup">
                                            <b>JAM TUTUP</b>

                                            <?php 
                                                foreach ($days as $key) { 
                                                    $hari = ucfirst($key);
                                                    $xx = 0;
                                                    $value = '';
                                                    $dis = 'disabled';
                                                    foreach ($dataJdwl as $val) {
                                                        if ($hari == $val->hari) { 
                                                            $xx++;
                                                            $value = $val->jam_tutup;
                                                            $dis = '';
                                                        }
                                                    }
                                            ?>
                                                    <div class="form-group" style="margin-bottom: -12px">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div id="tutup_<?= $key ?>" class="form-line" style="margin-top: -5px;">
                                                                    <input <?= $dis ?> required type="text" class="form-control waktuxx" name="jam_tutup_<?= $key ?>" id="jam_tutup_<?= $key ?>" style="margin-bottom: -3px;" value="<?= $value ?>" placeholder="16.00">
                                                                </div>
                                                            </div>
                                                        </div>                        
                                                    </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" id="btn_simpan" class="btn btn-block btn-primary waves-effect">SIMPAN</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="reset" id="btn_reset" class="btn btn-block btn-warning waves-effect">RESET</button>
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

<!-- Input Angka -->
<script type="text/javascript">
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }
</script>
