<?php
	class Shop extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("ProductModel");
			$this->load->library("pagination");
			$this->load->library('session');
		}
		function index(){
			//pagination
			$config=array();
			$config["base_url"]=base_url() . "Shop";
			$config["per_page"]=4;
			$config["uri_segment"]=2;
			$config["total_rows"]=$this->ProductModel->getTotalProduct();

			$config["full_tag_open"]="<ul>";
			$config["full_tag_close"]="</ul>";

			$config["first_tag_open"]="<li class='paging_item'>";
			$config["first_link"]="&lt;&lt;";
			$config["first_tag_close"]="</li>";
			
			$config["last_tag_open"]="<li class='paging_item'>";
			$config["last_link"]="&gt;&gt;";
			$config["last_tag_close"]="</li>";
			
			$config["prev_tag_open"]="<li class='paging_item'>";
			$config["prev_link"]="&lt;";
			$config["prev_tag_close"]="</li>";
			
			$config["next_tag_open"]="<li class='paging_item'>";
			$config["next_link"]="&gt;";
			$config["next_tag_close"]="</li>";
			
			$config["cur_tag_open"]="<li class='paging_item paging_item_active'><a href='#'>";
			$config["cur_tag_close"]="</a></li>";
			
			$config["num_tag_open"]="<li class='paging_item'>";
			$config["num_tag_close"]="</li>";

			$this->pagination->initialize($config);



			$data["content_page"]="shop_layout";
			$start_data=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["product_data"]=$this->ProductModel->getProductPage($start_data,$config["per_page"]);
			
			$this->load->view("index",$data);
		}

		function seller(){
			$config=array();
			$config["base_url"]=base_url() . "Shop/seller";
			$config["per_page"]=4;
			$config["uri_segment"]=3;
			$config["total_rows"]=$this->ProductModel->getTotalSeller();

			$config["full_tag_open"]="<ul>";
			$config["full_tag_close"]="</ul>";

			$config["first_tag_open"]="<li class='paging_item'>";
			$config["first_link"]="&lt;&lt;";
			$config["first_tag_close"]="</li>";
			
			$config["last_tag_open"]="<li class='paging_item'>";
			$config["last_link"]="&gt;&gt;";
			$config["last_tag_close"]="</li>";
			
			$config["prev_tag_open"]="<li class='paging_item'>";
			$config["prev_link"]="&lt;";
			$config["prev_tag_close"]="</li>";
			
			$config["next_tag_open"]="<li class='paging_item'>";
			$config["next_link"]="&gt;";
			$config["next_tag_close"]="</li>";
			
			$config["cur_tag_open"]="<li class='paging_item paging_item_active'><a href='#'>";
			$config["cur_tag_close"]="</a></li>";
			
			$config["num_tag_open"]="<li class='paging_item'>";
			$config["num_tag_close"]="</li>";

			$this->pagination->initialize($config);



			$data["content_page"]="shop_layout";
			$start_data=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;//perhatikan segmen
			$data["seller_data"]=$this->ProductModel->getSellerPage($start_data,$config["per_page"]);
			
			$this->load->view("index",$data);
		}

		function bnd($brand_id){
			$config=array();
			$config["base_url"]=base_url() . "Shop/bnd/" . $brand_id;
			$config["per_page"]=4;
			$config["uri_segment"]=4;
			$config["total_rows"]=$this->ProductModel->getTotalBnd($brand_id);

			$config["full_tag_open"]="<ul>";
			$config["full_tag_close"]="</ul>";

			$config["first_tag_open"]="<li class='paging_item'>";
			$config["first_link"]="&lt;&lt;";
			$config["first_tag_close"]="</li>";
			
			$config["last_tag_open"]="<li class='paging_item'>";
			$config["last_link"]="&gt;&gt;";
			$config["last_tag_close"]="</li>";
			
			$config["prev_tag_open"]="<li class='paging_item'>";
			$config["prev_link"]="&lt;";
			$config["prev_tag_close"]="</li>";
			
			$config["next_tag_open"]="<li class='paging_item'>";
			$config["next_link"]="&gt;";
			$config["next_tag_close"]="</li>";
			
			$config["cur_tag_open"]="<li class='paging_item paging_item_active'><a href='" . base_url() . "Shop/bnd/" . $brand_id ."'>";
			$config["cur_tag_close"]="</a></li>";
			
			$config["num_tag_open"]="<li class='paging_item'>";
			$config["num_tag_close"]="</li>";

			$this->pagination->initialize($config);



			$data["content_page"]="shop_layout";
			$start_data=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;//perhatikan segmen
			$data["bnd_data"]=$this->ProductModel->getBndPage($brand_id,$start_data,$config["per_page"]);
			
			$this->load->view("index",$data);
		}

		function productDetail($product_id){
			$data["content_page"]="detail_layout";
			$data["product_data"]=$this->ProductModel->getProduct(4);
			$data["product_det"]=$this->ProductModel->productDetail($product_id);
			$data["related_data"]=$this->ProductModel->related($product_id);
			$data["stock"]=$this->ProductModel->getStock($product_id);
			$this->load->view("index",$data);
		}

		//=>=>=>=>=> start search <=<=<=<=<=
		function search_keyword(){ 
			$keyword=$this->input->post('keyword');
			$data['content_page']="shop_layout";
        	$data['resul']=$this->ProductModel->search($keyword);
        	//var_dump($this->ProductModel->search($keyword)); exit();
        	$this->load->view("index",$data);
        	//redirect(base_url() . "Shop");
		}
		//=>=>=>=>=> end search <=<=<=<=<=
				
	}