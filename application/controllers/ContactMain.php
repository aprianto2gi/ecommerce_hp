<?php 
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once APPPATH . 'third_party/phpmailer/src/Exception.php';
    require_once APPPATH . 'third_party/phpmailer/src/PHPMailer.php';
    require_once APPPATH . 'third_party/phpmailer/src/SMTP.php';

	class ContactMain extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library("form_validation");
			$this->load->library("session");
			$this->load->model("AdminModel");			
		}

		function index(){
			$data['content_page']='contact';
			$this->load->view("index",$data);
		}

		function submit(){
		  if(isset($_POST['name'])){
			$name=htmlentities($_POST['name'], ENT_QUOTES);
			$email=htmlentities($_POST['email'], ENT_QUOTES);
			$subject=htmlentities($_POST['subject'], ENT_QUOTES);
			$message=htmlentities($_POST['message'], ENT_QUOTES);
			
			$pesan="<div id='kontak' style='height: 500px; width: 500px; background: #bbb; color: #fff;'>
				<div><h2>$subject</h2></div>
				<div id='contain' style='height: 400px; width: 400px; font-size: 16px;'>
					<table>
						<tr><td>Name</td><td>:</td><td>$name</td></tr>
						<tr><td>Email</td><td>:</td><td>$email</td></tr>
						<tr><td>Message</td><td>:</td><td>$message</td></tr>
					</table>					
				</div>
			</div>";
			
			$query=$this->db->query("insert into contact() values('" . $name . "','" . $email . "','" . $subject . "','" . $message . "',now())");


			$data["content_page"]="contact";
	            if ($query) {
				  $data["rmsg"]="ok"; 				  
				  $mail = new PHPMailer(true);
				  try {
					  $mail->isSMTP();
					  $mail->Host = 'smtp.googlemail.com';  
					  $mail->SMTPAuth = true;
					  $mail->Username = 'navas777888@gmail.com';
					  $mail->Password = '2304giel';
					  $mail->SMTPSecure = 'ssl';
					  $mail->Port = 465;
					  
					  $mail->setFrom('navas777888@gmail.com', 'Sender Name');
					  $mail->addAddress('navas777888@gmail.com', 'Receiver Name');
					  $mail->addReplyTo('navas777888@gmail.com', 'Sender Name'); // to set the reply to
					  $mail->IsHTML(true);
					  $mail->Subject = $subject ;
					  $mail->Body = $pesan;
					  $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
				  
					  $mail->send();
					  echo "Email message sent.";
				  } catch (Exception $e) {
					  echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
				  }

	              //$mail = new PHPMailer();
					//$mail->IsSMTP();
					//$mail->SMTPDebug = 0;
					//$mail->SMTPAuth = true;
					//$mail->Host = 'smtp.gmail.com'; //smtp gmail
					//$mail->From = 'navas777888@gmail.com'; //alamat email asal
					//$mail->Port = 587; //tcp post 
					//$mail->AddAddress('manurung.togi@gmail.com'); //alamat email penerima
					//$mail->Username = 'rifkidan909@gmail.com'; //username atau email smtp yang anda miliki
					//$mail->Password = 'raider152'; // password smtp yang anda miliki
					//$mail->SetFrom('rifkidan909@gmail.com', 'test');
					//$mail->AddReplyTo('rifkidan909@gmail.com', 'Project');
					//$mail->Subject = $subject; //subjek email anda
					//$mail->Body = $pesan; //isi pesan email anda
					// $mail->SMTPOptions = array(
					// 	'ssl' => array(
					// 		'verify_peer' => false,
					// 		'verify_peer_name' => false,
					// 		'allow_self_signed' => true
					// 	)
					// );
					// $mail->isHTML(true);
					// $mail->Send();  
					//echo $data["rmsg"];

	            }
	            else {
	              $data["rmsg"]="error";
	            }
	            $this->load->view("index",$data);
			}
			else {
	              $data["rmsg"]="error";
	              redirect(base_url() . "ContactMain");
	    	}


		}


	}