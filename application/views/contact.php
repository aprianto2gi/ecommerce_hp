
<section class="page-wrapper">
	<div class="contact-section">
		<div class="container">
			<div class="row">
				<!-- Contact Form -->
				<div class="contact-form col-md-6 col-xs-12" >
					<form class="form-horizontal" id="contact-form" method="post" action="<?php echo base_url(); ?>ContactMain/submit" role="form">
					
						<div class="form-group">
							<input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
						</div>
						
						<div class="form-group">
							<input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
						</div>
						
						<div class="form-group">
							<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
						</div>
						
						<div class="form-group">
							<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>	
						</div>
						<?php if(isset($rmsg)){ ?>
						<?php if($rmsg=="ok"){?>
						<div id="mail-success" class="success">
							Thank you. The Mailman is on His Way :)
						</div>
						<?php }else{?>
						<div id="mail-fail" class="error">
							Sorry, don't know what happened. Try later :(
						</div>
						<?php }}?>
						<div id="cf-submit">
							<input type="submit" id="contact-submit" class="btn btn-primary" value="Submit">
						</div>						
						
					</form>
				</div>
				<!-- ./End Contact Form -->
				
				<!-- Contact Details -->
				<div class="contact-details col-md-6 col-xs-12" >
					<div class="col-md-12 col-xs-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47545.041816761375!2d106.84429400195674!3d-6.189115496201449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sNational%20Monument!5e0!3m2!1sen!2sid!4v1601350835372!5m2!1sen!2sid" width="350" height="165" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
					<div class="col-md-6 col-xs-12 well" style="margin-left: 13px;">
						<ul class="contact-short-info" >
							<li>
								<i class="tf-ion-ios-home"></i>
								<span>Togi Aprianto</span>
							</li>
							<li>
								<i class="tf-ion-android-phone-portrait"></i>
								<span>Phone: +6282372489444</span>
							</li>
							<li>
								<i class="tf-ion-android-mail"></i>
								<span>Email: togi.apr@gmail.com</span>
							</li>
						</ul>
					</div>					
					<!-- Footer Social Links -->
					
					<!--/. End Footer Social Links -->
				</div>
				<!-- / End Contact Details -->
					
				
			
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div>
</section>

	

 

	

  





