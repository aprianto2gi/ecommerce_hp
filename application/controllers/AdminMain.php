<?php 
 class AdminMain extends CI_Controller {
	 public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->model("AdminModel");
		$this->load->model('ProductModel'); 
		//configurasi upload foto untuk keperluan addProductSubmit
		$uploadconfig["upload_path"]="./img/products/";//tempat menyimpan upload foto
		$uploadconfig["allowed_types"]="gif|jpg|png";//format type yg diijinkan untuk upload
		$uploadconfig["max_size"]=10240;//10mb
		$this->load->library("upload",$uploadconfig);
	 }
	 
	 public function index() {
		$data["content_page"]="home_list"; 
		$data["products_data"]=$this->AdminModel->getProduct(0);
		$this->load->view("admin/admin_index",$data); 
	 }
	 
	 public function addProduct() {
		$data["content_page"]="add_form";
		$data["combo_data"]=$this->AdminModel->comboData();
		$this->load->view("admin/admin_index",$data); 
	 }
	 function addProductSubmit(){//action dari add_from.php
			$product_name=htmlentities($_POST["product_name"], ENT_QUOTES);
			$price=htmlentities($_POST["price"], ENT_QUOTES); 
			$stock=htmlentities($_POST["stock"], ENT_QUOTES);
			$product_description=$_POST["product_description"];
			$brand_id=htmlentities($_POST["brand_id"], ENT_QUOTES);
			$gambar1="";
			$gambar2="";
			$gambar3="";
			
			if($this->upload->do_upload("gambar1")){
				$gambar1=$this->upload->file_name;
				if($this->upload->do_upload("gambar2")){
					$gambar2=$this->upload->file_name;
					if($this->upload->do_upload("gambar3")){
						$gambar3=$this->upload->file_name;
					}
				}
			}
			
			$sql="insert into product_tbl() values('','" . $brand_id . "','" . $product_name . "','" . $product_description . "'," . $price . "," . $stock . ",'" . $gambar1 . "','" . $gambar2 . "','" . $gambar3 . "',now())";
			
			$query=$this->db->query($sql);
			
			$product_id = $this->db->insert_id();
			$sqlx="insert into seller_tbl() values('" . $product_id . "','" . $product_name . "'," . $price . ", 0)";
			$queryx=$this->db->query($sqlx);

			redirect(base_url() . "AdminMain");
	 }
	 
	 public function editProduct($product_id=0) {
		if($product_id>0){
		$data["content_page"]="edit_form";
		$data["data_product"]=$this->AdminModel->productDetail($product_id);
		$data["combo_box"]=$this->AdminModel->comboBox($product_id);
		$data["combo_data"]=$this->AdminModel->comboData();
		$this->load->view("admin/admin_index",$data); 
		}
	 }
	 
	 function editProductSubmit(){
		$product_id=htmlentities($_POST["product_id"], ENT_QUOTES);
		$product_name=htmlentities($_POST["product_name"], ENT_QUOTES);
		$price=htmlentities($_POST["price"], ENT_QUOTES); 
		$stock=htmlentities($_POST["stock"], ENT_QUOTES);
		$product_description=$_POST["product_description"];
		$brand_id=htmlentities($_POST["brand_id"], ENT_QUOTES);
		$gambar1=$_POST["gambar_old1"];
		$gambar_old1="./img/products/" . $_POST["gambar_old1"];
		
		$gambar2=$_POST["gambar_old2"];
		//echo $gambar2;
		//exit;
		$gambar_old2="./img/products/" . $_POST["gambar_old2"];
		
		$gambar3=$_POST["gambar_old3"];
		$gambar_old3="./img/products/" . $_POST["gambar_old3"];
		
		if($this->upload->do_upload("gambar1")){
			$gambar1=$this->upload->file_name;
				if(file_exists($gambar_old1)){//cek gambar lama masih ada atau tidak
					unlink($gambar_old1);//jika ada hapus 
				}
		}
		if($this->upload->do_upload("gambar2")){
				$gambar2=$this->upload->file_name;
				if(file_exists($gambar_old2)){//cek gambar lama masih ada atau tidak
					unlink($gambar_old2);//jika ada hapus 
				}
		}	
		if($this->upload->do_upload("gambar3")){
				$gambar3=$this->upload->file_name;
					
						
				if(file_exists($gambar_old3)){//cek gambar lama masih ada atau tidak
					unlink($gambar_old3);//jika ada hapus 
				}		
		}
		
		$sql="update product_tbl set product_name='" . $product_name . "',product_description='" . $product_description . "',price=" . $price . ",stock=" . $stock . ",brand_id='" . $brand_id . "',gambar1='" . $gambar1 . "',gambar2='" . $gambar2 . "',gambar3='" . $gambar3 . "' where product_id=" . $product_id;
		//echo $sql;
		//exit;
		
		$query=$this->db->query($sql);

		$sqlx="update seller_tbl set product_name='" . $product_name . "',price=" . $price . " where product_id=" . $product_id;
		$queryx=$this->db->query($sqlx);

		
		redirect(base_url() . "AdminMain");
		
	 }
	 
	 function deleteProduct($product_id){
		 $gambar1=$this->ProductModel->getGambarProduct1($product_id);
		 $gambar1="./img/products/" . $gambar1;
		 $gambar2=$this->ProductModel->getGambarProduct2($product_id);
		 $gambar2="./img/products/" . $gambar2;
		 $gambar3=$this->ProductModel->getGambarProduct3($product_id);
		 $gambar3="./img/products/" . $gambar3;
		 
		
		 
		 $sql="delete from product_tbl where product_id=" . $product_id;
		 
		 //==buka== hapus data di seller_tbl yg jumlah_seller=0
		 $cekseller=$this->ProductModel->cekseller();
		 foreach($cekseller as $cs){

		        if($cs['product_id']==$product_id and $cs['jumlah_seller']==0){
		            $id=$cs['product_id'];
		               	$this->ProductModel->delseller($id);   
		        }
            
    	 }
    	 //==tutup== hapus data di seller_tbl yg jumlah_seller=0


		 $query=$this->db->query($sql);
		  if(file_exists($gambar1)){
			 unlink($gambar1);
		 }
		 if(file_exists($gambar2)){
			 unlink($gambar2);
		 }
		 if(file_exists($gambar3)){
			 unlink($gambar3);
		 }
		 
		 redirect(base_url() . "AdminMain");
	 }
 }