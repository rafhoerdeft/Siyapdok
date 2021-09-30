<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
    }

	public function index(){
		$this->session->sess_destroy();
		$this->load->view('Login');
	}

	public function cek_login() {
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$pass = md5($password);

		$where = "username = '$username' AND password = '$pass' OR no_telp_user = '$username' AND password = '$pass'";
		$hasil = $this->MasterData->getWhereDataAll('tbl_user',$where);
		// var_dump($hasil);
		if ($hasil->num_rows() == 1) {
			$id_role = $hasil->row()->id_role;

			$where = "id_role = $id_role";
			$dataRole = $this->MasterData->getWhereDataAll('tbl_role',$where)->row();
			$role = $dataRole->role;
			
			foreach ($hasil->result() as $users) {
				$sess_data['id_user'] = $hasil->row()->id_user;
				$sess_data['nama_user'] = $hasil->row()->nama_user;
				$sess_data['foto_user'] = $hasil->row()->foto_user;
				$sess_data['username'] = $hasil->row()->username;
				$sess_data['role'] = $role;
				$this->session->set_userdata($sess_data);
			}
			
			echo $role;
		}
		else {
			echo "Gagal";
		}
	}

	public function register($value=''){
		$this->session->sess_destroy();

		$data['prov'] = $this->MasterData->getData('tbl_provinsi')->result();

		$this->load->view('Register',$data);
	}

	public function showKota($value=''){
		$id_prov = $this->input->POST('id_prov');

		$select = '*';
		$where = "id_prov = $id_prov";
		$data = $this->MasterData->getWhereData($select,'tbl_kota',$where)->result();

		echo json_encode($data);
	}

	public function proses_register($value=''){
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
					echo "Sukses";
				}else{
					echo "Registrasi gagal";
				}
			}else{
				echo "Username sudah terdaftar";
			}
		}else{
			echo "Nomor telpon/HP sudah terdaftar";
		}
	}

	public function logout(){
		// Hapus semua data pada session
		$this->session->sess_destroy();

		// redirect ke halaman login	
		redirect('Auth/index');
	}

}
