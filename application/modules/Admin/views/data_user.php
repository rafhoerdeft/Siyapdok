<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA USER</h2>
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
                                <?= $this->session->userdata('alert_user'); ?>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3" style="float: right;">
                                <button onclick="clear_data()" data-toggle="modal" data-target="#modal_add" class="btn bg-light-blue btn-block waves-effect" style="margin-bottom: -15px"><i class="material-icons" style="margin-bottom: 13px;">person_add</i> TAMBAH USER</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="data-user">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">Nama </th>
                                        <th width="30%">Alamat</th>
                                        <th width="5%">Jenis Kelamin</th>
                                        <th width="10%">Tanggal Lahir</th>
                                        <th width="10%">Nomor HP</th>
                                        <th width="10%">Username</th>
                                        <th width="5%">Role</th>
                                        <th width="5%">Foto</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($dataUser as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama_user ?></td>
                                            <td><?= $data->almt_user.', '.$data->type.' '.$data->nama_kota ?></td>
                                            <td><?= $data->jk_user ?></td>
                                            <td><?= date('d-m-Y', strtotime($data->tgl_lahir_user)) ?></td>
                                            <td><?= $data->no_telp_user ?></td>
                                            <td><?= $data->username ?></td>
                                            <td><?= $data->role ?></td>
                                            <td>
                                                <?php if ($data->foto_user == '' || $data->foto_user == null) { ?>
                                                    <button title="Lihat Foto" class="btn cbtn-raised btn-primary waves-effect" ><i class="material-icons" style="margin-top: -5px">visibility</i></button>
                                                <?php }else{ ?>
                                                    <a class="foto_kejadian" href="<?= base_url().'assets/path_profile/'.$data->foto_user ?>"><button title="Lihat Foto" class="btn cbtn-raised btn-primary waves-effect" ><i class="material-icons" style="margin-top: -5px">visibility</i></button></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <button title="Edit" class="btn cbtn-raised bg-green waves-effect" data-toggle="modal" data-target="#modal_edit" onclick="editUser('<?= $data->id_user ?>','<?= $data->nama_user ?>','<?= $data->jk_user ?>','<?= $data->almt_user ?>','<?= date('d/m/Y', strtotime($data->tgl_lahir_user)) ?>','<?= $data->no_telp_user ?>','<?= $data->id_role ?>','<?= $data->username ?>','<?= $data->id_kota ?>','<?= $data->id_prov ?>')" style="margin-bottom: 5px;"><i class="material-icons" style="margin-top: -5px">border_color</i></button>
                                                        <button title="Hapus" class="btn cbtn-raised btn-danger waves-effect" onclick="hapusUser(<?= $data->id_user ?>)" style="margin-bottom: 5px;"><i class="material-icons" style="margin-top: -5px">delete</i></button>

                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-12" style="width: 105px">
                                                        <button title="Detail User" style="margin-bottom: 5px;" data-toggle="modal" data-target="#modal_detail" onclick="showDetailUser(<?= $data->id_user ?>, '<?= date('d-m-Y', strtotime($data->tgl_lahir_user)) ?>')" type="button" class="btn bg-light-blue waves-effect"><i class="material-icons" style="margin-top: -5px">account_box</i></button>

                                                        <a href="<?= base_url().'Admin/rekamMedik/'.$data->id_user ?>"><button style="margin-bottom: 5px" title="Rekam Medik" type="button" class="btn bg-orange waves-effect"><i class="material-icons" style="margin-top: -5px">assignment_ind</i></button></a>
                                                    </div>
                                                </div>
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
                    <form name="laporan" id="lp" method="post" action="<?= base_url().'Admin/simpanUser'; ?>">
                        <!-- <input type="hidden" name="id_lapor" id="id_lapor"> -->
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama User</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" class="form-control" name="nama_user" id="nama_user" style="margin-bottom: -4px;">
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
                                               <option value="<?= $key->id_prov ?>"><?= $key->nama_prov ?></option>
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

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <textarea rows="1" class="form-control no-resize auto-growth" name="almt_user" id="almt_user" style="margin-bottom: -4px;">&nbsp</textarea>
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
                                        <!-- <div id="oldPass" class="form-line" style="margin-top: -5px;"> -->
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="jk_user" id="jk_user">
                                               <option value="Laki-Laki">Laki-Laki</option>
                                               <option value="Perempuan">Perempuan</option>
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
                                        <div id="tglLhr" class="form-line" style="margin-top: -5px;">
                                            <input type="text" autocomplete="off" class="form-control date" placeholder="Ex: 30/07/2016" name="tgl_lhr" id="tgl_lhr" style="margin-bottom: -4px;" required>
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
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" class="form-control" name="username" id="username" style="margin-bottom: -4px;">
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
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" onkeypress="return inputAngka(event);" maxlength="13" class="form-control" name="no_hp" id="no_hp" required style="margin-bottom: -4px;">
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
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" class="form-control" name="password" id="password" required style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Role User</label>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <div id="oldPass" class="form-line" style="margin-top: -5px;"> -->
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="role_user" id="role_user" required>
                                               <?php foreach ($role as $key) { ?>
                                                        <option value="<?= $key->id_role ?>"><?= $key->role ?></option>
                                               <?php } ?>
                                           </select>
                                        </div>
                                       <!-- </div> -->
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
                    <form name="laporan" id="lp" method="post" action="<?= base_url().'Admin/updateUser'; ?>">
                        <input type="hidden" name="id_user" id="id_user">
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Edit Data User</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama User</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" class="form-control" name="nama_user" id="nama_user" style="margin-bottom: -4px;">
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
                                           <select onchange="showKotaEdit()" class="form-control show-tick" name="provinsi" id="provinsi" data-live-search="true" required>
                                            <option disabled value="">-- Pilih Provinsi --</option>
                                            <?php foreach ($prov as $key) { ?>
                                               <option class="prov" id="<?= $key->id_prov ?>" value="<?= $key->id_prov ?>"><?= $key->nama_prov ?></option>
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

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <textarea rows="1" class="form-control no-resize auto-growth" name="almt_user" id="almt_user" style="margin-bottom: -4px;">&nbsp</textarea>
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
                                        <!-- <div id="oldPass" class="form-line" style="margin-top: -5px;"> -->
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="jk_user" id="jk_user">
                                               <option class="jk_user" value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
                                               <option class="jk_user" value="Perempuan" id="Perempuan">Perempuan</option>
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
                                        <div id="tglLhr" class="form-line" style="margin-top: -5px;">
                                            <input type="text" autocomplete="off" class="form-control date" placeholder="Ex: 30/07/2016" name="tgl_lhr" id="tgl_lhr2" style="margin-bottom: -4px;" required>
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
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" class="form-control" name="username" id="username" style="margin-bottom: -4px;">
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
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" onkeypress="return inputAngka(event);" maxlength="13" class="form-control" name="no_hp" id="no_hp" required style="margin-bottom: -4px;">
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
                                        <div id="oldPass" class="form-line" style="margin-top: -5px;">
                                            <input type="text" class="form-control" name="password" id="password" style="margin-bottom: -4px;">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Role User</label>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <div id="oldPass" class="form-line" style="margin-top: -5px;"> -->
                                        <div style="margin-top: -17px">
                                           <select class="form-control show-tick" name="role_user" id="role_user" required>
                                               <?php foreach ($role as $key) { ?>
                                                        <option class="role_user" value="<?= $key->id_role ?>" id="<?= $key->id_role ?>"><?= $key->role ?></option>
                                               <?php } ?>
                                           </select>
                                        </div>
                                       <!-- </div> -->
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">UPDATE</button>
                            <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Detail Pasien -->
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <!-- <form name="laporan" id="lp" method="post" action="<?//= base_url().'Dokter/registrasiPasien'; ?>"> -->
                        <!-- <input type="hidden" name="id_dokter" id="id_dokter"> -->
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Detail Pasien</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">
                            
                            <div class="form-group" style="margin-bottom: -10px; margin-top: -5px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nama Pasien</label>
                                        <div>
                                            <span id="nama_user">Surtinah</span><div style="float: right;" id="gender"><img style="margin-top: -2px" width="25" src="<?= base_url().'assets/path_icon/female.png' ?>"><label></label></div>
                                        </div> 

                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tanggal Lahir</label>
                                        <div id="tgl_lahir_user">12-12-2012</div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Alamat Pasien</label>
                                        <div id="almt_user">Menowosari 10 RT 1 RW 1 Kedungsari, Magelang Utara, Kota Magelang</div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nomor Telepon/HP</label>
                                        <div id="no_telp_user">08574349xxx</div>
                                    </div>
                                </div>                        
                            </div>

                            <hr>
                            <b>Rekam Medik</b>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gol. Darah: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="gol_darah">O</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tensi: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="tensi">120/180</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jantung: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="jantung">Tidak</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Diabetes: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="diabetes">Tidak</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Haemophilia: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="haemophilia">Tidak</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hepatitis: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="hepatitis">Tidak</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                            <div class="form-group" style="margin-bottom: -10px">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Alergi Obat</label>
                                                <div id="alergi_obat">Obat Kurap</div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Alergi Makanan</label>
                                                <div id="alergi_makanan">Dada dan Paha Ayam</div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Lain-Lain</label>
                                                <div id="lain">Terserah loe dahh</div>
                                            </div>
                                        </div>     
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12" id="photos">
                                                <img src="" id="foto_user" width="125" height="125">
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Clear - Edit - Hapus User -->
<script type="text/javascript">
    function clear_data() {
        $('#modal_add #nama_user').val('');
        $('#modal_add #almt_user').val('');
        $('#modal_add #tgl_lhr').val('');
        $('#modal_add #no_hp').val('');
        $('#modal_add #username').val('');
        $('#modal_add #password').val('');
    }

    function editUser(id='', nama='', jk_user='', almt='', tgl_lhr='', no_hp='', role='', user='', kota='', prov='') {
        // alert(prov);

        $('#modal_edit #id_user').val(id);
        $('#modal_edit #nama_user').val(nama);
        $('#modal_edit #almt_user').val(almt);
        $('#modal_edit #tgl_lhr2').val(tgl_lhr);
        $('#modal_edit #no_hp').val(no_hp);
        $('#modal_edit #username').val(user);
        // $('#modal_edit #password').val(pass);
        $('#modal_edit #provinsi .prov').removeAttr('selected');
        $('#modal_edit #provinsi #'+prov).attr('selected','');
        $('#modal_edit #provinsi').selectpicker('refresh');

        showKotaEdit(prov, kota);

        $('#modal_edit .jk_user').removeAttr('selected');
        $('#modal_edit #'+jk_user).attr('selected','');
        $('#modal_edit #jk_user').selectpicker('refresh');

        $('#modal_edit .role_user').removeAttr('selected');
        $('#modal_edit #'+role).attr('selected','');
        $('#modal_edit #role_user').selectpicker('refresh');
    }

    function hapusUser(id='') {
        // var ids = parseInt(id);
        swal({
          title: "Hapus Data",
          text: "Apakah data user akan dihapus?",
          type: "info",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
        }, function () {
            setTimeout(function () {

                    $.post("<?= base_url() ?>/Admin/hapusUser", {id_user: id}, function(result){
                      // alert(result);
                        if (result == 'Success') {
                            swal("Data berhasil dihapus!");  
                            window.location.href = "<?= base_url().'Admin/dataUser/' ?>";
                        }else{
                            swal("Gagal!");
                        }
                    });
            }, 700);
        });
    }
</script>

<!-- Show Detail User -->
<script type="text/javascript">
    function showDetailUser(id='', tgl_lhr='') {
        // alert(tgl_lhr);
        $.post("<?= base_url() ?>/Admin/showDetailUser", {id_user: id}, function(result){
            var dt = JSON.parse(result);

            $('#modal_detail #nama_user').html(dt.nama_user);
            $('#modal_detail #tgl_lahir_user').html(tgl_lhr);
            $('#modal_detail #almt_user').html(dt.almt_user+', '+dt.type+' '+dt.nama_kota);
            $('#modal_detail #no_telp_user').html(dt.no_telp_user);
            if (dt.jk_user == 'Perempuan') {
                var gender = 'female.png';
            }else{
                var gender = 'male.png';
            }
            $('#modal_detail #gender img').attr('src',"<?= base_url()?>"+'assets/path_icon/'+gender);
            $('#modal_detail #gender label').html(dt.jk_user);

            $('#modal_detail #gol_darah').html(dt.gol_darah);
            $('#modal_detail #tensi').html(dt.tensi);
            $('#modal_detail #jantung').html(dt.jantung);
            $('#modal_detail #diabetes').html(dt.diabetes);
            $('#modal_detail #haemophilia').html(dt.haemophilia);
            $('#modal_detail #hepatitis').html(dt.hepatitis);
            $('#modal_detail #alergi_makanan').html(dt.alergi_makanan);
            $('#modal_detail #alergi_obat').html(dt.alergi_obat);
            $('#modal_detail #lain').html(dt.lain);
            // $('#modal_detail #foto_user').attr('src',"<?//= base_url().'assets/path_profile/' ?>"+dt.foto_user);
            var photos = '';
            if (dt.foto_user == null || dt.foto_user == '') {
                photos = "<div style='width: 125px; height: 125px; border: 2px double grey;'><center><label style='margin-top: 50px;'>Tidak ada foto</label></center></div>";
            }else{
                photos = "<img src='<?= base_url() ?>assets/path_profile/"+dt.foto_user+"' id='foto_user' width='125' height='125'>";
            }
            $('#modal_detail #photos').html(photos);
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





