<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	// load database
	public function __construct()
		{
			parent::__construct();
			$this->load->model('berita_model');
		}

// menampilkan data
	public function index()
	{
		$berita = $this->berita_model->listing();

		$data = array( 'title'  => 'Data Berita('.count($berita).')',
			           'berita'   => $berita,
			           'isi'    => 'admin/berita/list'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
// menambahkan data
	public function tambah()
	{		
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
				array( 'required' => '%s harus diisi'));
		$valid->set_rules('isi_berita','Isi Berita','required',
				array( 'required' => '%s harus diisi'));

		if($valid->run())
		{
			// setting upload
			$config['upload_path']      = './assets/upload/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']         = 10000; //dalam kb
            $config['max_width']        = 50000; //dalam px
            $config['max_height']       = 50000; //dalam px

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')){
			// end validasi
			$data = array( 'title'  	  => 'Tambah Berita',
						   'error_upload' => $this->upload->display_errors(),
			           	   'isi'    	  => 'admin/berita/tambah'
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
/////////////
			$i = $this->input;
			$data = array(  'id_user'		=> $this->session->userdata('id_user'),
							'slug_berita'	=> url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'judul_berita'	=> $i->post('judul_berita'),
							'isi_berita'	=> $i->post('isi_berita'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'status_berita'	=> $i->post('status_berita'),
							'jenis_berita'	=> $i->post('jenis_berita'),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses','Berita Telah ditambahkan');
			redirect(base_url('admin/berita'),'refresh');
		}
	}
			// end database
			$data = array( 'title'  	  => 'Tambah Berita',
			           	   'isi'    	  => 'admin/berita/tambah'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}
// edit berita
	public function edit($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);
		// validasi
		$valid  = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
				array( 'required' => '%s harus diisi'));
		$valid->set_rules('isi_berita','Isi Berita','required',
				array( 'required' => '%s harus diisi'));

		if($valid->run())
		{
			// kalo ga ganti gambar
			if(!empty($_FILES['gambar']['name'])){
			// setting upload
			$config['upload_path']      = './assets/upload/img/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 5000; //dalam kb
            $config['max_width']        = 5000; //dalam px
            $config['max_height']       = 5000; //dalam px

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')){
			// end validasi
			$data = array( 'title'  	  => 'Edit Berita',
						   'berita'		  => $berita,
						   'error_upload' => $this->upload->display_errors(),
			           	   'isi'    	  => 'admin/berita/edit'
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
			if($berita->gambar != ""){
			unlink('./assets/upload/img/'.$berita->gambar);
			unlink('./assets/upload/img/thumbs/'.$berita->gambar);
			} //end hapus gambar lama

			$data = array(  'id_berita'		=> $id_berita,
							'id_user'		=> $this->session->userdata('id_user'),
							'slug_berita'	=> url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'judul_berita'	=> $i->post('judul_berita'),
							'isi_berita'	=> $i->post('isi_berita'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'status_berita'	=> $i->post('status_berita'),
							'jenis_berita'	=> $i->post('jenis_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses','Berita Telah dirubah');
			redirect(base_url('admin/berita'),'refresh');
		}
	}else{
		//edit tanpa ganti gambar baru
		$i = $this->input;

			$data = array(  'id_berita'		=> $id_berita,
							'id_user'		=> $this->session->userdata('id_user'),
							'slug_berita'	=> url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'judul_berita'	=> $i->post('judul_berita'),
							'isi_berita'	=> $i->post('isi_berita'),
							'status_berita'	=> $i->post('status_berita'),
							'jenis_berita'	=> $i->post('jenis_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses','Berita Telah dirubah');
			redirect(base_url('admin/berita'),'refresh');
	}
}
			// end database
			$data = array( 'title'  	  => 'Edit Berita',
						   'berita'		  => $berita,
			           	   'isi'    	  => 'admin/berita/edit'
	                 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}
	// delete
	public function delete($id_berita)
	{	
		// protek delet
		$this->check_login->check();
		$berita = $this->berita_model->detail($id_berita);
		// hapus gambar
		if($berita->gambar != ""){
			unlink('./assets/upload/img/'.$berita->gambar);
			unlink('./assets/upload/img/thumbs/'.$berita->gambar);
		}
		// end hapus gambar
		$data = array( 'id_berita' => $berita->id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah hapus');
		redirect(base_url('admin/berita'));
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */