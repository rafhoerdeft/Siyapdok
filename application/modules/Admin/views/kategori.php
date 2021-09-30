<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>KATEGORI APLIKASI</h2>
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
                                <?= $this->session->userdata('alert_kategori'); ?>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3" style="float: right;">
                                <button onclick="clear_data('tambah')" data-toggle="modal" data-target="#modal_add" class="btn bg-light-blue btn-block waves-effect" style="margin-bottom: -15px"><i class="material-icons" style="margin-bottom: 13px;">widgets</i> TAMBAH KATEGORI</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="data-kategori">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="30%">SKPD</th>
                                        <th width="20%">Nama Kategori</th>
                                        <th width="15%">Icon Kategori</th>
                                        <th width="7%">Status Tampil</th>
                                        <th width="5%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($kategori as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->skpd ?></td>
                                            <td><?= $data->nama_kategori ?></td>
                                            <td><img width="50" src="<?= base_url().'assets/path_menu/'.$data->gambar ?>"></td>
                                            <td><?= $data->tampil ?></td>
                                            
                                            <td>
                                                <button title="Edit" class="btn btn-sm cbtn-raised bg-green waves-effect" data-toggle="modal" data-target="#modal_edit" onclick="editKategori('<?= $data->nama_kategori ?>','<?= $data->skpd ?>','<?= $data->id_kategori ?>','<?= $data->tampil ?>','edit')" style="margin-bottom: 5px;"><i class="material-icons" style="margin-bottom: 10px;">border_color</i></button><br>
                                                <button title="Hapus" class="btn btn-sm cbtn-raised btn-danger waves-effect" onclick="hapusKategori('<?= $data->id_kategori ?>')" style="margin-bottom: 5px;"><i class="material-icons" style="margin-bottom: 10px;">delete</i></button>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <form name="simpanKategori" id="sk" method="post" action="<?= base_url().'Admin/simpanKategori'; ?>" enctype="multipart/form-data">
                        <!-- <input type="hidden" name="id_kategori" id="id_kategori"> -->
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Tambah Kategori</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Nama Kategori
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" name="nama_kategori" id="nama_kategori" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        SKPD
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" name="skpd" id="skpd" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Icon Kategori
                                    </div>
                                    <div class="col-md-8">
                                        <div id="icon" style="margin-top: -5px;">
                                            <input required type="file" class="file-loading" accept="image/*" name="gambar" id="gambar" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Status Tampil
                                    </div>
                                    <div class="col-md-8">
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="tampil" id="tampil">
                                               <option value="true">True</option>
                                               <option value="false">False</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">SIMPAN</button>
                            <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <form name="simpanKategori" id="sk" method="post" action="<?= base_url().'Admin/updateKategori'; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_kategori" id="id_kategori">
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Tambah Kategori</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Nama Kategori
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" name="nama_kategori" id="nama_kategori" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        SKPD
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" name="skpd" id="skpd" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Icon Kategori
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" style="margin-top: -5px;">
                                            <input type="file" class="file-loading" accept="image/*" name="gambar" id="edit" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Status Tampil
                                    </div>
                                    <div class="col-md-8">
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="tampil" id="tampil">
                                               <option id="true" value="true">True</option>
                                               <option id="false" value="false">False</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">SIMPAN</button>
                            <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Clear - Edit - Hapus User -->
<script type="text/javascript">
    function clear_data(gambar) {
        $('#modal_add #nama_kategori').val('');
        $('#modal_add #gambar').val('');
        $('#modal_add #skpd').val('');
        $('#modal_add #icon').html('<input required type="file" class="file-loading" accept="image/*" name="gambar" id="'+gambar+'" style="margin-bottom: -4px;">');
        showUpload(gambar);
    }

    function editKategori(nama, skpd, id, tampil, gambar) {
        $('#modal_edit #id_kategori').val(id);
        $('#modal_edit #skpd').val(skpd);
        $('#modal_edit #nama_kategori').val(nama);
        $('#modal_edit #'+tampil).removeAttr('selected');
        $('#modal_edit #'+tampil).attr('selected','');
        $('#modal_edit #tampil').selectpicker('refresh');
        $('#modal_edit #icon').html('<input required type="file" class="file-loading" accept="image/*" name="gambar" id="'+gambar+'" style="margin-bottom: -4px;">');
        showUpload(gambar);
    }

    function hapusKategori(id='') {
        var ids = parseInt(id);
        swal({
          title: "Hapus Data",
          text: "Apakah data kategori akan dihapus?",
          type: "info",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
        }, function () {
            setTimeout(function () {

                    $.post("<?= base_url() ?>/Admin/hapusKategori", {id_kategori: id}, function(result){
                      // alert(result);
                        if (result == 'Success') {
                            swal("Data berhasil dihapus!");  
                            window.location.href = "<?= base_url().'Admin/kategori/' ?>";
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
        window.location.href = "<?=base_url().'Admin/historiAduan' ?>";
    }
</script>





