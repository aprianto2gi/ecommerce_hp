<?php
	class Konfirmasi extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("CartModel");

			$uploadconfig["upload_path"]="./img/products/";//tempat menyimpan upload foto
			$uploadconfig["allowed_types"]="gif|jpg|png";//format type yg diijinkan untuk upload
			$uploadconfig["max_size"]=50240;//10mb
			$this->load->library("upload",$uploadconfig);
		}

		function index(){
			if(!$this->session->has_userdata('customer_email')){
				redirect(base_url() . "Home");
			}
			$data['content_page']='konfirmasi_layout';
			$data['konfirmasi_data']=$this->CartModel->lihat();
			$this->load->view("index",$data);

		}

		function konfir($order_id){
			$data['content_page']='konfir_layout';
			$data['data_konfir']=$this->CartModel->konfir($order_id);
			$this->load->view("index",$data);
		}

		function konfirSubmit(){
			
			$customer_id=htmlentities($_POST['customer_id'], ENT_QUOTES);
			$order_id=htmlentities($_POST['order_id'], ENT_QUOTES);
			$nama_bank=htmlentities($_POST['nama_bank'], ENT_QUOTES);
			$nomor_rekening=htmlentities($_POST['nomor_rekening'], ENT_QUOTES);
			$atas_nama=htmlentities($_POST['atas_nama'], ENT_QUOTES);
			$total_bayar=htmlentities($_POST['total_bayar'], ENT_QUOTES);
			$gambar='';

			if($this->upload->do_upload("gambar")){
				$gambar=$this->upload->file_name;
			}

			$sql="insert into payment_tbl() values(''," . $customer_id . "," . $order_id . ",'" . $nama_bank . "'," . $nomor_rekening . ",'" . $atas_nama . "'," . $total_bayar . ",'" . $gambar . "',now())";
			$query=$this->db->query($sql);

			$sql1="update order_tbl set status='Proses' where order_id=" . $order_id;
			$query=$this->db->query($sql1);

			redirect(base_url() . "Konfirmasi");
		}


	}