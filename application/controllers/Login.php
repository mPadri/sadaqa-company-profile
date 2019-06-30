<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
	}
	// load login
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required|trim|min_length[4]|max_length[32]',
				array( 'required' => '%s harus diisi',
					'min_length'  => '%s minimal 4 karakter',
					'max_lenght'  => '%s maximal 32 karakter'));

		$valid->set_rules('password','Password','required|trim|min_length[2]',
				array( 'required' => '%s harus diisi',
					'min_length'  => '%s minimal 2 karakter'));

		if($valid->run())
		{	
			$username 		=$this->input->post('username');
			$password 		=$this->input->post('password');
			// compare ke database
			$check_login 	=$this->user_model->login($username,$password); 
			// jika data cocok buat session
			if(count($check_login)==1)
			{
				$this->session->set_userdata('id_user',$check_login->id_user);
				$this->session->set_userdata('username',$check_login->username);
				$this->session->set_userdata('nama',$check_login->nama);
				$this->session->set_userdata('akses_level',$check_login->akses_level);

				$this->session->set_flashdata('sukses', 'anda berhasil login');
				redirect(base_url('admin/dasbor'),'refresh');
			}else{
				// klo tidak cocok bloik ke login
				$this->session->set_flashdata('sukses', 'Username atau Password yang anda masukkan salah');
				redirect(base_url('login'));
			}
		}
		// end validasi
		$data = array( 'title' => 'Login Administrator' );
		$this->load->view('admin/login/list', $data, FALSE);
	}

	// logout
	public function logout()
	{
		$this->check_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */