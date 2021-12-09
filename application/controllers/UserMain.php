<?php
	class UserMain extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->library('session');
		}
		function index(){
			$data["content_page"]='user_layout';
			$data['customer_data']=$this->AdminModel->customer();	
			$this->load->view('admin/admin_index',$data);
		}
		function edit_customer($customer_id=0){
			if($customer_id>0){
			$data["content_page"]="edit_member";
			$data["data_customer"]=$this->AdminModel->customerDetail($customer_id);
			$this->load->view("admin/admin_index",$data); 
			}
		}

		function editCustomerSubmit(){
			$customer_id=htmlentities($_POST["customer_id"], ENT_QUOTES);
			$customer_email=htmlentities($_POST["customer_email"], ENT_QUOTES);
			$customer_password=htmlentities($_POST["customer_password"], ENT_QUOTES);
			$customer_name=htmlentities($_POST["customer_name"], ENT_QUOTES);
			$gender=htmlentities($_POST["gender"], ENT_QUOTES); 
			$born=htmlentities($_POST["born"], ENT_QUOTES);
			
			$sql="update customer_tbl set customer_password='" . $customer_password . "',customer_name='" . $customer_name . "',gender='" . $gender . "',born='" . $born . "',create_date=Now() where customer_id=" . $customer_id;
			
			$query=$this->db->query($sql);
			
			redirect(base_url() . "UserMain");
		}
		function deleteCustomer($customer_id){
		 	$sql="delete from customer_tbl where customer_id=" . $customer_id;
		 	$query=$this->db->query($sql);
		 
			redirect(base_url() . "UserMain");
	 	}
	}