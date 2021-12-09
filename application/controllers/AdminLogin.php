<?php
	class AdminLogin extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library("form_validation");
			$this->load->library("session");
			$this->load->model("AdminModel");
		}

		function index(){
			$this->load->view("admin/login");
		}

		function loginSubmit(){
			
		 $this->form_validation->set_rules('email','Email','required',array('required'=>'Isi Email !!!'));
		 $this->form_validation->set_rules('pass','Password','required',array('required'=>'Isi Password !!!'));

		 $captcha_answer = $this->input->post('g-recaptcha-response');
		 $response = $this->recaptcha->verifyResponse($captcha_answer);
		 

		 if (isset($response['success']) and $response['success'] === true) {
			 if($this->form_validation->run()==false){
				 	$this->load->view("admin/login");
				}else{
				//echo $this->AdminModel->checkdata($_POST["email"],$_POST["pass"]);
				//exit();
					//var_dump($this->AdminModel->checkdata($_POST["email"],$_POST["pass"])); 
					//exit();
					if($this->AdminModel->checkdata(htmlentities($_POST["email"], ENT_QUOTES),sha1(htmlentities($_POST["pass"], ENT_QUOTES)))>0){
						//$this->session->set_userdata("email",$_POST["email"]);
						if($this->AdminModel->nama($_POST["email"])){
							$cn=$this->AdminModel->nama($_POST["email"]);
							foreach ($cn as $row) {
								$name=$row["admin_name"];
								//$email=$_POST['email'];

								//var_dump($name);
								//exit();
								$this->session->set_userdata('admin_name',$name);
								//$this->session->set_userdata('customer_email',$email);
							}
						}


						redirect(base_url() . "AdminMain");
					}else{
					
						$data["loginerror"]="Akun tidak ditemukan!!";
						//var_dump($data);
						//exit();
						$this->load->view("admin/login",$data);
						//$this->load->view("admin/login");
					}
				}

		 }else{
		 	$data["loginerror"]="Captcha Error !!!";
			$this->load->view("admin/login",$data);
		 }
	 	}

	 	function logOut(){
	 		$this->session->sess_destroy();
			$this->load->view("admin/login"); 
	 	}
	}