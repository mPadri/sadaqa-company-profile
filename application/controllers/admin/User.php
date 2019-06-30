<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// load database
	public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}

// menampilkan data
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array( 'title'  => 'Data user Administrator('.count($user).')',
			           'user'   => $user,
			           'isi'    => 'admin/user/list'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
// menambahkan data
	public function tambah()
	{
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array( 'required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array( 'required' => '%s harus diisi',
					'valid_email' => 'format %s tidak valid'));

		$valid->set_rules('username','Username','required|trim|min_length[4]|max_length[32]|is_unique[user.username]',
				array( 'required' => '%s harus diisi',
					'min_length'  => '%s minimal 4 karakter',
					'max_lenght'  => '%s maximal 32 karakter',
					'is_unique'	  => '%s '.$this->input->post('username').' sudah digunakan'));

		$valid->set_rules('password','Password','required|trim|min_length[2]',
				array( 'required' => '%s harus diisi',
					'min_length'  => '%s minimal 2 karakter'));

		if($valid->run() === FALSE)
		{
			// end validasi
			$data = array( 'title'  => 'Tambah user Administrator',
			           		'isi'    => 'admin/user/tambah'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// masuk database
		}else{

			$i = $this->input;
			$data = array(  'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level')
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses','Data Telah ditambahkan');
			redirect(base_url('admin/user'),'refresh');
		}
			// end database
		
	}
// edit user
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array( 'required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array( 'required' => '%s harus diisi',
					'valid_email' => 'format %s tidak valid'));

		$valid->set_rules('password','Password','required|trim|min_length[2]',
				array( 'required' => '%s harus diisi',
					'min_length'  => '%s minimal 2 karakter'));

		if($valid->run() === FALSE)
		{
			// end validasi
			$data = array( 'title'  => 'Edit user Administrator: '.$user->nama,
							'user'	=> $user,
			           		'isi'   => 'admin/user/edit'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// masuk database
		}else{

			$i = $this->input;
			$data = array(  'id_user'		=> $id_user,
							'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level')
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','Data Telah dirubah');
			redirect(base_url('admin/user'),'refresh');
		}
			// Data telah masuk database		
	}
	// delete
	public function delete($id_user)
	{	
		// protek delet
		$this->check_login->check();

		$user = $this->user_model->detail($id_user);
		$data = array( 'id_user' => $user->id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah hapus');
		redirect(base_url('admin/user'));
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */