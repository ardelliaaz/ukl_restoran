<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function cari_menu()
	{
		$data_cart = $this->db->where('masakan.kode_masakan', $this->input->post('kode_masakan'))
							  ->get('masakan')
							  ->row();
		if($data_cart != NULL){

			//cek stok
			if($data_cart->stok > 0){
				$cart_array = array(
								'chart_id'	=> $this->session->userdata('username'),
								'id_masakan'=> $data_cart->id_masakan
							);						
				$this->db->insert('cart',$cart_array);

				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function get_data_masakan_by_id($id_chart)
	{
		return $this->db->where('id_masakan', $id_chart)
						->get('masakan')
						->row();
	}

	public function get_cart()
	{
		return $this->db->where('cart.chart_id', $this->session->userdata('username'))
					    ->join('masakan', 'masakan.id_masakan = cart.id_masakan')
					    ->get('cart')
					    ->result();
	}

	public function hapus_item_cart()
	{
		$this->db->where('id_cart', $this->input->post('hapus_id_cart'))
				 ->delete('cart');

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah_jumlah_cart()
	{
		$data = array(
				'jumlah' => $this->input->post('jumlah')
			);

		//cek stok awal dulu untuk memastikan stok lebih dari jumlah yang dibeli
		$stok_awal = $this->get_data_masakan_by_id($this->input->post('id_masakan'))->stok;
		if($stok_awal >= $this->input->post('jumlah')){
			$this->db->where('id_cart', $this->input->post('id_cart'))
					 ->update('cart', $data);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_total_belanja()
	{
		return $this->db->select('SUM(masakan.harga*cart.jumlah) as total')
						->where('cart.chart_id', $this->session->userdata('username'))
						->join('masakan', 'masakan.id_masakan = cart.id_masakan')
						->get('cart')
						->row()->total;
	}

	public function get_pelanggan()
	{
		return $this->db->join('pelanggan', 'pelanggan.id_pelanggan = order.id_pelanggan')
					    ->get('order')
					    ->result();
	}

	public function get_user()
	{
		return $this->db->join('user', 'user.id_user = order.id_user')
					    ->get('order')
					    ->result();
	}

	public function tambah_transaksi()
	{
		$data_transaksi = array(
				'id_user'		=> $this->session->userdata('username'),
				'id_pelanggan'	=> $this->input->post('id_pelanggan'),
				'no_meja'	=> $this->input->post('no_meja'),
				'keterangan'	=> $this->input->post('keterangan'),
				'status_order'	=> $this->input->post('status_detail_order')
			);
		$this->db->insert('order', $data_transaksi);
		$last_insert_id = $this->db->insert_id();
		//insert detil transksi
		for($i = 0; $i < count($this->get_cart()); $i++)
		{
			$data_detail_order = array(
				'id_order'   	=> $last_insert_id,
				'id_masakan'	=> $this->input->post('id_masakan')[$i],
				'jumlah'		=> $this->input->post('jumlah')[$i],
				'keterangan'	=> $this->input->post('keterangan'),
				'status_detail_order' => $this->input->post('status_detail_order')
			);

			//memasukan ke tabel detil transaksi
			$this->db->insert('detail_order', $data_detail_order);

			//mengurangi stok buku
			$stok_awal = $this->get_data_masakan_by_id($this->input->post('id_masakan')[$i])->stok;
			$stok_akhir = $stok_awal-$this->input->post('jumlah')[$i];
			$stok = array('stok' => $stok_akhir);
			$this->db->where('id_masakan', $this->input->post('id_masakan')[$i])
					 ->update('masakan', $stok);

		}


		//mengkosongkan cart berdasarkan kasir yang melakukan transaksi
		$this->db->where('chart_id', $this->session->userdata('username'))
				 ->delete('cart');

		return TRUE;

	}

	public function get_riwayat_transaksi()
	{
		return $this->db->select('order.id_order, order.id_pelanggan, order.no_meja, order.keterangan, order.status_order, order.tanggal, order.total_bayar, (SELECT SUM(detail_order.jumlah*masakan.harga) FROM detail_order JOIN masakan ON masakan.id_masakan = detail_order.id_masakan WHERE id_order = order.id_order ) as total')
						->join('detail_order','detail_order.id_order = order.id_order')
						->join('masakan','masakan.id_masakan = detail_order.id_masakan')
						->group_by('id_order')
						->get('order')
						->result();
	}

	public function get_transaksi_by_id($id_cart)
	{
		return $this->db->select('masakan.nama_masakan, masakan.status_masakan, masakan.kode_masakan, masakan.harga, detail_order.jumlah')
						->where('id_order', $id_cart)
						->join('masakan','masakan.id_masakan = detail_order.id_masakan')
						->get('detail_order')
						->result();
	}



}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */	