<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Search Here...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>

            <a class="navbar-brand" href="#" style="font-size: 15pt; margin-bottom: -5px; margin-top: -2px; margin-left: 35px;"><img width="25" src="<?= base_url().'assets/path_logo/S_Logo_WTH_SM.png' ?>" style="margin-right: 10px; margin-top: -5px;"> SIYAPDOK</a>
        </div>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
           <!--  <li><a href="mail-inbox.html" class="inbox-btn hidden-sm-down" data-close="true"><i class="zmdi zmdi-email"></i></a></li>
            <li class="dropdown menu-app hidden-sm-down"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-apps"></i> </a>
                <ul class="dropdown-menu slideDown">
                    <li class="body">
                        <ul class="menu">
                            <li><a href="blog-dashboard.html"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a></li>
                            <li><a href="contact.html"><i class="zmdi zmdi-accounts-list"></i><span>Contacts</span></a></li>
                            <li><a href="chat.html"><i class="zmdi zmdi-comment-text"></i><span>Chat</span></a></li>
                            <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>Notes</span></a></li>
                            <li><a href="javascript:void(0)"><i class="zmdi zmdi-view-column"></i><span>Taskboard</span></a></li>
                            <li><a href="events.html"><i class="zmdi zmdi-calendar-note"></i><span>Calendar</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li> -->
        </ul>

        <ul class="nav navbar-nav navbar-right">            
            <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a></li> -->
            <li class="dropdown"> 
                <a title="Notifikasi" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="zmdi zmdi-notifications"></i>
                    <?= ($dataReg == null || $dataReg == ''?'':'<div class="notify"><span class="heartbit"></span><span class="point"></span></div>') ?>
                </a>
                <ul class="dropdown-menu slideDown" style="width: 300px">
                    <li class="header">Daftar Pasien</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <?php if ($dataReg == null || $dataReg == '') { ?>
                                    <center><label style="margin-top: 50px">Daftar pasien masih kosong</label></center>
                            <?php }else{
                                foreach ($dataReg as $key) { ?>
                                <li data-toggle="modal" data-target="#modal_detail" onclick="showPasien(<?= $key->id_user ?>, '<?= date('d-m-Y', strtotime($key->tgl_lahir_user)) ?>')"> 
                                    <a href="javascript:void(0);">
                                    <div class="icon-circle l-coral" style="width: 50px; height: 50px; overflow: hidden;"> <img height="50" style="margin-left: -10px" src="<?= base_url().'assets/path_profile/'.$key->foto_user ?>"> </div>
                                    <div class="menu-info">
                                        <p>Nama Pasien:</p>
                                        <h4><?= $key->nama_user ?></h4>
                                        <p> 
                                            <i class="material-icons">access_time</i>
                                            No. Reg: <?= $key->nomor_reg ?>
                                        </p>
                                    </div>
                                    </a> 
                                </li>
                            <?php }} ?>
                        </ul>
                    </li>
                    <!-- <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li> -->
                </ul>
            </li>
            <li>
                <a title="Masuk User Pasien" href="<?= base_url().'Pasien/index' ?>" class="mega-menu" data-close="true"><i class="zmdi zmdi-account-circle"></i></a>
            </li>
            <!-- <li class=""><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li> -->
        </ul>
    </div>
</nav>

<!-- #Top Bar -->

<!-- <section> -->
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <?php  
                    $fotoUser = $this->session->userdata('foto_user');
                    $username = $this->session->userdata('username');
                    $namaUser = $this->session->userdata('nama_user');
                    $first = substr($namaUser, 0, 1);
                    $label = strtoupper($first);
                ?>
                <?php if ($fotoUser == '' || $fotoUser == null) { ?>
                    <img src="<?php echo base_url().'assets/assets/images/icon-profil/'.$label;?>.jpg" width="48" height="48" alt="User" />
                <?php }else{ ?>
                    <img src="<?php echo base_url().'assets/path_profile/'.$fotoUser;?>" width="48" height="48" alt="User" />
                <?php } ?>
            </div>
            <div class="info-container" style="width: 70%;">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b><?php echo $namaUser; ?></b>
                </div>
                <!-- <div class="email"><?=$namaUser ?></div> -->
                <div class="btn-group user-helper-dropdown" style="float: right;"> 
                    <i style="margin-top: 30px" class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                    <ul class="dropdown-menu slideUp">
                        <!-- <li><a href="profile.html"><i class="material-icons">person</i>Profile</a></li> -->

                        <!-- <li><a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Ubah_Pwd"><i class="material-icons">lock</i>Ubah Password</a></li> -->
                        <!-- <li role="separator" class="divider"></li> -->
                        <li><a href="<?php echo base_url().'Auth/logout'; ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info --> 

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php if ($id_nav==1) { echo 'active';}  ?>">
                    <a href="<?= base_url()."Dokter/index" ?>">
                        <i class="material-icons" style="float: left;">home</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">Dashboard</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==2) { echo 'active';}  ?>">
                    <a href="<?= base_url()."Dokter/dataDokter" ?>">
                        <i class="material-icons" style="float: left;">local_hospital</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">Data Dokter</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==3) { echo 'active';}  ?>">
                    <a href="<?= base_url()."Dokter/daftarPasien" ?>">
                        <i class="material-icons" style="float: left;">assignment_ind</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">Daftar Pasien</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 <a href="javascript:void(0);">Create By - HARIS UMMgl</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li> -->
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active slideRight" id="skins">
                <div class="slim_scroll">
                    <h6>Flat Color</h6>
                    <ul class="choose-skin">                   
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span> </li>                   
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span> </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>                        
                    </ul>                    
                    <h6>Multi Color</h6>
                    <ul class="choose-skin">                        
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span> </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span> </li>
                        <li data-theme="red">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>                        
                    </ul>                    
                    <h6>Gradient Color</h6>
                    <ul class="choose-skin">                    
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span> </li>
                        <li data-theme="orange"  class="active">
                            <div class="orange"></div>
                            <span>Orange</span> </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                            <span>Blush</span>
                        </li>
                    </ul>
                </div>                
            </div>
        </div>
    </aside>

    <!-- #END# Right Sidebar -->
<!-- </section> -->

<!-- Modal Detail Dokter -->
<div class="modal fade" id="modal_reg_dok" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <form name="regDok" id="regDok" method="post" action="<?= base_url().'Pasien/registrasiDokter'; ?>">
                        <!-- <input type="hidden" name="id_user" id="id_user"> -->
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Registrasi Dokter</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        Nomor SIP
                                    </div>
                                    <div class="col-md-8">
                                        <div id="judul" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" name="sip" id="sip" style="margin-bottom: -4px;" placeholder="028/162/SIP-TU/III/2003">
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
                                                   <option value="<?= $key->id_spes ?>"><?= $key->nama_spes ?></option>
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
                                    <div class="col-md-8">
                                        <div id="judul" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" onkeypress="return inputAngka(event);" maxlength="4" name="jml_pasien" id="jml_pasien" style="margin-bottom: -4px;" placeholder="50">
                                        </div>
                                    </div>
                                </div>                        
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">Daftarkan</button>
                            <!-- <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button> -->
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>


<!-- Ubah Password -->
<div class="modal fade" id="Modal_Ubah_Pwd" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="defaultModalLabel">Ubah Password</h4>
                </center>
            </div>
            <div class="modal-body">
                <form name="change-password" id="cp">
                <div class="form-group form-float">
                    <div id="oldPass" class="form-line">
                        <input type="Password" class="form-control" name="old_pass" id="old_pass" onkeyup="validPass();" required>
                        <label class="form-label">Password Lama</label>
                    </div>
                    <label id="error_oldPass" class="error" for="old_pass" style="display: block;"></label>
                </div>
                <div class="form-group form-float">
                    <div id="newPass" class="form-line">
                        <input type="Password" class="form-control" name="new_pass" id="new_pass" onkeyup="ulangPass();" required>
                        <label class="form-label">Password Baru</label>
                    </div>
                    <label id="error_newPass" class="error" for="new_pass" style="display: block;"></label>
                </div>
                <div class="form-group form-float">
                    <div id="newPass2" class="form-line">
                        <input type="Password" class="form-control" name="new_pass2" id="new_pass2" onkeyup="ulangPass();" required>
                        <label class="form-label">Ulangi Password</label>
                    </div>
                    <label id="error_newPass2" class="error" for="new_pass2" style="display: block;"></label>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_simpan" class="btn btn-link waves-effect">UBAH PASSWORD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>