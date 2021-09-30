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
                <a title="Pendaftaran" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="zmdi zmdi-flag"></i>
                    <?= ($dataReg == null || $dataReg == ''?'':'<div class="notify"><span class="heartbit"></span><span class="point"></span></div>') ?>
                </a>
                <ul class="dropdown-menu slideDown" style="width: 300px">
                    <li class="header">Daftar Periksa</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <?php if ($dataReg == null || $dataReg == '') { ?>
                                    <center><label style="margin-top: 50px">Daftar periksa masih kosong</label></center>
                            <?php }else{
                                foreach ($dataReg as $key) { ?>
                                <li data-toggle="modal" data-target="#modal_detail" onclick="showDokter(<?= $key->id_user ?>, <?= $key->id_dokter ?>,<?= $key->jml_pasien ?>, '', <?= $id_user ?>)"> 
                                    <a href="javascript:void(0);">
                                    <div class="icon-circle l-coral" style="width: 50px; height: 50px; overflow: hidden;"> <img height="50" style="margin-left: -10px" src="<?= base_url().'assets/path_profile/'.$key->foto_user ?>"> </div>
                                    <div class="menu-info">
                                        <!-- <div class="row">
                                            <div class="col-lg-10 col-md-10 col-sm-10"> -->
                                                <p>Periksa di:</p>
                                                <h4><?= $key->nama_user ?></h4>
                                                <p> 
                                                    <!-- <i class="material-icons">access_time</i> -->
                                                    No. Reg: <?= $key->nomor_reg ?>
                                                </p>
                                            <!-- </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2"> -->
                                                <!-- <button type="button" class="btn btn-sm btn-primary waves-effect" style="font-size: 8pt; padding: -15px; margin-left: -20px">Batal</button> -->
                                            <!-- </div>
                                        </div> -->
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
                <?php 
                    $role = $this->session->userdata('role'); 
                    if ($role == 'Dokter') {
                        if ($statusDok->status == 'aktif') {
                ?>
                            <a title="Masuk Dokter" href="<?= base_url().'Dokter/index' ?>" class="mega-menu" data-close="true"><i class="zmdi zmdi-local-hospital"></i></a>
                <?php 
                        }else{
                ?>
                            <a title="Masuk Dokter" href="javascript:void(0);" data-toggle="modal" data-target="#modal_status_reg" class="mega-menu" data-close="true"><i class="zmdi zmdi-local-hospital"></i></a>
                <?php
                        }   
                    }else{ ?>
                        <a title="Masuk Dokter" href="javascript:void(0);" data-toggle="modal" data-target="#modal_reg_dok" class="mega-menu" data-close="true"><i class="zmdi zmdi-local-hospital"></i></a>
                <?php } ?>
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
                    <a href="<?= base_url()."Pasien/index" ?>">
                        <i class="material-icons" style="float: left;">view_list</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">List Dokter</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==2) { echo 'active';}  ?>">
                    <a href="<?= base_url()."Pasien/profil" ?>">
                        <i class="material-icons" style="float: left;">person</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">Data Profil (Lengkapi)</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==3) { echo 'active';}  ?>">
                    <a href="<?= base_url()."Pasien/dataMedik" ?>">
                        <i class="material-icons" style="float: left;">assignment_ind</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">Data Medik</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==4) { echo 'active';}  ?>">
                    <a href="<?= base_url()."Pasien/historiPeriksa" ?>">
                        <i class="material-icons" style="float: left;">history</i>
                        <span style="float: left; margin-top: 5px; margin-left: 20px">Histori Periksa</span>
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
           <!--  <div role="tabpanel" class="tab-pane pullUp" id="chat">
                <div class="right_chat slim_scroll">
                    <div class="search">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search..." required autofocus>
                            </div>
                        </div>
                    </div>
                    <h6>Recent</h6>
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia</span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson</span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella</span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John</span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander</span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                    <h6>Contacts</h6>
                    <ul class="list-unstyled">
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar10.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar7.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar8.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar9.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?//=base_url().'assets/' ?>assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane slideLeft" id="settings">
                <div class="settings slim_scroll">
                    <p class="text-left">General Settings</p>
                    <ul class="setting-list">
                        <li> <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p class="text-left">System Settings</p>
                    <ul class="setting-list">
                        <li> <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p class="text-left">Account Settings</p>
                    <ul class="setting-list">
                        <li> <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->
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
                                        Nomor STR
                                    </div>
                                    <div class="col-md-8">
                                        <div id="judul" class="form-line" style="margin-top: -5px;">
                                            <input required type="text" class="form-control" name="str" id="str" style="margin-bottom: -4px;" placeholder="3311234234232367" maxlength="20">
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

<!-- Modal Status Registrasi Dokter -->
<div class="modal fade" id="modal_status_reg" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <!-- <form name="regDok" id="regDok" method="post" action="<?//= base_url().'Pasien/registrasiDokter'; ?>"> -->
                        <!-- <input type="hidden" name="id_user" id="id_user"> -->
                        <div class="modal-header">
                            <center>
                                <h4 class="modal-title" id="defaultModalLabel">Status Registrasi Dokter</h4>
                            </center>
                        </div>
                        <div class="modal-body" id="print-page">

                            <h7 class="modal-title" id="defaultModalLabel">Status: <b><?= ($statusDok != null || $statusDok != ''?($statusDok->status == 'ditinjau'?'Sedang ditinjau oleh Admin':'<font color="red">Registrasi Dokter ditolak Admin</font><br>Pastikan nomor SIP atau nomor STR Anda sudah benar dan terdaftar secara resmi.'):'') ?></b></h7>

                        </div>
                        <div class="modal-footer">
                            <button <?= ($statusDok->status == 'ditolak'?'':'hidden') ?> type="submit" id="btn_simpan" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modal_reg_dok" data-close="true" data-dismiss="modal">Daftar Ulang</button>
                            <!-- <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button> -->
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                        </div>
                    <!-- </form> -->
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