<?php 
	class Home extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("ProductModel");
			$this->load->library("session");
			$this->load->library("form_validation");
			
			
		}

		function index(){
			$data["content_page"]="home_layout";
			$data["product_data"]=$this->ProductModel->getProduct();
			
			$data["brand_data"]=$this->ProductModel->getBrand();
			$data["product"]=$this->ProductModel->getProduct(3);
			$data["top_seller"]=$this->ProductModel->topseller(3);
			//$data['expired']=$this->ProductModel->expired();

			// ==buka== ubah status(jika belum bayar) di order_tbl otomatis
			$expired=$this->ProductModel->expired();
			foreach($expired as $ex){
				date_default_timezone_set('Asia/Jakarta');
		        if($ex['expired']<=date('Y-m-d H:i:s')){
		            $id=$ex['order_id'];
		            $status=$ex['status'];
		            $product_id=$ex['product_id'];
		            $jumlah_barang=$ex['jumlah_barang'];
		            if($status=="Belum Lunas"){
		            	$this->ProductModel->updateQty($product_id,$jumlah_barang); //ubah jumlah_barang(seller_tbl) dan stock(product_tbl)
		            	$this->ProductModel->updateStatus($id);
		            }       
		        }
            
    		}
    		// ==tutup== ubah status(jika belum bayar) di order_tbl otomatis
			$this->load->view("index",$data);
		}




		
	}