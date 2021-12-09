<?php
	class Checkout extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->library('cart');
			$this->load->model('ProductModel');
			$this->load->model('CartModel');
			$this->load->helper('date');

		}

		function index(){
			if(!$this->session->has_userdata('customer_email')){
				redirect(base_url() . "Home");
			}
			$data["content_page"]="checkout_layout";
			$data["get_product"]=$this->ProductModel->getProduct(4);
			$this->load->view("index",$data);
		}

		function save_order(){
			date_default_timezone_set('Asia/Jakarta');
			$ex=date('Y-m-d H:i:s',strtotime('+1 days',strtotime(date('Y-m-d H:i:s'))));
			$order = array(
				'customer_id'	=> htmlentities($this->input->post('customer_id'), ENT_QUOTES),
				'address' 		=> htmlentities($this->input->post('address'), ENT_QUOTES),
				'province'		=> htmlentities($this->input->post('province'), ENT_QUOTES),
				'city'			=> htmlentities($this->input->post('city'), ENT_QUOTES),
				'postcode'		=> htmlentities($this->input->post('postcode'), ENT_QUOTES),
				'phone' 		=> htmlentities($this->input->post('phone'), ENT_QUOTES),
				'total_price'	=> $this->input->post('total'),
				'order_date' 	=> date('Y-m-d H:i:s'),
				'expired'		=> $ex,
				'status'		=> 'Belum Lunas'
				
			);	
			// var_dump($order);
			// exit;	
			$order_id = $this->CartModel->insert_order($order);

			if ($cart = $this->cart->contents()):
				foreach ($cart as $item):
					$order_detail = array(
						'order_id' 		=> $order_id,
						'product_id' 	=> $item['id'],
						'jumlah_barang' => $item['qty'],
						'jumlah_harga' 	=> $item['price']		
					);
					
			         $detail_order_id = $this->CartModel->insert_order_detail($order_detail);
				endforeach;
				//var_dump($order_detail);exit;
			endif;
			
			if($crt=$this->cart->contents()):
				foreach($crt as $dt):
					$qtyold = $this->CartModel->getqty($dt['id']);
										
					$od=array(
						'order_id'		=> $order_id,
						'product_id'	=> $dt['id'],
						'jumlah_barang'	=> $dt['qty']
					);
					//echo $qtyold;exit();
					$this->db->set('jumlah_seller',$dt['qty']+$qtyold);
					$this->db->where('product_id', $dt['id']);
					$this->db->update('seller_tbl');
				endforeach;
				
			endif;

			if($pt=$this->cart->contents()):
				foreach($pt as $pt):
					$qtylama = $this->CartModel->gtqty($pt['id']);
										
					$do=array(
						'order_id'		=> $order_id,
						'product_id'	=> $pt['id'],
						'jumlah_barang'	=> $pt['qty']
					);
					//echo $qtyold;exit();
					$this->db->set('stock',$qtylama-$pt['qty']);
					$this->db->where('product_id', $pt['id']);
					$this->db->update('product_tbl');
				endforeach;
				
			endif;
			//var_dump($od); exit();
	        // After storing all imformation in database load "billing_success".
	        //$this->load->view('index');
	        $this->cart->destroy();
	        redirect('Home');
		}
	}