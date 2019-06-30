<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// tampilkan data
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user');
		$query = $this->db->get();

		return $query->result();
	}
	// detail user
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();

		return $query->row(); //menampilkan single data
	}
	// login user
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'	=> $username,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_user');
		$query = $this->db->get();

		return $query->row(); //menampilkan single data
	}
	// tambah data ke database
	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}
	// edit user
	public function edit($data)
	{
		
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}
	// delete user
	public function delete($data)
	{
		
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */