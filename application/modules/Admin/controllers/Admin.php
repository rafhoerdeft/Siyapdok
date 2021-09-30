<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
		if ($this->session->userdata('role')!= "Admin") {
			redirect('Auth');
		}
		date_default_timezone_set('Asia/Jakarta');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index(){
		$data['id_nav'] = 1;

		$thn = $this->input->GET('tahun');
		if ($thn == '') {
			$thn = date('Y');
		}
		// JUMLAH USER APLIKASI 
		$select = 'count(usr.id_user) jml_user';
		$table = array(
			'tbl_user usr',
			'tbl_role role'
		);
		$where = "usr.id_role = role.id_role AND role like '%Pasien%'";
		$data['user_pelapor'] = $this->MasterData->getWhereData($select,$table,$where)->row()->jml_user;

		$where = "usr.id_role = role.id_role AND role like '%Dokter%'";
		$data['user_petugas'] = $this->MasterData->getWhereData($select,$table,$where)->row()->jml_user;

		$where = "usr.id_role = role.id_role AND role like '%Admin%'";
		$data['user_admin'] = $this->MasterData->getWhereData($select,$table,$where)->row()->jml_user;

		$data['total_user'] = $data['user_pelapor'] + $data['user_petugas'] + $data['user_admin'];

		$this->load->view('Admin/header');
		$this->load->view('Admin/navigation', $data);
		$this->load->view('Admin/dashboard', $data);
		$this->load->view('Admin/footer');
	}

	public function showKota($value=''){
		$id_prov = $this->input->POST('id_prov');

		$select = '*';
		$where = "id_prov = $id_prov";
		$data = $this->MasterData->getWhereData($select,'tbl_kota',$where)->result();

		echo json_encode($data);
	}

	// =================================================

	public function dataUser($sess=''){
		$data['id_nav'] = 2;

		if ($sess == '') {
			$this->session->unset_userdata('alert_user');
		}
		// ======================================================
		$data['role'] = $this->MasterData->getData('tbl_role')->result();

		$select = array(
			'*'
		);
		$table = array(
			'tbl_user usr',
			'tbl_role role',
			'tbl_kota kota'
		);
		$where = "usr.id_role = role.id_role AND usr.id_kota = kota.id_kota";
		$order = 'DESC';
		$by = 'usr.id_user';
		$data['dataUser'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		// =======================================================
		$data['prov'] = $this->MasterData->getData('tbl_provinsi')->result();
		// =======================================================
		$this->load->view('Admin/header');
		$this->load->view('Admin/navigation', $data);
		$this->load->view('Admin/data_user', $data);
		$this->load->view('Admin/footer');
	}

	public function simpanUser($value=''){
		$input = $this->input->POST();

		$select = "COUNT(*) AS jml";
		$table = 'tbl_user';
		$where = "no_telp_user = '$input[no_hp]'";
		$cekNom = $this->MasterData->getWhereData($select,$table,$where)->row()->jml;

		if ($cekNom == 0) {
			$select = "COUNT(*) AS jml";
			$table = 'tbl_user';
			$where = "username = '$input[username]'";
			$cekUser = $this->MasterData->getWhereData($select,$table,$where)->row()->jml;

			if ($cekUser == 0) {
				$select = 'id_role';
				$where = "role like '%Pasien%'";
				$id_role = $this->MasterData->getWhereData($select,'tbl_role',$where)->row()->id_role;

				$tgl_lhr = str_replace('/', '-', $input['tgl_lhr']);

				$data = array(
					'id_role' => $id_role,
					'nama_user' => $input['nama_user'],
					'tgl_lahir_user' => date('Y-m-d', strtotime($tgl_lhr)),
					'jk_user' => $input['jk_user'],
					'almt_user' => $input['almt_user'],
					'id_kota' => $input['kota'],
					'no_telp_user' => $input['no_hp'],
					'username' => $input['username'],
					'password' => md5($input['password'])
				);

				// var_dump($data);
				$input = $this->MasterData->inputData($data,'tbl_user');

				if ($input) {
					$sess['alert_user'] = '<div class="alert alert-success alert-dismissible" role="alert">
		                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                <b>Success!!</b> Data user berhasil ditambahkan.
		                              </div>';
					$this->session->set_userdata($sess);
					redirect(base_url().'Admin/dataUser/true');
				}else{
					$sess['alert_user'] = '<div class="alert alert-danger alert-dismissible" role="alert">
		                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                <b>Tambah user gagal!!</b> Silahkan coba lagi.
		                              </div>';
					$this->session->set_userdata($sess);
					redirect(base_url().'Admin/dataUser/true');
				}
			}else{
				$sess['alert_user'] = '<div class="alert alert-danger alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <b>Username sudah terdaftar!!</b> Gunakan username lain.
	                              </div>'; 
				$this->session->set_userdata($sess);
				redirect(base_url().'Admin/dataUser/true');
			}
		}else{
			$sess['alert_user'] = '<div class="alert alert-danger alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <b>Nomor HP sudah terdaftar!!</b> Silahkan ganti nomor HP lain.
	                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Admin/dataUser/true');
		}
	}

	public function updateUser($value=''){
		$input = $this->input->POST();
		$id_user = $input['id_user'];

		$select = '*';
		$where = "id_user = '$id_user'";
		$dataUser = $this->MasterData->getWhereData($select,'tbl_user',$where)->row();
		$dataNoHp = $dataUser->no_telp_user;
		$dataUsername = $dataUser->username;

		$tgl_lhr = str_replace('/', '-', $input['tgl_lhr']);

		if ($this->input->POST()) {
			if ($input['password'] == '' || $input['password'] == null) {
				$data = array(
					'id_role' => $input['role_user'],
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
					'id_role' => $input['role_user'],
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
			

			$where = "id_user = '$id_user'";
			$update_user = $this->MasterData->editData($where,$data,'tbl_user');

			if ($update_user) {
				$sess['alert_profil'] = '<div class="alert alert-success alert-dismissible" role="alert">
			                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <b>Berhasil!!</b> Data profil berhasil diperbarui
			                              </div>';
				$this->session->set_userdata($sess);
				redirect(base_url().'Admin/dataUser/true');
			}else{
				$sess['alert_profil'] = '<div class="alert alert-danger alert-dismissible" role="alert">
			                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <b>Gagal!!</b> Data profil gagal diperbarui
			                              </div>';
				$this->session->set_userdata($sess);
				redirect(base_url().'Admin/dataUser/true');
			}
		}
	}

	public function hapusUser($value=''){
		$id_user = $this->input->POST('id_user');

		$where = "id_user = '$id_user'";
		$hapus_user = $this->MasterData->deleteData($where,'tbl_user');

		if ($hapus_user) {
			echo 'Success';
		}else{
			echo 'Gagal';
		}
	}

	public function showDetailUser($value=''){
		$id_user = $this->input->POST('id_user');

		$select = array(
			"*"
		);
		$table = array(
			'tbl_kota kota',
			'tbl_user usr'
		);
		// $where = "usr.id_kota = kota.id_kota AND usr.id_user = rm.id_user AND usr.id_user = '$id_user'";

		// $table = 'tbl_user usr';
		$join = 'tbl_rekammedik rm';
		$on = 'usr.id_user = rm.id_user';
		$method = 'left';
		$where = "usr.id_kota = kota.id_kota AND usr.id_user = '$id_user'";
		$by = 'usr.id_user';
		$order ='ASC';
		$user = $this->MasterData->getWhereJoin2Data($select,$table,$join,$on,$method,$where,$by,$order)->row();

		echo json_encode($user);
	}

	// ==============================================
	public function rekamMedik($id=''){
		$data['id_nav'] = 2;
		// ======================================================
		$id_user = $this->session->userdata('id_user');
		$data['id_user'] = $id_user;
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
		$this->load->view('Admin/header');
		$this->load->view('Admin/navigation', $data);
		$this->load->view('Admin/rekam_medik', $data);
		$this->load->view('Admin/footer');
	}
	// ==============================================

	public function dataDokter($sess=''){
		$data['id_nav'] = 4;

		if ($sess == '') {
			$this->session->unset_userdata('alert_user');
		}
		// ======================================================
		$data['role'] = $this->MasterData->getData('tbl_role')->result();

		$select = array(
			'*'
		);
		$table = array(
			'tbl_dokter dok',
			'tbl_user usr',
			'tbl_role role',
			'tbl_kota kota'
		);
		$where = "dok.id_user = usr.id_user AND usr.id_role = role.id_role AND usr.id_kota = kota.id_kota";
		$order = 'DESC';
		$by = 'dok.id_dokter';
		$data['dataDok'] = $this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		// =======================================================
		$data['prov'] = $this->MasterData->getData('tbl_provinsi')->result();
		// =======================================================
		$this->load->view('Admin/header');
		$this->load->view('Admin/navigation', $data);
		$this->load->view('Admin/data_dokter', $data);
		$this->load->view('Admin/footer');
	}

	public function ubahStatusDokter($value=''){
		$id_user = $this->input->POST('id_user');
		$status = $this->input->POST('status');

		$data = array('status' => $status);
		$where = "id_user = '$id_user'";
		$update_user = $this->MasterData->editData($where,$data,'tbl_dokter');

		if ($update_user) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}
	// ==================================================

	public function dataSpes($sess=''){
		$data['id_nav'] = 3;

		if ($sess == '') {
			$this->session->unset_userdata('alert_spes');
		}
		// ======================================================
		$data['dataSpes'] = $this->MasterData->getDataDesc('tbl_spesialis', 'id_spes')->result();
		// =======================================================
		$this->load->view('Admin/header');
		$this->load->view('Admin/navigation', $data);
		$this->load->view('Admin/data_spes', $data);
		$this->load->view('Admin/footer');
	}

	public function simpanSpes($value=''){
		$nama_spes = $this->input->POST('spes');

		$data = array(
			'nama_spes' => $nama_spes
		);
		$input_spes = $this->MasterData->inputData($data,'tbl_spesialis');

		if ($input_spes) {
			$sess['alert_spes'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b>Success!!</b> Data spesialis berhasil ditambahkan.
                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Admin/dataSpes/true');
		}else{
			$sess['alert_spes'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b>Tambah spesialis gagal!!</b> Silahkan coba lagi.
                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Admin/dataSpes/true');
		}
	}

	public function updateSpes($value=''){
		$id_spes = $this->input->POST('id_spes');
		$nama_spes = $this->input->POST('spes');

		$data = array(
			'nama_spes' => $nama_spes
		);
		$where = "id_spes = '$id_spes'";
		$update_spes = $this->MasterData->editData($where,$data,'tbl_spesialis');

		if ($update_spes) {
			$sess['alert_spes'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b>Success!!</b> Data spesialis berhasil diperbarui.
                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Admin/dataSpes/true');
		}else{
			$sess['alert_spes'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <b>Update spesialis gagal!!</b> Silahkan coba lagi.
                              </div>';
			$this->session->set_userdata($sess);
			redirect(base_url().'Admin/dataSpes/true');
		}
	}

	public function hapusSpes($value=''){
		$id_spes = $this->input->POST('id_spes');

		$where = "id_spes = '$id_spes'";
		$hapus_spes = $this->MasterData->deleteData($where,'tbl_spesialis');

		if ($hapus_spes) {
			echo 'Success';
		}else{
			echo 'Gagal';
		}
	}

	public function changePassword(){
		$id = $this->input->POST('id');
		$pass = md5($this->input->POST('newPass'));
		// var_dump($pass, $id);

		$data = array('password'=>$pass);
		$where = "id_user='$id'";
		$edit = $this->MasterData->editData($where,$data,'tbl_user');
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
		$data = $this->MasterData->getWhereData($select,'tbl_user',$where);
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
		redirect('login');
	}
}
