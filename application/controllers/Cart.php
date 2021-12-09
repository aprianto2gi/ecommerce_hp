<?php
	class Cart extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->library('cart');
			$this->load->model('ProductModel');
			$this->load->model('CartModel');
		}
		function index(){
			if(!$this->session->has_userdata('customer_email')){
				redirect(base_url() . "Home");
			}
			$data["content_page"]="cart_layout";
			$data["product_data"]=$this->ProductModel->getProduct(4);
			$data["top_seller"]=$this->ProductModel->topSeller(2);
			$this->load->view("index",$data);
		}
		
		public function addtocart(){
			$datacart= array(
		        'id'      	=> $this->input->post('id'),
		        'qty'    	=> $this->input->post('qty'),
		        'price'   	=> $this->input->post('price'),
		        'name'     	=> $this->input->post('name'),
		        'maxqty'	=> $this->input->post('maxqty')
			);
			
			$this->cart->insert($datacart);
			//var_dump($this->cart->insert($datacart));
			redirect('shop');
		}


		/*function addcart($product_id){
			$data=$this->ProductModel->productDetail($product_id);
			$datacart= array(
		        'id'      	=> $this->$data->product_id,
		        'qty'    	=> 1,
		        'price'   	=> $this->$$data->price,
		        'name'     	=> $this->$$data->product_name
			);
			
			$this->cart->insert($datacart);
			//var_dump($this->cart->insert($datacart));
			redirect('home');
		}*/

		function remove($rowid) {                    
			if ($rowid==="all"){
				$this->cart->destroy();
			}else{
				$data = array(
					'rowid'   => $rowid,
					'qty'  => 0,
					'price'=>0,
					'name'=>DELETED
				);
			$this->cart->update($data);
			}	
			redirect('cart');
        }
	
	    function update_cart(){ 
	
            /*$cart_info =  $_POST['cart'] ;
 				foreach( $cart_info as $id => $cart){	
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $subtotal = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    $data = array(
						'rowid'   => $rowid,
                        'price'   => $price,
                        'subtotal' => $subtotal,
						'qty'     => $qty
					);
             		//var_dump($data);
             		//exit();
				$this->cart->update($data);
				} */

			for ($i=0;$i<=count($_POST["rowid"])-1;$i++) {
			 
              $data = array(
						'rowid'   => $_POST["rowid"][$i],
                        'price'   => $_POST["price"][$i],
                        'subtotal' => $_POST["price"][$i] * $_POST["qty"][$i],
						'qty'     => $_POST["qty"][$i]
			  );
			  $this->cart->update($data);
			  
			}	
			redirect('cart');        
		}

        //function checkout(){
         //   $this->load->view('checkout_layout');
            
        //}
        
		
}