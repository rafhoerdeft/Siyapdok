<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');

		$this->id_user = $this->session->userdata('id_user');
		$id_user = $this->id_user;

		$select = 'status';
		$table = 'tbl_dokter';
		$where = "id_user = '$id_user'";
		$statusDok = $this->MasterData->getWhereData($select,$table,$where);

		$status = 'tidak aktif';
		if ($statusDok->num_rows() > 0 ) {
			$status = $statusDok->row()->status;
		}

		if ($this->session->userdata('role')!= "Dokter") {
			redirect('Auth/index');
		}else{
			if ($status != 'aktif') {
				redirect('Auth/index');
			}
		}

		date_default_timezone_set('Asia/Jakarta');

		// Data Registrasi Periksa =====================================
		$dateNow = date('Y-m-d');
		$select = '*';
		$table = array(
			'tbl_registrasi reg',
			'tbl_dokter dok',
			'tbl_user usr'
		);
		$where = "reg.id_dokter = dok.id_dokter AND reg.id_user = usr.id_user AND reg.tgl_reg = '$dateNow' AND reg.status = 'masuk' AND dok.id_user = '$id_user'";
		$order = 'DESC';
		$by = 'reg.id_reg';
		$this->dataReg = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		// =======================================================
		$this->spes = $this->MasterData->getData('tbl_spesialis')->result();
    }

	public function index(){
		$data['id_nav'] = 1;
		$id_user = $this->id_user;
		// $thn = $this->input->GET('tahun');
		// if ($thn == '') {
		// 	$thn = date('Y');
		// }

		// JUMLAH LAPORAN MASUK
		$select = 'count(reg.id_reg) pasien';
		$table = array(
			'tbl_registrasi reg',
			'tbl_dokter dok'
		);
		$where = "date(reg.tgl_reg) = date(now()) AND reg.id_dokter = dok.id_dokter AND dok.id_user = '$id_user'";
		$data['lap_harian'] = $this->MasterData->getWhereData($select,$table,$where)->row()->pasien;

		$where = "YEARWEEK(reg.tgl_reg) = YEARWEEK(NOW()) AND reg.id_dokter = dok.id_dokter AND dok.id_user = '$id_user'";
		$data['lap_mingguan'] = $this->MasterData->getWhereData($select,$table,$where)->row()->pasien;

		$where = "MONTH(reg.tgl_reg) = MONTH(now()) AND YEAR(reg.tgl_reg) = YEAR(now()) AND reg.id_dokter = dok.id_dokter AND dok.id_user = '$id_user'";
		$data['lap_bulanan'] = $this->MasterData->getWhereData($select,$table,$where)->row()->pasien;

		$where = "YEAR(reg.tgl_reg) = YEAR(now()) AND reg.id_dokter = dok.id_dokter AND dok.id_user = '$id_user'";
		$data['lap_tahunan'] = $this->MasterData->getWhereData($select,$table,$where)->row()->pasien;

		$data['dataReg'] = $this->dataReg;

		$this->load->view('Dokter/header');
		$this->load->view('Dokter/navigation', $data);
		$this->load->view('Dokter/dashboard', $data);
		$this->load->view('Dokter/footer');
	}
	// ==========================================
	public function dataDokter($sess=''){
		$data['id_nav'] = 2;
		$id_user = $this->id_user;

		if ($sess == '') {
			$this->session->unset_userdata('alert_dok');
		}

		$where = "id_user = '$id_user'";
		$data['dataDok'] = $this->MasterData->getWhereData('*','tbl_dokter',$where)->row();
		// =================================================
		$select = 'id_dokter';
		$id_dok = $this->MasterData->getWhereData($select,'tbl_dokter',$where)->row()->id_dokter;

		$where = "id_dokter = '$id_dok'";
		$data['dataJdwl'] = $this->MasterData->getWhereData('*','tbl_jadwal',$where)->result();
		// =================================================
		$data['dataReg'] = $this->dataReg;
		// =================================================
		$data['dataSpes'] = $this->spes;
		// =================================================
		$this->load->view('Dokter/header');
		$this->load->view('Dokter/navigation', $data);
		$this->load->view('Dokter/data_dokter', $data);
		$this->load->view('Dokter/footer');
	}

	public function simpanDataDok($value=''){
		$input = $this->input->POST();

		$id_user = $this->session->userdata('id_user');
		// ==========================================
		$data = array(
			'id_spes' => $input['id_spes'],
			'sip_dokter' => $input['sip'],
			'no_str' => $input['str'],
			'jml_pasien' => $input['jml_pasien']
		);
		$where = "id_user = '$id_user'";
		$update_dok = $this->MasterData->editData($where,$data,'tbl_dokter');

		$select = 'id_dokter';
		$id_dok = $this->MasterData->getWhereData($select,'tbl_dokter',$where)->row()->id_dokter; 

		$Senin = $this->input->POST('Senin');
		$Selasa = $this->input->POST('Selasa');
		$Rabu = $this->input->POST('Rabu');
		$Kamis = $this->input->POST('Kamis');
		$Jumat = $this->input->POST('Jumat');
		$Sabtu = $this->input->POST('Sabtu');
		$Ahad = $this->input->POST('Ahad');

		$hari = array();
		if ($Senin != '' || $Senin != null) {
			$hari[] = array(
				'hari' => $Senin,
				'jam_buka' => $input['jam_buka_senin'],
				'jam_tutup' => $input['jam_tutup_senin']
			);
		}else{
			$where = "hari = 'Senin' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($Selasa != '' || $Selasa != null) {
			$hari[] = array(
				'hari' => $Selasa,
				'jam_buka' => $input['jam_buka_selasa'],
				'jam_tutup' => $input['jam_tutup_selasa']
			);
		}else{
			$where = "hari = 'Selasa' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($Rabu != '' || $Rabu != null) {
			$hari[] = array(
				'hari' => $Rabu,
				'jam_buka' => $input['jam_buka_rabu'],
				'jam_tutup' => $input['jam_tutup_rabu']
			);
		}else{
			$where = "hari = 'Rabu' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($Kamis != '' || $Kamis != null) {
			$hari[] = array(
				'hari' => $Kamis,
				'jam_buka' => $input['jam_buka_kamis'],
				'jam_tutup' => $input['jam_tutup_kamis']
			);
		}else{
			$where = "hari = 'Kamis' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($Jumat != '' || $Jumat != null) {
			$hari[] = array(
				'hari' => $Jumat,
				'jam_buka' => $input['jam_buka_jumat'],
				'jam_tutup' => $input['jam_tutup_jumat']
			);
		}else{
			$where = "hari = 'Jumat' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($Sabtu != '' || $Sabtu != null) {
			$hari[] = array(
				'hari' => $Sabtu,
				'jam_buka' => $input['jam_buka_sabtu'],
				'jam_tutup' => $input['jam_tutup_sabtu']
			);
		}else{
			$where = "hari = 'Sabtu' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($Ahad != '' || $Ahad != null) {
			$hari[] = array(
				'hari' => $Ahad,
				'jam_buka' => $input['jam_buka_ahad'],
				'jam_tutup' => $input['jam_tutup_ahad']
			);
		}else{
			$where = "hari = 'Ahad' AND id_dokter = '$id_dok'";
			$table = 'tbl_jadwal';
			$hapusJdwl = $this->MasterData->deleteData($where,$table);
		}

		if ($update_dok) {
			foreach ($hari as $key) {
				$where = "hari = '$key[hari]' AND id_dokter = '$id_dok'";
				$table = 'tbl_jadwal';
				$cekJdwl = $this->MasterData->getWhereData('*',$table,$where)->num_rows();

				$data = array(
					'id_dokter' => $id_dok,
					'hari' => $key['hari'],
					'jam_buka' => $key['jam_buka'],
					'jam_tutup' => $key['jam_tutup']
				);

				if ($cekJdwl == 0) {
					$simpan_jadwal = $this->MasterData->inputData($data,$table);
				}else{
					$simpan_jadwal = $this->MasterData->editData($where,$data,$table);
				}
			}

			$sess['alert_dok'] = '<div class="alert alert-success alert-dismissible" role="alert">
		                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                <b>Berhasil!!</b> Data dokter berhasil diperbarui
		                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Dokter/dataDokter/true');
		}else{
			$sess['alert_dok'] = '<div class="alert alert-danger alert-dismissible" role="alert">
		                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                <b>Gagal!!</b> Data dokter gagal diperbarui
		                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Dokter/dataDokter/true');
		}
	}
	// ==========================================
	public function daftarPasien($sess=''){
		$data['id_nav'] = 3;
		$id_user = $this->id_user;

		if ($sess == '') {
			$this->session->unset_userdata('alert_pasien');
		}

		// $dateNow = date('Y-m-d');
		$select = array(
			'*',
			'(SELECT COUNT(id_periksa) FROM tbl_periksa prk WHERE prk.id_reg = reg.id_reg) jml_periksa'
		);
		$table = array(
			'tbl_registrasi reg',
			'tbl_user usr',
			'tbl_kota kota'
		);
		$where = "reg.id_user = usr.id_user AND usr.id_kota = kota.id_kota AND reg.id_dokter IN (SELECT id_dokter FROM tbl_dokter WHERE id_user = '$id_user')";
		$by = 'reg.id_reg';
		$order = 'DESC';
		$data['dataPasien'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		// var_dump($data['dataPasien']);exit();
		// =================================================
		$data['dataReg'] = $this->dataReg;
		// =================================================
		$data['dataSpes'] = $this->spes;
		// =================================================
		$this->load->view('Dokter/header');
		$this->load->view('Dokter/navigation', $data);
		$this->load->view('Dokter/daftar_pasien', $data);
		$this->load->view('Dokter/footer');
	}

	public function simpanPeriksa($value=''){
		$input = $this->input->POST();

		$data = array(
			'id_reg' => $input['id_reg'],
			'tgl_periksa' => date('Y-m-d'),
			'keluhan' => $input['keluhan'],
			'diagnosa' => $input['diagnosa'],
			'tindakan' => $input['tindakan'],
			'resep' => $input['resep']
		);

		$select = 'COUNT(id_periksa) jml_periksa';
		$where = "id_reg = '$input[id_reg]'";
		$cek = $this->MasterData->getWhereData($select,'tbl_periksa',$where)->row()->jml_periksa;

		if ($cek > 0) {
			$simpan_periksa = $this->MasterData->editData($where,$data,'tbl_periksa');
		}else{
			$simpan_periksa = $this->MasterData->inputData($data,'tbl_periksa');
		}

		if ($simpan_periksa) {
			$data = array(
				'status' => 'selesai'
			);
			$where = "id_reg = '$input[id_reg]'";
			$update_reg = $this->MasterData->editData($where,$data,'tbl_registrasi');

			if ($update_reg) {
				$sess['alert_pasien'] = '<div class="alert alert-success alert-dismissible" role="alert">
			                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <b>Berhasil!!</b> Data periksa pasien berhasil disimpan
			                              </div>';
				$this->session->set_userdata($sess);
				redirect(base_url().'Dokter/daftarPasien/true');
			}else{
				$sess['alert_pasien'] = '<div class="alert alert-danger alert-dismissible" role="alert">
			                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <b>Gagal!!</b> Data periksa pasien gagal disimpan
			                              </div>';
				$this->session->set_userdata($sess);
				redirect(base_url().'Dokter/daftarPasien/true');
			}
			
		}else{
			$sess['alert_pasien'] = '<div class="alert alert-danger alert-dismissible" role="alert">
		                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                <b>Gagal!!</b> Data periksa pasien gagal disimpan
		                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Dokter/daftarPasien/true');
		}
	}

	public function showDetailPeriksa($value=''){
		$id_reg = $this->input->POST('id_reg');

		$select = '*';
		$where = "id_reg = '$id_reg'";
		$data = $this->MasterData->getWhereData($select,'tbl_periksa',$where)->row();

		echo json_encode($data);
	}

	public function showDetailPasien($value=''){
		$id_pasien = $this->input->POST('id_pasien');

		$select = array(
			"*"
		);
		$table = array(
			'tbl_kota kota',
			'tbl_user usr'
		);
		// $where = "usr.id_kota = kota.id_kota AND usr.id_user = rm.id_user AND usr.id_user = '$id_pasien'";

		// $table = 'tbl_user usr';
		$join = 'tbl_rekammedik rm';
		$on = 'usr.id_user = rm.id_user';
		$method = 'left';
		$where = "usr.id_kota = kota.id_kota AND usr.id_user = '$id_pasien'";
		$by = 'usr.id_user';
		$order ='ASC';
		$pasien = $this->MasterData->getWhereJoin2Data($select,$table,$join,$on,$method,$where,$by,$order)->row();

		echo json_encode($pasien);
	}

	// ==============================================
	public function rekamMedik($id=''){
		$data['id_nav'] = 3;
		// ======================================================
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;

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
		$where = "prk.id_reg = reg.id_reg AND reg.id_dokter = dok.id_dokter AND reg.id_user = '$id' AND reg.status = 'selesai'";
		$order = 'DESC';
		$by = 'prk.id_periksa';
		$dataPeriksa = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order);
		$data['dataPeriksa'] = $dataPeriksa->result();
		// =========================================================
		$select = 'nama_user';
		$where = "id_user = '$id'";
		$dataPasien = $this->MasterData->getWhereData($select,'tbl_user',$where);
		$data['namaPasien'] = $dataPasien->row()->nama_user;
		// =========================================================
		$this->load->view('Dokter/header');
		$this->load->view('Dokter/navigation', $data);
		$this->load->view('Dokter/rekam_medik', $data);
		$this->load->view('Dokter/footer');
	}
	// ==============================================

	// public function cetakLap($id=''){
	// 	$data['laporan'] = $this->db->query("SELECT *, (SELECT usr.nama FROM users usr WHERE lap.id_user = usr.id_user) AS nama_user, (SELECT usr.no_hp FROM users usr WHERE lap.id_user = usr.id_user) AS no_hp FROM lapor lap LEFT JOIN laporan_damkar ld ON lap.id_lapor = ld.id_lapor WHERE lap.id_lapor = '$id'")->row();

	// 	$data['photo']  = $this->db->query("SELECT foto_kejadian FROM log_lapor WHERE id_lapor = '$id'")->result();
	// 	// var_dump($data);exit();
		
	// 	$this->load->library('pdf');
	// 	$this->load->view('Dokter/cetak_laporan',$data);
	// }

	// public function cetakLap2($id=''){
	// 	$data['laporan'] = $this->db->query("SELECT *, (SELECT usr.nama FROM users usr WHERE lap.id_user = usr.id_user) AS nama_user, (SELECT usr.no_hp FROM users usr WHERE lap.id_user = usr.id_user) AS no_hp FROM lapor lap LEFT JOIN laporan_damkar ld ON lap.id_lapor = ld.id_lapor WHERE lap.id_lapor = '$id'")->row();

	// 	$data['photo']  = $this->db->query("SELECT foto_kejadian FROM log_lapor WHERE id_lapor = '$id'")->result();
	// 	// var_dump($data);exit();
		
	// 	$this->load->library('pdf');
	// 	$this->load->view('Dokter/cetak_laporan2',$data);
	// }

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
		$this->session->unset_userdata('status');
		session_destroy();
		redirect('Auth');
	}
}
