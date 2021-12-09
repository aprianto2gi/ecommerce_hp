<?php
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library("form_validation");
			$this->load->library("session");
			$this->load->model("ProductModel");
		}

		function index(){
			$this->load->view("index");
		}

		function loginSubmit(){
		 $this->form_validation->set_rules('email','Email','required',array('required'=>'Isi Email !!!'));
		 $this->form_validation->set_rules('pass','Password','required',array('required'=>'Isi Password !!!'));

		 //===================================================================Start Captcha
		 $captcha_answer = $this->input->post('g-recaptcha-response');
		 $response = $this->recaptcha->verifyResponse($captcha_answer);
		 //var_dump($x);
		 //exit();
			if ($response['success']) {
					 if($this->form_validation->run()==false){
						 		$data["loginerror"]="Akun tidak ditemukan!!";
								$data["content_page"]="home_layout";
								$data["product_data"]=$this->ProductModel->getProduct();
								$data["brand_data"]=$this->ProductModel->getBrand();
								$data["product"]=$this->ProductModel->getProduct(3);
								$data["top_seller"]=$this->ProductModel->topseller(3);
								$this->load->view("index",$data);
						}else{
							if($this->ProductModel->checkdata(htmlentities($_POST["email"], ENT_QUOTES),sha1(htmlentities($_POST["pass"], ENT_QUOTES)))>0){
								//$this->session->set_userdata("email",$_POST["email"]);
								
								if($this->ProductModel->nama($_POST["email"])){
									$cn=$this->ProductModel->nama($_POST["email"]);
									foreach ($cn as $row) {
										$name=$row["customer_name"];
										$email=$_POST['email'];
										$customer_id=$row['customer_id'];

										//var_dump($email);
										//exit();
										$this->session->set_userdata('customer_name',$name);
										$this->session->set_userdata('customer_email',$email);
										$this->session->set_userdata('customer_id',$customer_id);
									}
										//var_dump($_POST["ling"]);exit;
										// ==============================LOGIN DI HAL TERKAIT 
										if($_POST["ling"]=="shop"){
											redirect(base_url() . "Shop");	
										}else if($_POST["ling"]=="ContactMain"){
											redirect(base_url() . "ContactMain");
										}else{
											redirect(base_url() . "Home");	
										}
										// ==============================LOGIN DI HAL TERKAIT
								}
							}else{
							
								$data["loginerror"]="Akun tidak ditemukan!!";
								$data["content_page"]="home_layout";
								$data["product_data"]=$this->ProductModel->getProduct();
								$data["brand_data"]=$this->ProductModel->getBrand();
								$data["product"]=$this->ProductModel->getProduct(3);
								$data["top_seller"]=$this->ProductModel->topseller(3);
								$this->load->view("index",$data);
								
							}
						}
			} else {
			    $data["loginerror"]="Captcha Error !!!";
				$data["content_page"]="home_layout";
				$data["product_data"]=$this->ProductModel->getProduct();
				$data["brand_data"]=$this->ProductModel->getBrand();
				$data["product"]=$this->ProductModel->getProduct(3);
				$data["top_seller"]=$this->ProductModel->topseller(3);
				$this->load->view("index",$data);
				//===================================================================End Captcha
			}
	 	}


	 	function logOut(){
	 		$this->session->sess_destroy();
			redirect(base_url() . "Home");
		}
	}
	 	