<?php 
class CartModel extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->database();
		}

		public function insert_order($data)
		{	
			$this->db->insert('order_tbl', $data);
			$id = $this->db->insert_id();
			return (isset($id)) ? $id : FALSE;
		}

		public function insert_order_detail($data)
		{
			$this->db->insert('detail_order_tbl', $data);
			
		}

		public function getqty($dt){
			$qty_old="select jumlah_seller from seller_tbl where product_id=". $dt;
			$qtyold=$this->db->query($qty_old);
			//var_dump($qtyold->result_array()); exit();
			$row=$qtyold->result_array();
			//var_dump($qtyold->row());exit;
			foreach ($row as $data) {
				return $data['jumlah_seller'];
			}
			
		}

		public function gtqty($pt){
			$qty_lama="select stock from product_tbl where product_id=". $pt;
			$qtylama=$this->db->query($qty_lama);
			//var_dump($qtyold->result_array()); exit();
			$row=$qtylama->result_array();
			//var_dump($qtyold->row());exit;
			foreach ($row as $data) {
				return $data['stock'];
			}
			
		}

		// function getQtySession($id){
		// 	$sql="select stock from product_tbl where product_id=" . $id;
		// 	$st=$this->db->query($sql);
		// 	$row=$st->row();
		// 	//foreach ($row as $data) {
		// 		return $row->stock;
		// 	//}
		// }

		function lihat(){
			$sql="select * from order_tbl inner join customer_tbl on customer_tbl.customer_id=order_tbl.customer_id where customer_tbl.customer_email='" . $this->session->userdata('customer_email') . "'";
			$query=$this->db->query($sql);
			//var_dump($query);
			//exit;
			return $query->result_array();
		}

		function konfir($order_id){
			$query=$this->db->query('select * from order_tbl where order_id=' . $order_id);
			return $query->row();
		}


}