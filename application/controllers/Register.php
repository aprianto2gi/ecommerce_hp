<?php
	class Register extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("ProductModel");
		}

		function index(){
			//$data['ckmail']=$this->ProductModel->cekemailCustomer();
			$this->load->view("register");
		}

		function daftar(){
			$customer_email=htmlentities($_POST['customer_email'], ENT_QUOTES);
			$customer_password=sha1(htmlentities($_POST['customer_password'], ENT_QUOTES));
			$customer_name=htmlentities($_POST['customer_name'], ENT_QUOTES);
			$gender=htmlentities($_POST['gender'], ENT_QUOTES);
			$born=htmlentities($_POST['born'], ENT_QUOTES);

				if($this->ProductModel->cekemailCustomer($customer_email)>0){
					$data['data']=htmlentities($_POST['customer_email'], ENT_QUOTES);
					$data['data1']=htmlentities($_POST['customer_password'], ENT_QUOTES);
					$data['data2']=htmlentities($_POST['customer_name'], ENT_QUOTES);
					$data['data3']=htmlentities($_POST['gender'], ENT_QUOTES);
					$data['data4']=htmlentities($_POST['born'], ENT_QUOTES);
					$data["loginerror"]="Akun Sudah Terdaftar !!";
					$this->load->view("register",$data);
					//redirect(base_url() . "Register");
				}else{
					$query=$this->db->query("insert into customer_tbl() values('','" . $customer_email . "','" . $customer_password . "','" . $customer_name . "','" . $gender . "','" . $born . "',now())");
							//redirect(base_url() . "Register");
					$data['selamat']='Selamat Datang ' . $_POST['customer_name'] . ' Silahkan Login Untuk Memulai Belanja';
					$this->load->view('register', $data);
				}
					
		}
	}