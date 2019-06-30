<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// load database
	public function __construct()
		{
			parent::__construct();
			$this->load->model('galeri_model');
		}

// menampilkan data
	public function index()
	{
		$galeri = $this->galeri_model->listing();

		$data = array( 'title'  => 'Data Galeri('.count($galeri).')',
			           'galeri'   => $galeri,
			           'isi'    => 'admin/galeri/list'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
// menambahkan data
	public function tambah()
	{		
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul Galeri','required',
				array( 'required' => '%s harus diisi'));
		$valid->set_rules('isi_galeri','Isi Galeri','required',
				array( 'required' => '%s harus diisi'));

		if($valid->run())
		{
			// setting upload
			$config['upload_path']      = './assets/upload/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 50000; //dalam kb
            $config['max_width']        = 50000; //dalam px
            $config['max_height']       = 50000; //dalam px

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')){
			// end validasi
			$data = array( 'title'  	  => 'Tambah Galeri',
						   'error_upload' => $this->upload->display_errors(),
			           	   'isi'    	  => 'admin/galeri/tambah'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// masuk database
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
			$data = array(  'id_user'		=> $this->session->userdata('id_user'),
							'judul_galeri'	=> $i->post('judul_galeri'),
							'isi_galeri'	=> $i->post('isi_galeri'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'posisi_galeri'	=> $i->post('posisi_galeri'),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->galeri_model->tambah($data);
			$this->session->set_flashdata('sukses','Galeri Telah ditambahkan');
			redirect(base_url('admin/galeri'),'refresh');
		}
	}
			// end database
			$data = array( 'title'  	  => 'Tambah Galeri',
			           	   'isi'    	  => 'admin/galeri/tambah'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}
// edit galeri
	public function edit($id_galeri)
	{
		$galeri = $this->galeri_model->detail($id_galeri);
		// validasi
		$valid  = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul Galeri','required',
				array( 'required' => '%s harus diisi'));
		$valid->set_rules('isi_galeri','Isi Galeri','required',
				array( 'required' => '%s harus diisi'));

		if($valid->run())
		{
			// kalo ga ganti gambar
			if(!empty($_FILES['gambar']['name'])){
			// setting upload
			$config['upload_path']      = './assets/upload/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 50000; //dalam kb
            $config['max_width']        = 50000; //dalam px
            $config['max_height']       = 50000; //dalam px

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')){
			// end validasi
			$data = array( 'title'  	  => 'Edit Galeri',
						   'galeri'		  => $galeri,
						   'error_upload' => $this->upload->display_errors(),
			           	   'isi'    	  => 'admin/galeri/edit'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// masuk database
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
			// hapus gambar lama jika ada yg baru
			if($galeri->gambar != ""){
			unlink('./assets/upload/img/'.$galeri->gambar);
			unlink('./assets/upload/img/thumbs/'.$galeri->gambar);
			} //end hapus gambar lama

			$data = array(  'id_galeri'		=> $id_galeri,
							 'id_user'		=> $this->session->userdata('id_user'),
							'judul_galeri'	=> $i->post('judul_galeri'),
							'isi_galeri'	=> $i->post('isi_galeri'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'posisi_galeri'	=> $i->post('posisi_galeri')
						);
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses','Galeri Telah dirubah');
			redirect(base_url('admin/galeri'),'refresh');
		}
	}else{
		//edit tanpa ganti gambar baru
		$i = $this->input;

			$data = array(  'id_galeri'		=> $id_galeri,
							 'id_user'		=> $this->session->userdata('id_user'),
							'judul_galeri'	=> $i->post('judul_galeri'),
							'isi_galeri'	=> $i->post('isi_galeri'),
							'posisi_galeri'	=> $i->post('posisi_galeri')
						);
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses','Galeri Telah dirubah');
			redirect(base_url('admin/galeri'),'refresh');
	}
}
			// end database
			$data = array( 'title'  	  => 'Edit Galeri',
						   'galeri'		  => $galeri,
			           	   'isi'    	  => 'admin/galeri/edit'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}
	// delete
	public function delete($id_galeri)
	{	
		// protek delet
		$this->check_login->check();
		$galeri = $this->galeri_model->detail($id_galeri);
		// hapus gambar
		if($galeri->gambar != ""){
			unlink('./assets/upload/img/'.$galeri->gambar);
			unlink('./assets/upload/img/thumbs/'.$galeri->gambar);
		}
		// end hapus gambar
		$data = array( 'id_galeri' => $galeri->id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah hapus');
		redirect(base_url('admin/galeri'));
	}

}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */