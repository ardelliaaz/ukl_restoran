<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_Model {

public function get_makanan()
{
    return $this->db->get('masakan')
                    ->result();
}

// public function get_kategori()
// {
//     return $this->db->get('kategori')
//                     ->result();
// }

public function get_data_menu_by_id($id)
{
    return $this->db->where('id_masakan', $id)
                    ->get('masakan')
                    ->row();
}

public function tambah()
{
    $data = array(
        'id_masakan'     => $this->input->post('id_masakan'),
        'kode_masakan'   => $this->input->post('kode_masakan'),
        'nama_masakan'   => $this->input->post('nama_masakan'),
        'harga'          => $this->input->post('harga'),
        'status_masakan' => $this->input->post('status_masakan'),
        // 'foto'         => $foto['file_name'],
        // 'kode_masakan' => $this->input->post('kode_masakan'),
        'stok'         => $this->input->post('stok')
        // 'id_kat'       => $this->input->post('kategori')
    );
    $this->db->insert('masakan', $data);

    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }    
}

public function ubah()
{
    $data = array(
        'kode_masakan'   => $this->input->post('ubah_kode_masakan'),
        'nama_masakan'   => $this->input->post('ubah_nama_masakan'),
        'harga'          => $this->input->post('ubah_harga'),
        'status_masakan' => $this->input->post('ubah_status_masakan'),
        'stok' => $this->input->post('ubah_stok')
    );

    $this->db->where('id_masakan', $this->input->post('ubah_id_masakan'))
             ->update('masakan', $data);
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }        
}

public function hapus()
{
    $this->db->where('id_masakan', $this->input->post('hapus_id_masakan'))
             ->delete('masakan');
             
    if ($this->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }       
}


}

/* End of file kategori_model.php */


?>