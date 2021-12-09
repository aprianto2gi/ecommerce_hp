<?php
	class OrderMain extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
		}

		function index(){
			$data['content_page']='order_layout';
			$data['lihat']=$this->AdminModel->lihat();
			$data['lihatE']=$this->AdminModel->lihatExpired();
			$this->load->view('admin/admin_index',$data);
		}
		function verif($order_id){
			$data['content_page']='status_layout';
			$data['data']=$this->AdminModel->verif($order_id);
			$data['detail']=$this->AdminModel->getOrderData($order_id);
			$this->load->view('admin/admin_index',$data);
		}

		function verifExpired($order_id){
			$data['content_page']='statusexpired_layout';
			$data['data']=$this->AdminModel->verifExpired($order_id);
			$data['detail']=$this->AdminModel->getOrderData($order_id);
			$this->load->view('admin/admin_index',$data);
		}

		function verifSubmit(){
			$order_id=$_POST['order_id'];
			$status=$_POST['status'];

			$sql1="update order_tbl set status='" . $status . "' where order_id=" . $order_id;
			$query=$this->db->query($sql1);

			redirect(base_url() . "OrderMain");
		}

		function verifExpiredSubmit(){
			$order_id=$_POST['order_id'];
			$status=$_POST['status'];
			$product_id=$_POST['product_id'];
			$jumlah=$_POST['jumlah'];

			$sql1="update order_tbl set status='" . $status . "' where order_id=" . $order_id;
			$query=$this->db->query($sql1);

			if($_POST['status']='Belum Lunas' or $_POST['status']='Lunas' or $_POST['status']='Proses'){
				$sql2="update";
				$query2=$this->db->query($sql2);

				$sql3="";
				$query3=$this->db->query($sql3);
			}

			redirect(base_url() . "OrderMain");
		}

	}