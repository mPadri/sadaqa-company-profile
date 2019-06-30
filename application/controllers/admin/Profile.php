<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

// updet profile
	public function index()
	{
		$id_user	= $this->session->userdata('id_user');
		$user 		= $this->user_model->detail($id_user);

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
			$data = array( 'title'  => 'Update Profile '.$user->nama,
							'user'	=> $user,
			           		'isi'   => 'admin/profile/list'
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
			$this->session->set_flashdata('sukses','profile Telah dirubah');
			redirect(base_url('admin/profile'),'refresh');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */