<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('berita_model');
}

	public function read($slug_berita)
	{
		$content= $this->berita_model->listing();
		$berita = $this->berita_model->read($slug_berita);
		$listing= $this->berita_model->home();

		$data = array( 'id_berita' => $berita->id_berita,
					   'title' 	   => $berita->judul_berita,
					   'deskripsi' => $berita->judul_berita,
					   'berita'    => $berita,
					   'listing'   => $listing,
					   'content'   => $content,
					   'isi'       => 'berita/read'
					 );
		$this->load->view('layout/wrapper_berita', $data, FALSE);
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */