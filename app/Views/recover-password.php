   <!-- Start Sign Up Area -->
		<section class="sing-up-area ptb-100">
			<div class="container">
				<div class="section-title text-center">
                    <span>Reset Password</span>
					<h2>Reset Your Password!</h2>
					<p>
                        Enter the email of your account to reset the password. Then you 
                        will receive a link to email to reset the password. If you have 
                        any issue about reset password <a href="contact.html">contact us.</a> 
                    </p>
				</div>
				<div class="contact-wrap-form log-in-width">
					<form method="post" action="<?=base_url('home/send_reset_link')?>">
						<div class="row">
                            
                            <div class="col-12">
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="Enter Your Email">
								</div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
								<a class="recover-login" href="<?=base_url('home/login')?>">Sign In in your account</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<p class="recover-register">
									Not a member?
									<a href="sign-up.html">Sign Up</a>
								</p>
							</div>

							<div class="col-12 text-center">
								<button class="default-btn btn-two" type="submit">
									Reset Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- End Sign Up Area -->
