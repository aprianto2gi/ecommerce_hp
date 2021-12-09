<?php
	class Detail extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("ProductModel");
			$this->load->library('session');
		}
		function index(){
			$data["content_page"]="detail_layout";
			//$data["product_data"]=$this->ProductModel->getProduct(4);
			//$data["product_detail"]=$this->ProductModel->productDetail($product_id);
			$this->load->view("index",$data);
		}
	}