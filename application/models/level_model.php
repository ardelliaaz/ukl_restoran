<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class level_model extends CI_Model {

public function get_level()
{
    return $this->db->get('level')
                    ->result();
}

// public function get_kategori()
// {
//     return $this->db->get('kategori')
//                     ->result();
// }

public function get_data_level_by_id($id)
{
    return $this->db->where('id_level', $id)
                    ->get('level')
                    ->row();
}

public function tambah()
{
    $data = array(
        'id_level'     => $this->input->post('id_level'),
        'nama_level'   => $this->input->post('nama_level')
    );
    $this->db->insert('level', $data);

    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }    
}

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
}

public function hapus()
{
    $this->db->where('id_level', $this->input->post('hapus_id_level'))
             ->delete('level');
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }       
}


}

/* End of file kategori_model.php */


?>