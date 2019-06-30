<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// tampilkan data
	public function listing()
	{
		$this->db->select('gallery.*,user.nama');
		$this->db->from('gallery');
		// join tabel database
		$this->db->join('user','user.id_user = gallery.id_user','LEFT');
		// end join
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();

		return $query->result();
	}

	// slider
	public function slider()
	{
		$this->db->select('gallery.*,user.nama');
		$this->db->from('gallery');
		// join tabel database
		$this->db->join('user','user.id_user = gallery.id_user','LEFT');
		// end join
		$this->db->where('posisi_galeri','Homepage');
		$this->db->limit(3);
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();

		return $query->result();
	}

	// galeri
	public function galeri($limit,$start)
	{
		$this->db->select('gallery.*,user.nama');
		$this->db->from('gallery');
		// join tabel database
		$this->db->join('user','user.id_user = gallery.id_user','LEFT');
		// end join
		$this->db->where(array('posisi_galeri'=>'Galeri'));
		$this->db->limit($limit,$start);
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();

		return $query->result();
	}

	// total paginasi galeri
	public function total()
	{
		$this->db->select('gallery.*,user.nama');
		$this->db->from('gallery');
		// join tabel database
		$this->db->join('user','user.id_user = gallery.id_user','LEFT');
		// end join
		$this->db->where('posisi_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();

		return $query->result();
	}
	// detail galeri
	public function detail($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where('id_galeri', $id_galeri);
		$this->db->order_by('id_galeri');
		$query = $this->db->get();

		return $query->row(); //menampilkan single data
	}
	
	// tambah data ke database
	public function tambah($data)
	{
		$this->db->insert('gallery', $data);
	}
	// edit galeri
	public function edit($data)
	{
		
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->update('gallery', $data);
	}
	// delete galeri
	public function delete($data)
	{
		
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->delete('gallery', $data);
	}
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */