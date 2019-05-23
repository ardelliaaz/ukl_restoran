<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi_model extends CI_Model {

	public function get_pembayaran()
	{
		return $this->db->select('SUM(masakan.harga*cart.jumlah) as total')
						->where('cart.id_cart', $this->session->userdata('username'))
						->join('masakan', 'masakan.id_masakan = cart.id_masakan')
						->get('cart')
						->row()->total;
	// 	return $this->db->select('*,pemaybaran.status as status_bayar')
	// 			->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan')
	// 			->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
	// 			->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
	// 			->order_by('id_pembayaran','desc')
	// 			->where('pembayaran.status','pending')
	// 			->get('pembayaran')->result();
	}
	public function get_verifikasi($id_pembayaran,$id_tagihan,$status)
	{
		$data_bayar=array(
			'status'=>$status,
			'id_admin'=>$this->session->userdata('id_admin')
		);
		$veri=$this->db->where('id_pembayaran',$id_pembayaran)
				->update('pembayaran',$data_bayar);
		if($veri){
			$data_tagihan=array(
			'status'=>$status
		);
			return $this->db->where('id_tagihan',$id_tagihan)
				->update('tagihan',$data_tagihan);
		}
	}

}

/* End of file Verification_model.php */
/* Location: ./application/models/Verification_model.php */