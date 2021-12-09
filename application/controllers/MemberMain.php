<?php
	class MemberMain extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->library('session');

		}	

		function index(){
			$data['content_page']='member_layout';
			$data['admin_data']=$this->AdminModel->admin();	
			$this->load->view('admin/admin_index',$data);		
		}	

		function addAdmin() {
		$data["content_page"]="add_member";
		$this->load->view("admin/admin_index",$data); 
	 	}
	 	function addAdminSubmit(){//action dari add_from.php
			$admin_email=htmlentities($_POST["admin_email"], ENT_QUOTES);
			$admin_password=sha1(htmlentities($_POST["password"], ENT_QUOTES));
			$password=htmlentities($_POST["password"], ENT_QUOTES);
			$admin_name=htmlentities($_POST["admin_name"], ENT_QUOTES);
			$gender=htmlentities($_POST["gender"], ENT_QUOTES);
			$born=htmlentities($_POST["born"], ENT_QUOTES);
			if($this->AdminModel->cekemailAdmin($admin_email)>0){
					$data['data']=$admin_email;
					$data['data1']=$password;
					$data['data2']=$admin_name;
					$data['data3']=$gender;
					$data['data4']=$born;
					$data["loginerror"]="Akun Sudah Terdaftar !!";
					$data["content_page"]="add_member";
					$this->load->view("admin/admin_index",$data); 
					
			}else{
					$sql="insert into admin_tbl() values('','" . $admin_email . "','" . $admin_password . "','" . $admin_name . "','" . $gender . "','" . $born . "',now())";
					$query=$this->db->query($sql);
					$data['selamat']='Selamat Datang ' . $_POST['admin_name'];
					$data["content_page"]="add_member";
					$this->load->view("admin/admin_index",$data); 
					//redirect(base_url() . "MemberMain");
			}
	 	}
		function edit_admin($admin_id=0){
			if($admin_id>0){
			$data["content_page"]="edit_member";
			$data["data_admin"]=$this->AdminModel->adminDetail($admin_id);
			$data["box"]=$this->AdminModel->cmbBoxAdmin($admin_id);
			$data["data"]=$this->AdminModel->cmbDataAdmin();
			$this->load->view("admin/admin_index",$data); 
			}
		}
		function editAdminSubmit(){
			$admin_id=htmlentities($_POST["admin_id"], ENT_QUOTES);
			$admin_email=htmlentities($_POST["admin_email"], ENT_QUOTES);
			$admin_password=sha1(htmlentities($_POST["admin_password"], ENT_QUOTES));

			$password=htmlentities($_POST['admin_password'], ENT_QUOTES);
			
			$Npassword=sha1(htmlentities($_POST['Npassword'], ENT_QUOTES));
			$CNpassword=sha1(htmlentities($_POST['CNpassword'], ENT_QUOTES));

			$admin_name=htmlentities($_POST["admin_name"], ENT_QUOTES);
			$gender=htmlentities($_POST["gender"], ENT_QUOTES); 
			$born=htmlentities($_POST["born"], ENT_QUOTES);

            $data=[]; 
			$cek=$this->AdminModel->ceksha1();
			$err=false;
			foreach($cek as $ck){
				if($ck['admin_password']==$admin_password){
			        break;
					
				}else{
					$data['pass']=$password;
					$data["passerror"]="Password Salah !!";
					$data["content_page"]="edit_member";
					$data["data_admin"]=$this->AdminModel->adminDetail($admin_id);
					$data["box"]=$this->AdminModel->cmbBoxAdmin($admin_id);
					$data["data"]=$this->AdminModel->cmbDataAdmin();
					$err=true;
					break;
					
				}
			}

			if ($err==false) {
               $sql="update admin_tbl set admin_password='" . $Npassword . "',admin_name='" . $admin_name . "',gender='" . $gender . "',born='" . $born . "',create_date=Now() where admin_id=" . $admin_id;
					$query=$this->db->query($sql);
					redirect(base_url() . "MemberMain");
			}
			else {

				$this->load->view("admin/admin_index",$data);
			}

			 
		}
		function deleteAdmin($admin_id){
		 	$sql="delete from admin_tbl where admin_id=" . $admin_id;
		 	$query=$this->db->query($sql);
		 
			redirect(base_url() . "MemberMain");
	 	}

	 	function back(){
	 		redirect(base_url() . "MemberMain");
	 	}

	}