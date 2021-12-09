<?php
	class AkunMain extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('ProductModel');
		}

		function index(){
			if(!$this->session->has_userdata('customer_email')){
				redirect(base_url() . "Home");
			}
			$data['content_page']='akun_layout';
			$data['data_akun']=$this->ProductModel->akun();
			$data["combo_box"]=$this->ProductModel->comboBox($this->session->userdata('customer_email'));
			$data["combo_data"]=$this->ProductModel->comboData();
			$data['order']=$this->ProductModel->lihat();
			$this->load->view('index',$data);
		}

		function editAkunSubmit(){
			$customer_email=htmlentities($_POST['customer_email'], ENT_QUOTES);
			$customer_name=htmlentities($_POST['customer_name'], ENT_QUOTES);
			
			$customer_password=sha1(htmlentities($_POST['customer_password'], ENT_QUOTES));
			$password=htmlentities($_POST['customer_password'], ENT_QUOTES);
			
			$Npassword=sha1(htmlentities($_POST['Npassword'], ENT_QUOTES));
			$CNpassword=sha1(htmlentities($_POST['CNpassword'], ENT_QUOTES));
			$gender=htmlentities($_POST['gender'], ENT_QUOTES);
			$born=$_POST['born'];

			$data=[]; 
			$cek=$this->ProductModel->ceksha1();
			$err=false;
			foreach($cek as $ck){
				// var_dump($ck['customer_password']);
				if($ck['customer_password']==$customer_password){
					break;
					
				}else{
					$data['data']=$password;
					$data['data_akun']=$this->ProductModel->akun();
					$data["combo_box"]=$this->ProductModel->comboBox($this->session->userdata('customer_email'));
					$data["combo_data"]=$this->ProductModel->comboData();
					$data['order']=$this->ProductModel->lihat();
					$data["passerror"]="Password Salah !!";
					$data['content_page']='akun_layout';
					$err=true;
					break;
				}
			}
			if ($err==false) {
					$sql="update customer_tbl set customer_name='" . $customer_name . "',customer_password='" . $Npassword . "',gender='" . $gender . "',born='" . $born . "' where customer_email='" . $customer_email . "'";
		
					$query=$this->db->query($sql);
					
					$this->session->sess_destroy();
					redirect(base_url() . "Home");
			}
			else {
				$this->load->view('index',$data);
			}
		
		}

		
	}