<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('konfigurasi_model');
		}
// konfigurasi umum
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// validasi
		$this->form_validation->set_rules('nama_web','Nama Perusahaan','required',
				array( 'required'	=> '%s harus di isi'));

		if($this->form_validation->run()===FALSE)
		{

		$data =array( 'title'		=> 'Konfigurasi Website',
					  'konfigurasi' => $konfigurasi,
					  'isi'			=> 'admin/konfigurasi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;
			$data = array(  
							'id_konfigurasi' => $konfigurasi->id_konfigurasi,
							'id_user'	=> $this->session->userdata('id_user'),
							'nama_web'	=> $i->post('nama_web'),
							'email'		=> $i->post('email'),
							'telepon'	=> $i->post('telepon'),
							'alamat'	=> $i->post('alamat'),
							'website'	=> $i->post('website'),
							'deskripsi'	=> $i->post('deskripsi'),
							'map'		=> $i->post('map'),
							'facebook'	=> $i->post('facebook'),
							'instagram'	=> $i->post('instagram')
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Konfigurasi Telah dirubah');
			redirect(base_url('admin/konfigurasi'),'refresh');
		}
	}

	// konfigurasi logo
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// validasi
		$this->form_validation->set_rules('id_konfigurasi','Nama Perusahaan','required',
				array( 'required'	=> '%s harus di isi'));

		if($this->form_validation->run())
		{
		// setting upload
		$config['upload_path']      = './assets/upload/img/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 5000; //dalam kb
        $config['max_width']        = 5000; //dalam px
        $config['max_height']       = 5000; //dalam px

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo')){

		$data =array( 'title'		=> 'Konfigurasi Logo Website',
					  'konfigurasi' => $konfigurasi,
					  'error'		=> $this->upload->display_errors(),
					  'isi'			=> 'admin/konfigurasi/logo'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			// proses manipulasi gambar
			$upload_data			 = array('uploads'=>$this->upload->data());
			// gambar asli dsimpan di assets/upload/img
			// copian gambar asli size kecil dsmpan di assets/upload/img/thumbs
			$config['image_library'] = 'gd2';
			$config['source_image']  = './assets/upload/img/'.$upload_data['uploads']['file_name'];
			$config['new_image']  = './assets/upload/img/thumbs/'.$upload_data['uploads']['file_name'];
			$config['thumb_marker']  = '';
			$config['create_thumb']  = TRUE;
			$config['maintain_ratio']= TRUE;
			$config['width']         = 200;
			$config['height']        = 200;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			$data = array(  
							'id_konfigurasi' => $konfigurasi->id_konfigurasi,
							'id_user'		=> $this->session->userdata('id_user'),
							'logo'			=> $upload_data['uploads']['file_name']
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Konfigurasi Telah dirubah');
			redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}
	}
			$data =array( 	  'title'		=> 'Konfigurasi Logo Website',
							  'konfigurasi' => $konfigurasi,
							  'isi'			=> 'admin/konfigurasi/logo'
							);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// konfigurasi icon
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// validasi
		$this->form_validation->set_rules('id_konfigurasi','Icon Perusahaan','required',
				array( 'required'	=> '%s harus di isi'));

		if($this->form_validation->run())
		{
		// setting upload
		$config['upload_path']      = './assets/upload/img/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 5000; //dalam kb
        $config['max_width']        = 5000; //dalam px
        $config['max_height']       = 5000; //dalam px

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('icon')){

		$data =array( 'title'		=> 'Konfigurasi Icon Website',
					  'konfigurasi' => $konfigurasi,
					  'error'		=>$this->upload->display_errors(),
					  'isi'			=> 'admin/konfigurasi/icon'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			// proses manipulasi gambar
			$upload_data			 = array('uploads'=>$this->upload->data());
			// gambar asli dsimpan di assets/upload/img
			// copian gambar asli size kecil dsmpan di assets/upload/img/thumbs
			$config['image_library'] = 'gd2';
			$config['source_image']  = './assets/upload/img/'.$upload_data['uploads']['file_name'];
			$config['new_image']  = './assets/upload/img/thumbs/'.$upload_data['uploads']['file_name'];
			$config['thumb_marker']  = '';
			$config['create_thumb']  = TRUE;
			$config['maintain_ratio']= TRUE;
			$config['width']         = 200;
			$config['height']        = 200;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			$data = array(  
							'id_konfigurasi' => $konfigurasi->id_konfigurasi,
							'id_user'		=> $this->session->userdata('id_user'),
							'icon'			=> $upload_data['uploads']['file_name']
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Konfigurasi Telah dirubah');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}
	}
			$data =array( 'title'			=> 'Konfigurasi Icon Website',
							  'konfigurasi' => $konfigurasi,
							  'isi'			=> 'admin/konfigurasi/icon'
							);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */