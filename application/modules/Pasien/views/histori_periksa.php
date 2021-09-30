<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>HISTORI PERIKSA</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="data-histori">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="16%">Dokter</th>
                                        <th width="11%">Tgl Periksa</th>
                                        <th width="20%">Keluhan</th>
                                        <th width="16%">Diagnosa</th>
                                        <th width="16%">Tindakan</th>
                                        <th width="16%">Resep</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 9pt">
                                    <?php $no=1; foreach ($dataPeriksa as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama_dok ?></td>
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








