<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_order_model extends CI_Model {

public function ubah()
{
    $data = array(
        'nama_level'   => $this->input->post('ubah_nama_level')
    );

    $this->db->where('id_level', $this->input->post('ubah_id_level'))
             ->update('level', $data);
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }        
    public function ubah()
	{
		$data = array(
				'tanggal'	=> $this->input->post('tanggal'),
				'total'	=> ($this->input->post('total')),
				'keterangan' => $this->input->post('keterangan'),
		
			);

		$this->db->where('id_detail_order', $this->input->post('id_detail_order'))
				 ->update('detail_order', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
