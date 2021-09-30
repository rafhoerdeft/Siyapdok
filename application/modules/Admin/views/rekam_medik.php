<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>REKAM MEDIK PASIEN (<?= $namaPasien ?>)</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-lg-2" style="float: right;">
                                <a href="<?= base_url().'Admin/dataUser' ?>">
                                    <button class="btn bg-light-blue btn-block waves-effect" style="margin-bottom: -15px"><i class="material-icons" style="margin-bottom: 8px;">keyboard_return</i> KEMBALI</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="data-rekam">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="5%">ID Dokter</th>
                                        <th width="11%">Tgl Periksa</th>
                                        <th width="20%">Keluhan</th>
                                        <th width="20%">Diagnosa</th>
                                        <th width="20%">Tindakan</th>
                                        <th width="19%">Resep</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 9pt">
                                    <?php $no=1; foreach ($dataPeriksa as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td align="center"><?= $data->id_dokter ?></td>
                                            <td><?= date('d-m-Y', strtotime($data->tgl_periksa)) ?></td>
                                            <td><?= $data->keluhan ?></td>
                                            <td><?= $data->diagnosa ?></td>
                                            <td><?= $data->tindakan ?></td>
                                            <td><?= $data->resep ?></td>
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








