<?php 
	class ProductModel extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();//==========penting bro. biar bisa akses database===========
		}
		//=====================================start login
		function checkdata($email,$pass){
			$sql="select * from customer_tbl where customer_email='" . $email ."' and customer_password='" . $pass . "'";
			$result=$this->db->query($sql);
			return $result->num_rows();
		}
		function nama($email){ //login customer
			$result="";
			$sql="select customer_name, customer_id from customer_tbl where customer_email='" . $email . "'";
			$result=$this->db->query($sql);
			//var_dump($result->result_array());
			//echo $sql;
			//exit();
			return $result->result_array(); //CATATAN RETURN $RESULT->ROW() BACA STRING(1) BKN SEMUA STRING
		}
		//=====================================end login
		function cekemailCustomer($customer_email){
			$sql="select customer_email from customer_tbl where customer_email='" . $customer_email . "'";
			$result=$this->db->query($sql);
			return $result->num_rows();	
		}

		function ceksha1(){
			$sql="select customer_password from customer_tbl";
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
				$sql="select product_tbl.*,brand_tbl.* from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id where product_tbl.stock>0 order by product_tbl.product_id desc limit " . $limit;
			}else{
				$sql="select product_tbl.*,brand_tbl.* from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id where product_tbl.stock>0 order by product_id desc";
			}
			$query=$this->db->query($sql);
			return $query->result_array();
		}	

		function topSeller($limit=0){
			if($limit>0){
				$sql="select seller_tbl.jumlah_seller,product_tbl.* from seller_tbl inner join product_tbl on seller_tbl.product_id=product_tbl.product_id where product_tbl.stock>0 order by seller_tbl.jumlah_seller desc limit " . $limit;
			}else{
				$sql="select seller_tbl.jumlah_seller,product_tbl.* from seller_tbl inner join product_tbl on seller_tbl.product_id=product_tbl.product_id where product_tbl.stock>0 order by seller_tbl.jumlah_seller desc";
			}
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function productDetail($product_id){
			$sql="select product_tbl.*, brand_tbl.* from product_tbl inner join brand_tbl on product_tbl.brand_id=brand_tbl.brand_id where product_tbl.stock>0 and product_tbl.product_id=" . $product_id;
			$query=$this->db->query($sql);
			return $query->row();
			
		}

		function related($product_id){
			$sql="select product_tbl.*,brand_tbl.*,seller_tbl.* from product_tbl inner join brand_tbl on product_tbl.brand_id=brand_tbl.brand_id inner join seller_tbl on product_tbl.product_id=seller_tbl.product_id where product_tbl.product_id<>" . $product_id . " and product_tbl.stock>0 order by seller_tbl.jumlah_seller DESC limit 5";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		//pagging semua data
		function getTotalProduct(){
			$sql="select * from product_tbl where stock>0";
			$query=$this->db->query($sql);
			return $query->num_rows();
		}
		function getProductPage($start=0,$limit=0){
			if($limit>0){
				$sql="select * from product_tbl where stock>0 order by product_id desc limit " . $start . "," . $limit;
				$query=$this->db->query($sql);
				return $query->result_array();
			}else{
				return NULL;
			}
		}

		function getStock($product_id){
			$sql="select stock from product_tbl where stock>0 and product_id=" . $product_id;
			$query=$this->db->query($sql);
			return $query->row();
		}

		function getStockArray($product_id){
			$sql="select stock from product_tbl where stock>0 and product_id=" . $product_id;
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		//pagging top seller
		function getTotalSeller(){
			$sql="select seller_tbl.*, product_tbl.stock from seller_tbl inner join product_tbl on product_tbl.product_id=seller_tbl.product_id where stock>0";
			$query=$this->db->query($sql);
			return $query->num_rows();
		}
		function getSellerPage($start=0,$limit=0){
			if($limit>0){
				$sql="select seller_tbl.*,product_tbl.* from seller_tbl inner join product_tbl on product_tbl.product_id=seller_tbl.product_id where product_tbl.stock>0 order by seller_tbl.jumlah_seller desc limit " . $start . "," . $limit;
				$query=$this->db->query($sql);
				return $query->result_array();
			}else{
				return NULL;
			}
		}

		function getTotalBnd($brand_id){
			$sql="select * from product_tbl where stock>0 and brand_id=".$brand_id;
			$query=$this->db->query($sql);
			
			return $query->num_rows();
		}

		function getBndPage($brand_id,$start=0,$limit=0){
			if($limit>0){
				$sql="select * from product_tbl where brand_id=".$brand_id." and stock>0 order by product_id desc limit " . $start . "," . $limit;
				$query=$this->db->query($sql);
				return $query->result_array();
				
			}else{
				return NULL;
			}
		}
		function getGambarProduct1($product_id=0){
			$result="";
			if($product_id>0){
			$sql="select gambar1 from product_tbl where product_id=" . $product_id;
			$query=$this->db->query($sql);
			$rows=$query->row();
			$result=$rows->gambar1;
			}
			return $result;
		}
		function getGambarProduct2($product_id=0){
			$result="";
			if($product_id>0){
			$sql="select gambar2 from product_tbl where product_id=" . $product_id;
			$query=$this->db->query($sql);
			$rows=$query->row();
			$result=$rows->gambar2;
			}
			return $result;
		}
		function getGambarProduct3($product_id=0){
			$result="";
			if($product_id>0){
			$sql="select gambar3 from product_tbl where product_id=" . $product_id;
			$query=$this->db->query($sql);
			$rows=$query->row();
			$result=$rows->gambar3;
			}
			return $result;
		}
		//=>=>=>=>=>=>=>=>=>=>=>=>=>=>=> start search <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
		function search($keyword){
	        //$this->db->like('product_name',$keyword);
	        //$query=$this->db->get('tablename');
	        //ATAU
	        $query=$this->db->query('select product_tbl.*,brand_tbl.* from product_tbl inner join brand_tbl on brand_tbl.brand_id=product_tbl.brand_id where product_tbl.product_name like "%' . $keyword . '%" and product_tbl.stock>0 or brand_tbl.brand_name like "%' . $keyword . '%" and product_tbl.stock>0 order by product_id desc');
	        //var_dump($query->result()); exit();
	        return $query->result_array();

    	}
    	//=>=>=>=>=>=>=>=>=>=>=>=>=>=>=> end search <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=

    	function akun(){
    		$sql="select * from customer_tbl where customer_email='" . $this->session->userdata('customer_email') . "'";
    		$query=$this->db->query($sql);
    		return $query->row();
    	}

    	function comboBox($customer_email){
    		$query=$this->db->query("select DISTINCT gender from customer_tbl where customer_email='" . $customer_email . "'");
    		return $query->result_array();
    	}
    	function comboData(){
    		$query=$this->db->query('select DISTINCT gender from customer_tbl');
    		return $query->result_array();
    	}
    	
    	function lihat(){
			$sql="select * from order_tbl inner join customer_tbl on customer_tbl.customer_id=order_tbl.customer_id where customer_tbl.customer_email='" . $this->session->userdata('customer_email') . "'";
			$query=$this->db->query($sql);
			//var_dump($query);
			//exit;
			return $query->result_array();
		}

		function expired(){
			$sql="select expired,order_tbl.order_id,status, detail_order_tbl.product_id, detail_order_tbl.jumlah_barang from order_tbl INNER JOIN detail_order_tbl on order_tbl.order_id=detail_order_tbl.order_id";
			$query=$this->db->query($sql);
			return $query->result_array();
		}
		function updateStatus($order_id){
		    $sql="update order_tbl set status='Expired' where order_id=".$order_id;
		    $query=$this->db->query($sql); 
		}
		function updateQty($product_id,$jumlah_barang){
			$sql="update product_tbl set stock=stock+" . $jumlah_barang . " where product_id=" . $product_id;
			$query=$this->db->query($sql);

			$sql2="update seller_tbl set jumlah_seller=jumlah_seller-" . $jumlah_barang . " where product_id=" . $product_id;
			$query2=$this->db->query($sql2);
		}

		function cekseller(){
			$sql="select * from seller_tbl";
			$query=$this->db->query($sql);
			return $query->result_array();
		}
		function delseller($id){
			$sql="delete from seller_tbl where product_id=" . $id;
			$query=$this->db->query($sql);
		}





		
	}
