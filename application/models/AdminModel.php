<?php 
	class AdminModel extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function checkdata($email, $pass){
			$sql="select * from admin_tbl where admin_email='" . $email ."' and admin_password='" . $pass . "'";
			
			$result=$this->db->query($sql);
			return $result->num_rows();
		}

		function nama($email){ //login customer
			$result="";
			$sql="select admin_name from admin_tbl where admin_email='" . $email ."'";
			$result=$this->db->query($sql);
			//var_dump($result->result_array());
			//exit();
			return $result->result_array(); //CATATAN RETURN $RESULT->ROW() BACA STRING(1) BKN SEMUA STRING
		}

		function cekemailAdmin($admin_email){
			$sql="select admin_email from admin_tbl where admin_email='" . $admin_email . "'";
			$result=$this->db->query($sql);
			return $result->num_rows();	
		}

		function ceksha1(){
			$sql="select admin_password from admin_tbl";
			$result=$this->db->query($sql);
			return $result->result_array();	
		}

		function getBrand(){
			$sql="select * from brand_tbl";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function getProduct($limit=0){
			if($limit>0){
				$sql="select product_tbl.*,brand_tbl.* from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id order by product_tbl.product_id desc limit " . $limit;
			}else{
				$sql="select product_tbl.*,brand_tbl.* from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id order by product_id desc";
			}
			$query=$this->db->query($sql);
			return $query->result_array();
		}	

		function topSeller($limit=0){
			if($limit>0){
				$sql="select seller_tbl.seller_id,seller_tbl.jumlah_seller,product_tbl.* from seller_tbl inner join product_tbl on seller_tbl.product_id=product_tbl.product_id order by seller_tbl.jumlah_seller desc limit " . $limit;
			}else{
				$sql="select seller_tbl.seller_id,seller_tbl.jumlah_seller,product_tbl.* from seller_tbl inner join product_tbl on seller_tbl.product_id=product_tbl.product_id order by seller_tbl.jumlah_seller desc";
			}
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function productDetail($product_id){
			$sql="select product_tbl.*, brand_tbl.* from product_tbl inner join brand_tbl on product_tbl.brand_id=brand_tbl.brand_id where product_tbl.product_id=" . $product_id;
			$query=$this->db->query($sql);
			return $query->row();
			
		}

		function related($product_id){
			$sql="select product_tbl.*,brand_tbl.*,seller_tbl.* from product_tbl inner join brand_tbl on product_tbl.brand_id=brand_tbl.brand_id inner join seller_tbl on product_tbl.product_id=seller_tbl.product_id where product_tbl.product_id<>" . $product_id . " order by seller_tbl.jumlah_seller DESC limit 5";
			$query=$this->db->query($sql);
			return $query->result_array();
		}
		function search($keyword){
	        //$this->db->like('product_name',$keyword);
	        //$query=$this->db->get('tablename');
	        //ATAU
	        $query=$this->db->query('select product_tbl.*,brand_tbl.* from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id where product_tbl.product_name like "%' . $keyword . '%" or brand_tbl.brand_name like "%' . $keyword . '%" order by product_id desc');
	        //var_dump($query->result()); exit();
	        return $query->result_array();

    	}

    	function comboBox($product_id){
    		$query=$this->db->query('select brand_tbl.brand_id, brand_tbl.brand_name from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id where product_id=' . $product_id);
    		return $query->result_array();
    	}
    	function comboData(){
    		$query=$this->db->query('select * from brand_tbl');
    		return $query->result_array();
    	}

    	function cmbBoxAdmin($admin_id){
    		$query=$this->db->query('select admin_id,gender from admin_tbl where admin_id=' . $admin_id);
    		//echo 'select gender from admin_tbl where admin_id=' . $admin_id; exit;
    		return $query->result_array();	
    	}
    	function cmbDataAdmin(){
    		$query=$this->db->query('select * from admin_tbl');
    		return $query->result_array();		
    	}



    	function admin(){
    		$sql="select * from admin_tbl";
    		$query=$this->db->query($sql);
    		return $query->result_array();
    	}
    	function adminDetail($admin_id){
    		$sql="select * from admin_tbl where admin_id=" . $admin_id;
			$query=$this->db->query($sql);
			return $query->row();
    	}

    	function customer(){
    		$sql="select * from customer_tbl";
    		$query=$this->db->query($sql);
    		return $query->result_array();	
    	}
    	function customerDetail($customer_id){
    		$sql ="select * from customer_tbl where customer_id=" . $customer_id;
    		$query=$this->db->query($sql);
    		return $query->row();
    	}

    	function lihat(){
			$sql="select * from order_tbl inner join payment_tbl on payment_tbl.order_id=order_tbl.order_id inner join customer_tbl on customer_tbl.customer_id=order_tbl.customer_id";
			$query=$this->db->query($sql);
			//var_dump($query);
			//exit;
			return $query->result_array();
		}

		function lihatExpired(){
			$sql="select * from order_tbl inner join customer_tbl on customer_tbl.customer_id=order_tbl.customer_id where order_tbl.status='Expired'";
			$query=$this->db->query($sql);
			//var_dump($query);
			//exit;
			return $query->result_array();
		}

		function verif($order_id){
			$query=$this->db->query('select * from order_tbl inner join payment_tbl on payment_tbl.order_id=order_tbl.order_id inner join customer_tbl on customer_tbl.customer_id=order_tbl.customer_id where payment_tbl.order_id=' . $order_id);
			return $query->row();
		}

		function verifExpired($order_id){
			$query=$this->db->query('select * from order_tbl inner join customer_tbl on customer_tbl.customer_id=order_tbl.customer_id where order_tbl.order_id=' . $order_id);
			return $query->row();
		}

		function getOrderData($order_id){
			$query=$this->db->query('select * from order_tbl inner join detail_order_tbl on order_tbl.order_id=detail_order_tbl.order_id inner join product_tbl on product_tbl.product_id=detail_order_tbl.product_id where order_tbl.order_id=' . $order_id);
			return $query->result_array();
		}
		


	}