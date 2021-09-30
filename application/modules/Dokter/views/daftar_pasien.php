<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DAFTAR PASIEN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-lg-9" style="margin-bottom: -35px;">
                                <?= $this->session->userdata('alert_pasien'); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="data-pasien">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="17%">Nama Pasien</th>
                                        <th width="10%">Jenis Kelamin</th>
                                        <th width="20%">Alamat</th>
                                        <th width="12%">Tgl Registrasi</th>
                                        <th width="12%">No. Registrasi</th>
                                        <th width="18%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 9pt">
                                    <?php $no=1; foreach ($dataPasien as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama_user ?></td>
                                            <td><?= $data->jk_user ?></td>
                                            <td><?= $data->almt_user.', '.$data->type.' '.$data->nama_kota ?></td>
                                            <td><?= date('d-m-Y', strtotime($data->tgl_reg)) ?></td>
                                            <td><?= $data->nomor_reg ?></td>
                                            <td>
                                                <button style="margin-bottom: 3px" title="Data Medik" data-toggle="modal" data-target="#modal_detail" onclick="showPasien(<?= $data->id_user ?>, '<?= date('d-m-Y', strtotime($data->tgl_lahir_user)) ?>')" type="button" class="btn bg-light-blue waves-effect"><i class="material-icons" style="margin-top: -5px">account_box</i></button>
                                                
                                                <a href="<?= base_url().'Dokter/rekamMedik/'.$data->id_user ?>"><button style="margin-bottom: 3px" title="Rekam Medik" type="button" class="btn bg-red waves-effect"><i class="material-icons" style="margin-top: -5px">assignment_ind</i></button></a>

                                                <?php if ($data->jml_periksa > 0) { ?>
                                                    <button style="margin-bottom: 3px" title="Hasil Periksa" onclick="periksaPasien(<?= $data->id_reg ?>)" type="button" data-toggle="modal" data-target="#modal_periksa" class="btn bg-green waves-effect"><i class="material-icons" style="margin-top: -5px">assignment</i></button>
                                                <?php }else{ ?>
                                                    <button style="margin-bottom: 3px" title="Hasil Periksa" onclick="periksaPasien(<?= $data->id_reg ?>)" type="button" data-toggle="modal" data-target="#modal_periksa" class="btn btn-warning waves-effect"><i class="material-icons" style="margin-top: -5px">assignment</i></button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Input Data Hasil Periksa Pasien -->
<div class="modal fade" id="modal_periksa" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <form name="periksa" id="periksa" method="post" action="<?= base_url().'Dokter/simpanPeriksa'; ?>">
                        <input type="hidden" name="id_reg" id="id_reg">
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Hasil Periksa Pasien</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Keluhan
                                    </div>
                                    <div class="col-md-8">
                                        <div id="pr" class="form-line" style="margin-top: -5px;">
                                            <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="keluhan" id="keluhan" style="margin-bottom: -4px;"></textarea>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Diagnosa
                                    </div>
                                    <div class="col-md-8">
                                        <div id="pr" class="form-line" style="margin-top: -5px;">
                                            <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="diagnosa" id="diagnosa" style="margin-bottom: -4px;"></textarea>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Tindakan
                                    </div>
                                    <div class="col-md-8">
                                        <div id="pr" class="form-line" style="margin-top: -5px;">
                                            <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="tindakan" id="tindakan" style="margin-bottom: -4px;"></textarea>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Resep
                                    </div>
                                    <div class="col-md-8">
                                        <div id="pr" class="form-line" style="margin-top: -5px;">
                                            <textarea rows="1" autocomplete="off" required class="form-control no-resize auto-growth" name="resep" id="resep" style="margin-bottom: -4px;"></textarea>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">Simpan</button>
                            <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script type="text/javascript">
    function periksaPasien(id='') {
        // alert(id);

        $.post("<?= base_url() ?>/Dokter/showDetailPeriksa", {id_reg: id}, function(result){
            var dt = JSON.parse(result);

            $('#modal_periksa #id_reg').val(id);
            $('#modal_periksa #keluhan').val('');
            $('#modal_periksa #diagnosa').val('');
            $('#modal_periksa #tindakan').val('');
            $('#modal_periksa #resep').val('');

            $('#modal_periksa #keluhan').val(dt.keluhan);
            $('#modal_periksa #diagnosa').val(dt.diagnosa);
            $('#modal_periksa #tindakan').val(dt.tindakan);
            $('#modal_periksa #resep').val(dt.resep);
        });
    }
</script>








