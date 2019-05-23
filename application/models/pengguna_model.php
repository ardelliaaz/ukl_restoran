<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function get_pengguna(){
		return $this->db->join('level','level.id_level=user.id_level')
						->get('user')
						->result();
	}

	public function get_level(){
		return $this->db->get('level')
						->result();
	}

	public function get_data_pengguna_by_id($id)
	{
		return $this->db->where('id_user', $id)
						->get('user')
						->row();
	}

	public function tambah()
	{
		$data = array(
				// 'id_user' 		=> $this->input->post('id'),
				'username'		=> $this->input->post('username'),
				'password'		=> md5($this->input->post('password')),
				'nama_user' 	=> $this->input->post('nama_user'),
				'id_level'		=> $this->input->post('id_level')
			);

		$this->db->insert('user', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'username'	=> $this->input->post('ubah_username'),
				'password'	=> ($this->input->post('ubah_password')),
				'nama_user' => $this->input->post('ubah_nama_user'),
				'id_level'	=> $this->input->post('ubah_id_level')
			);

		$this->db->where('id_user', $this->input->post('ubah_id_user'))
				 ->update('user', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_user', $this->input->post('hapus_id_user'))
				 ->delete('user');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file pengguna_model.php */
/* Location: ./application/models/pengguna_model.php */