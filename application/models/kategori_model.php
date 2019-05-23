<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {

public function get_kategori()
{
    return $this->db->get('kategori')
                    ->result();
}

public function get_data_kategori_by_id()
{
    return $this->db->where('id_kat', $id)
                    ->get('kategori')
                    ->row();
}

public function tambah()
{
    $data = array(
        'id_kat' => $this->input->post('id_kat'),
        'nama_kategori' => $this->input->post('nama_kategori')

    );

    $this->db->insert('kategori', $data);
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }    
}

public function ubah()
{
    $data = array(
        'nama_kategori'  => $this->input->post('ubah_nama_kategori')
    );

    $this->db->where('id_kat', $this->input->post('ubah_id'))
             ->update('kategori', $data);
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }        
}

public function hapus()
{
    $this->db->where('id_kat', $this->input->post('hapus_id'))
             ->delete('kategori');
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }       
}


}

/* End of file kategori_model.php */


?>