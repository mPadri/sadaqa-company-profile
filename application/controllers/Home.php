<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('galeri_model');
	}

// home page
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$slider 	 = $this->galeri_model->slider();
		$berita 	 = $this->berita_model->home();
		// paginasi
		$this->load->library('pagination');

		$config['base_url']    = base_url('home/index/');
		$config['total_rows']  = count($this->galeri_model->total());
		$config['per_page']    = 6;
		$config['uri_segment'] = 3;
			// limit dan start
			$limit = $config['per_page'];
			$start = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;

		$this->pagination->initialize($config);

		$galeri = $this->galeri_model->galeri($limit,$start);
		// end paginasi


		$data = array( 'title' 	   => $konfigurasi->nama_web,
					   'deskripsi' => $konfigurasi->deskripsi,
					   'slider'    => $slider,
					   'galeri'    => $galeri,
					   'paginasi'  => $this->pagination->create_links(),
					   'berita'    => $berita,
					   'konfigurasi'=> $konfigurasi,
					   'isi' 	   => 'home/list'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */