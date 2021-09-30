<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
		if ($this->session->userdata('role')!= "Pasien" AND $this->session->userdata('role')!= "Dokter") {
			redirect('Auth/index');
		}
		date_default_timezone_set('Asia/Jakarta');
		$id_user = $this->session->userdata('id_user');
		$this->role = $this->session->userdata('role');

		// Data Registrasi Periksa =====================================
		$dateNow = date('Y-m-d');
		$select = '*';
		$table = array(
			'tbl_registrasi reg',
			'tbl_dokter dok',
			'tbl_user usr'
		);
		$where = "reg.id_dokter = dok.id_dokter AND dok.id_user = usr.id_user AND reg.tgl_reg = '$dateNow' AND reg.status = 'masuk' AND reg.id_user = '$id_user'";
		$order = 'DESC';
		$by = 'reg.id_reg';
		$this->dataReg = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		// =======================================================
		$this->spes = $this->MasterData->getData('tbl_spesialis')->result();
		// =======================================================
		$select = 'status';
		$table = 'tbl_dokter';
		$where = "id_user = '$id_user'";
		$this->dataStatusDok = $this->MasterData->getWhereData($select,$table,$where)->row();
		// =======================================================
		$this->load->library('pagination');
    }

	public function index($sess=''){
		$data['id_nav'] = 1;

		$foot['semuaKota'] = 'true';
		$foot['showKota'] = 'false';
		$data['provinsi'] = '';
		$data['kota'] = '';
		$data['spes'] = '';
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;

		$prov = $this->input->GET('provinsi');
		$kota = $this->input->GET('kota');
		$spes = $this->input->GET('spesialis');
		// ======================================================
		if ($kota == '' || $kota == null) {
			$select = 'id_kota';
			$where = "id_user = '$id_user'";
			$id_kota = $this->MasterData->getWhereData($select,'tbl_user',$where)->row()->id_kota;
		}else{
			$id_kota = $kota;
			$data['provinsi'] = $prov;
			$data['kota'] = $id_kota;
			$foot['showKota'] = 'true';
		}

		if ($prov == 'semua_prov') {
			$where = "usr.id_role = role.id_role AND role.role LIKE '%Dokter%' AND usr.id_user = dok.id_user AND dok.status = 'aktif'";
		}else{
			if ($kota == 'semua_kota') {
				$where = "usr.id_role = role.id_role AND role.role LIKE '%Dokter%' AND usr.id_kota IN (SELECT id_kota FROM tbl_kota WHERE id_prov = '$prov') AND usr.id_user = dok.id_user AND dok.status = 'aktif'";
			}else{
				$where = "usr.id_role = role.id_role AND role.role LIKE '%Dokter%' AND usr.id_kota = '$id_kota' AND usr.id_user = dok.id_user AND dok.status = 'aktif'";
			}
		}

		if ($spes != '' || $spes != null) {
			if ($spes == 'semua_spes') {
				$where .= " AND dok.id_spes IN (SELECT id_spes FROM tbl_spesialis) AND dok.status = 'aktif'";
			}else{
				$where .= " AND dok.id_spes = '$spes' AND dok.status = 'aktif'";
			}
			$data['spes'] = $spes;
		}else{
			$data['spes'] = 'semua_spes';
			$where .= " AND dok.id_spes IN (SELECT id_spes FROM tbl_spesialis) AND dok.status = 'aktif'";
		}
		// =========================================================
		$select = array(
			'usr.id_user'
		);
		$table = array(
			'tbl_user usr',
			'tbl_role role',
			'tbl_dokter dok'
		);
		$order = 'ASC';
		$by = 'usr.id_user';
		$user = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order);
		// ==========================================================

		$config['base_url'] = base_url().'/Pasien/index';
		$config['total_rows'] = $user->num_rows();
		$config['per_page'] = 12;
		
		$config['num_links'] = 1;
		$config['display_pages'] = TRUE;
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 3; //supaya tidak error karena base url dinamis
		$config['reuse_query_string'] = true; //supaya link pagination sesuai parameter get yang ada
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);

		if($this->uri->segment(3) == null){
			$start_index = 0;
		}else{
			$start_index = ($this->uri->segment(3)-1)*$config['per_page'];
		}
		
		$data['pages'] =  $this->pagination->create_links();

		$dateNow = date('Y-m-d');
		$select = array(
			'*',
			"(SELECT COUNT(*) FROM tbl_registrasi reg WHERE reg.id_dokter = dok.id_dokter AND reg.tgl_reg = '$dateNow') AS jml_reg"
		);
		$table = array(
			'tbl_user usr',
			'tbl_role role',
			'tbl_kota kota',
			'tbl_dokter dok'
		);
		$where .= " AND usr.id_kota = kota.id_kota";
		$order = 'ASC';
		$by = 'usr.id_user';
		// $data['user'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		$users = $this->MasterData->getWhereDataLimitIndexOrder($select,$table,$where,$start_index,$config['per_page'],$by,$order);
		$data['user'] = $users->result();

		$data['prov'] = $this->MasterData->getData('tbl_provinsi')->result();

		// $select = '*';
		// $table = array(
		// 	'tbl_registrasi reg',
		// 	'tbl_dokter dok',
		// 	'tbl_user usr'
		// );
		// $where = "reg.id_dokter = dok.id_dokter AND dok.id_user = usr.id_user AND reg.tgl_reg = '$dateNow' AND reg.status = 'masuk' AND reg.id_user = '$id_user'";
		// $order = 'DESC';
		// $by = 'reg.id_reg';
		// $data['dataReg'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();

		$data['dataReg'] = $this->dataReg;
		$data['dataSpes'] = $this->spes;
		$data['statusDok'] = $this->dataStatusDok;

		$this->load->view('Pasien/header');
		$this->load->view('Pasien/navigation', $data);
		$this->load->view('Pasien/index', $data);
		$this->load->view('Pasien/footer',$foot);
	}

	public function showKota($value=''){
		$id_prov = $this->input->POST('id_prov');

		$select = '*';
		$where = "id_prov = $id_prov";
		$data = $this->MasterData->getWhereData($select,'tbl_kota',$where)->result();

		echo json_encode($data);
	}

	public function showDetailDokter($value=''){
		$id_user = $this->input->POST('id_user');
		$id_pasien = $this->input->POST('id_pasien');

		$dateNow = date('Y-m-d');
		$select = array(
			"*",
			"(SELECT COUNT(id_reg) FROM tbl_registrasi reg WHERE reg.id_dokter = dok.id_dokter AND reg.tgl_reg = '$dateNow' AND reg.id_user = '$id_pasien') AS jml_reg"
		);
		$table = array(
			'tbl_user usr',
			'tbl_spesialis spes',
			'tbl_dokter dok',
			'tbl_kota kota'
		);
		$where = "usr.id_user = dok.id_user AND dok.id_spes = spes.id_spes AND usr.id_kota = kota.id_kota AND usr.id_user = '$id_user'";
		$dokter = $this->MasterData->getWhereData($select,$table,$where)->row();

		$id_dok = $dokter->id_dokter;
		$select = '*';
		$table = 'tbl_jadwal';
		$where = "id_dokter = '$id_dok'";
		$jadwal = $this->MasterData->getWhereData($select,$table,$where)->result();

		$dataDok = array(
			'dokter' => $dokter,
			'jadwal' => $jadwal
		);

		echo json_encode($dataDok);
	}

	public function registrasiPasien($value=''){
		$id_user = $this->session->userdata('id_user');
		$id_dokter = $this->input->POST('id_dokter');

		$select = '*';
		$table = 'tbl_jadwal';
		$where = "id_dokter = '$id_dokter'";
		$cekJdwl = $this->MasterData->getWhereData($select,$table,$where)->result();

		$timeNow = date('H:i');
		$dayNow = date('l');
		$dayName = array(
			'Ahad' => 'Sunday',
			'Senin' => 'Monday',
			'Selasa' => 'Tuesday',
			'Rabu' => 'Wednesday',
			'Kamis' => 'Thursday',
			'Jumat' => 'Friday',
			'Sabtu' => 'Saturday'
		);

		$jdwl = array();
		foreach ($cekJdwl as $key) {
			foreach ($dayName as $ind => $eng) {
				if ($key->hari == $ind) {
					$jdwl[] = array(
						'day' => $eng,
						'time' => $key->jam_tutup
					);
				}
			}
		}

		$buka = 0;
		foreach ($jdwl as $val) {
			if ($val['day'] == $dayNow) {
				if (strtotime($timeNow) <= strtotime($val['time']) - (30*60)) {
					$buka++;
				}
			}
		}

		if ($buka > 0) {
			$dateNow = date('Y-m-d');
			$select = 'nomor_reg'; // Select kode permintaan terakhir
			$by = "id_reg";
			$order = "DESC";
			$limit = "1";
			$table = 'tbl_registrasi';
			$where = "id_dokter = '$id_dokter' AND tgl_reg = '$dateNow'";
			$detail = $this->MasterData->getWhereDataLimitOrder($select,$table,$where,$limit,$by,$order);

			$reg = $detail->row();
			$date = date('dmy');
			if ($detail->num_rows() > 0) { // Check data
				$kode = substr($reg->nomor_reg, 8, 3); // Mengambil string beberapa digit
				$code = (int) $kode; // Mengubah String jadi Integer
				$code++;
				$nomorReg = 'SD'.$date.str_pad($code, 3, "0", STR_PAD_LEFT); // Kerangka Kode Otomatis
			} else {
				$nomorReg = 'SD'.$date.'001';
			}

			$data = array(
				'nomor_reg' => $nomorReg,
				'tgl_reg' => $dateNow,
				'waktu_reg' => date('H:i'),
				'id_dokter' => $id_dokter,
				'id_user' => $id_user,
				'status' => 'masuk'
			);
			$input = $this->MasterData->inputData($data,'tbl_registrasi');

			if ($input) {
				// redirect(base_url().'Pasien/index');
				echo "<script>alert('Registrasi Berhasil')</script>";
				echo "<script>history.back(-1)</script>";
			}else{
				echo "<script>alert('Registrasi Gagal')</script>";
				echo "<script>history.back(-1)</script>";
			}
		}else{
			echo '<script>alert("Registrasi Tutup!\nSilahkan lakukan lagi besok sesuai jadwal praktik dokter")</script>';
			echo "<script>history.back(-1)</script>";
		}
	}

	public function registrasiBatal($value=''){
		$id_pasien = $this->input->POST('id_pasien');
		$id_dokter = $this->input->POST('id_dokter');

		$dateNow = date('Y-m-d');
		$where = "id_dokter = '$id_dokter' AND id_user = '$id_pasien' AND tgl_reg = '$dateNow' AND status = 'masuk'";
		$batal = $this->MasterData->deleteData($where,'tbl_registrasi');

		if ($batal) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}
	// ============================================
	public function profil($sess=''){
		$data['id_nav'] = 2;

		if ($sess == '') {
			$this->session->unset_userdata('alert_profil');
		}
		// ======================================================
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;

		// $dateNow = date('Y-m-d');
		// $select = '*';
		// $table = array(
		// 	'tbl_registrasi reg',
		// 	'tbl_dokter dok',
		// 	'tbl_user usr'
		// );
		// $where = "reg.id_dokter = dok.id_dokter AND dok.id_user = usr.id_user AND reg.tgl_reg = '$dateNow' AND reg.status = 'masuk' AND reg.id_user = '$id_user'";
		// $order = 'DESC';
		// $by = 'reg.id_reg';
		// $data['dataReg'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		$data['statusDok'] = $this->dataStatusDok;
		// =======================================================
		$data['dataReg'] = $this->dataReg;
		// =======================================================
		$data['dataSpes'] = $this->spes;
		// =======================================================
		$select = '*';
		$table = array(
			'tbl_user usr',
			'tbl_kota kota'
		);
		$where = "usr.id_kota = kota.id_kota AND usr.id_user = $id_user";
		$data['dataProfil'] = $this->MasterData->getWhereData($select,$table,$where)->row();
		// =========================================================
		$data['prov'] = $this->MasterData->getData('tbl_provinsi')->result();

		$data['kota'] = $data['dataProfil']->id_kota;
		$foot['semuaKota'] = 'false';
		$foot['showKota'] = 'true';
		// =========================================================
		$this->load->view('Pasien/header');
		$this->load->view('Pasien/navigation', $data);
		$this->load->view('Pasien/profil', $data);
		$this->load->view('Pasien/footer',$foot);
	}

	public function simpanProfil($value=''){
		$input = $this->input->POST();
		$id_user = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');

		$select = '*';
		$where = "id_user = '$id_user'";
		$dataUser = $this->MasterData->getWhereData($select,'tbl_user',$where)->row();
		$dataNoHp = $dataUser->no_telp_user;
		$dataUsername = $dataUser->username;

		$files = $dataUser->foto_user;
		$config['upload_path']          = './assets/path_profile';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['overwrite']			= false;
		// $config['file_name']			= $input['nama_user'];
		// $config['space_remove']			= true;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		// $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

		// $select = 'id_role';
		// $where = "role = '$role'";
		// $id_role = $this->MasterData->getWhereData($select,'tbl_role',$where)->row()->id_role;

		$tgl_lhr = str_replace('/', '-', $input['tgl_lhr']);

		$this->load->library('upload', $config);

		if ($this->input->POST()) {
			if ($this->upload->do_upload('foto_user')){
				unlink(APPPATH.'../assets/path_profile/'.$files);
				$data_file = $this->upload->data();
				$sess['foto_user'] = $data_file['file_name'];

				if ($input['password'] == '' || $input['password'] == null) {
					$data = array(
						// 'id_role' => $id_role,
						'nama_user' => $input['nama_user'],
						'tgl_lahir_user' => date('Y-m-d', strtotime($tgl_lhr)),
						'jk_user' => $input['jk_user'],
						'almt_user' => $input['almt_user'],
						'id_kota' => $input['kota'],
						'no_telp_user' => $input['no_hp'],
						'username' => $input['username'],
						'foto_user' => $data_file['file_name']
					);
				}else{
					$data = array(
						// 'id_role' => $id_role,
						'nama_user' => $input['nama_user'],
						'tgl_lahir_user' => date('Y-m-d', strtotime($tgl_lhr)),
						'jk_user' => $input['jk_user'],
						'almt_user' => $input['almt_user'],
						'id_kota' => $input['kota'],
						'no_telp_user' => $input['no_hp'],
						'username' => $input['username'],
						'foto_user' => $data_file['file_name'],
						'password' => md5($input['password'])
					);
				}
				
			}else{
				if ($input['password'] == '' || $input['password'] == null) {
					$data = array(
						// 'id_role' => $id_role,
						'nama_user' => $input['nama_user'],
						'tgl_lahir_user' => date('Y-m-d', strtotime($tgl_lhr)),
						'jk_user' => $input['jk_user'],
						'almt_user' => $input['almt_user'],
						'id_kota' => $input['kota'],
						'no_telp_user' => $input['no_hp'],
						'username' => $input['username']
					);
				}else{
					$data = array(
						// 'id_role' => $id_role,
						'nama_user' => $input['nama_user'],
						'tgl_lahir_user' => date('Y-m-d', strtotime($tgl_lhr)),
						'jk_user' => $input['jk_user'],
						'almt_user' => $input['almt_user'],
						'id_kota' => $input['kota'],
						'no_telp_user' => $input['no_hp'],
						'username' => $input['username'],
						'password' => md5($input['password'])
					);
				}
			}

			$where = "id_user = '$id_user'";
			$update_user = $this->MasterData->editData($where,$data,'tbl_user');

			if ($update_user) {
				$sess['nama_user'] = $input['nama_user'];
				$sess['username'] = $input['username'];

				$sess['alert_profil'] = '<div class="alert alert-success alert-dismissible" role="alert">
			                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <b>Berhasil!!</b> Data profil berhasil diperbarui
			                              </div>';
				$this->session->set_userdata($sess);
				redirect(base_url().'Pasien/profil/true');
			}else{
				$sess['alert_profil'] = '<div class="alert alert-danger alert-dismissible" role="alert">
			                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <b>Gagal!!</b> Data profil gagal diperbarui
			                              </div>';
				$this->session->set_userdata($sess);
				redirect(base_url().'Pasien/profil/true');
			}
		}
	}
	// =============================================
	public function dataMedik($sess=''){
		$data['id_nav'] = 3;

		if ($sess == '') {
			$this->session->unset_userdata('alert_rekam');
		}
		// ======================================================
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;

		$data['statusDok'] = $this->dataStatusDok;
		// =======================================================
		$data['dataReg'] = $this->dataReg;
		// =======================================================
		$data['dataSpes'] = $this->spes;
		// =======================================================
		$select = '*';
		$table = 'tbl_rekammedik rm';
		$where = "rm.id_user = '$id_user'";
		$data['dataRekam'] = $this->MasterData->getWhereData($select,$table,$where)->row();

		// var_dump($data['dataReg']);exit();
		// =========================================================
		$this->load->view('Pasien/header');
		$this->load->view('Pasien/navigation', $data);
		$this->load->view('Pasien/data_medik', $data);
		$this->load->view('Pasien/footer');
	}

	public function simpanRekam($value=''){
		$input = $this->input->POST();
		$id_user = $this->session->userdata('id_user');

		if ($input['jantung'] == '' || $input['jantung'] == null) {
			$input['jantung'] = 'Tidak';
		}

		if ($input['diabetes'] == '' || $input['diabetes'] == null) {
			$input['diabetes'] = 'Tidak';
		}

		if ($input['haemophilia'] == '' || $input['haemophilia'] == null) {
			$input['haemophilia'] = 'Tidak';
		}

		if ($input['hepatitis'] == '' || $input['hepatitis'] == null) {
			$input['hepatitis'] = 'Tidak';
		}

		$data = array(
			'id_user' => $id_user,
			'gol_darah' => $input['gol_darah'],
			'tensi' => $input['tensi'],
			'jantung' => $input['jantung'],
			'diabetes' => $input['diabetes'],
			'haemophilia' => $input['haemophilia'],
			'hepatitis' => $input['hepatitis'],
			'alergi_obat' => $input['alergi_obat'],
			'alergi_makanan' => $input['alergi_makanan'],
			'lain' => $input['lain']
		);

		$select = 'COUNT(*) as jml';
		$where = "id_user = '$id_user'";
		$cek = $this->MasterData->getWhereData($select,'tbl_rekammedik',$where)->row()->jml;

		if ($cek == 0) {
			$simpan_rekam = $this->MasterData->inputData($data,'tbl_rekammedik');
		}else{
			$where = "id_user = '$id_user'";
			$simpan_rekam = $this->MasterData->editData($where,$data,'tbl_rekammedik');
		}

		if ($simpan_rekam) {
			$sess['alert_rekam'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b>Berhasil!!</b> Data rekam medik berhasil disimpan.
                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Pasien/dataMedik/true');
		}else{
			$sess['alert_rekam'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b>Gagal!!</b> Data rekam medik gagal disimpan.
                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Pasien/dataMedik/true');
		}
	}
	// ==============================================
	public function historiPeriksa($sess=''){
		$data['id_nav'] = 4;

		if ($sess == '') {
			$this->session->unset_userdata('alert_histori');
		}
		// ======================================================
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;

		$data['statusDok'] = $this->dataStatusDok;
		// =======================================================
		$data['dataReg'] = $this->dataReg;
		// =======================================================
		$data['dataSpes'] = $this->spes;
		// =======================================================
		$select = array(
			'*',
			'(SELECT nama_user FROM tbl_user usr WHERE usr.id_user = dok.id_user) AS nama_dok'
		);
		$table = array(
			'tbl_periksa prk',
			'tbl_registrasi reg',
			'tbl_dokter dok'
		);
		$where = "prk.id_reg = reg.id_reg AND reg.id_dokter = dok.id_dokter AND reg.id_user = '$id_user' AND reg.status = 'selesai'";
		$order = 'DESC';
		$by = 'prk.id_periksa';
		$data['dataPeriksa'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		$this->load->view('Pasien/header');
		$this->load->view('Pasien/navigation', $data);
		$this->load->view('Pasien/histori_periksa', $data);
		$this->load->view('Pasien/footer');
	}
	// ==============================================
	public function registrasiDokter($value=''){
		$input = $this->input->POST();

		$id_user = $this->session->userdata('id_user');
		// $data['id_user'] = $id_user;

		// $data['dataReg'] = $this->dataReg;
		// ==========================================

		$select = 'id_user';
		$where = "id_user = '$id_user'";
		$cekDok = $this->MasterData->getWhereData($select,'tbl_dokter',$where)->num_rows();

		if ($cekDok > 0) {

			$where = "id_user = '$id_user'";
			$hapus_dokter = $this->MasterData->deleteData($where,'tbl_dokter');

		}

		$data = array(
			'id_user' => $id_user,
			'id_spes' => $input['id_spes'],
			'sip_dokter' => $input['sip'],
			'no_str' => $input['str'],
			'jml_pasien' => $input['jml_pasien'],
			'status' => 'ditinjau'
		);
		$input = $this->MasterData->inputData($data,'tbl_dokter');

		if ($input) {
			$select = 'id_role';
			$where = "role like '%Dokter%'";
			$id_role = $this->MasterData->getWhereData($select,'tbl_role',$where)->row()->id_role;

			$data = array(
				'id_role' => $id_role
			);
			$where = "id_user = '$id_user'";
			$update = $this->MasterData->editData($where,$data,'tbl_user');

			if ($update) {
				$sess_data['role'] = 'Dokter';
				$this->session->set_userdata($sess_data);

				echo "<script>alert('Registrasi berhasil, data akan ditinjau oleh Admin')</script>";
				echo "<script>history.back(-1)</script>";
				// redirect(base_url().'Dokter/index');
			}else{
				echo "<script>alert('Registrasi gagal')</script>";
				echo "<script>history.back(-1)</script>";
			}
		}else{
			echo "<script>alert('Registrasi gagal')</script>";
			echo "<script>history.back(-1)</script>";
		}
	}

	public function changePassword(){
		$id = $this->input->POST('id');
		$pass = md5($this->input->POST('newPass'));
		// var_dump($pass, $id);

		$data = array('password'=>$pass);
		$where = "id_user='$id'";
		$edit = $this->MasterData->editData($where,$data,'users');
		if ($edit) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function validPassword(){
		$id = $this->input->POST('id');
		$pass = md5($this->input->POST('pass'));

		$select = 'password';
		$where = "id_user='$id' AND password='$pass'";
		$data = $this->MasterData->getWhereData($select,'users',$where);
		$count = $data->num_rows();
		if ($count>0) {
			echo "Valid";
		}else{
			echo "No Valid";
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user');
		session_destroy();
		redirect('Auth');
	}
}
