       <!-- Start Sign Up Area -->
		<section class="sign-up-area ptb-100">
			<div class="container">
				<div class="section-title text-center">
                    <span>Sign Up</span>
					<h2>Create An Account!</h2>
				</div>
				<div  class="contact-wrap-form log-in-width">
					<form method="post" action="<?=base_url('/home/aksi_register')?>">
                        <p>with your social network</p>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<button class="login-social-btn" type="submit">
									<i class='bx bxl-google-plus'></i>
								</button>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4">
								<button class="login-social-btn" type="submit">
									<i class='bx bxl-facebook'></i>
								</button>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4">
								<button class="login-social-btn" type="submit">
									<i class='bx bxl-twitter' ></i>
								</button>
							</div>

							<div class="col-12">
								<div class="form-group">
									<input class="form-control" type="text" name="name" placeholder="Username">
								</div>
                            </div>
                            
                            <div class="col-12">
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="Email">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                                 <ul id="password-requirements" style="margin-top:10px; list-style: none; padding-left: 0;">
  								<li id="length-check" style="color: red;">❌ Minimal 6 karakter</li>
  								<li id="number-check" style="color: red;">❌ Mengandung angka</li>
								</ul>

								</div>
							</div>

							<div class="col-12 text-center">
								<button class="default-btn btn-two" type="submit">
									Sign Up
								</button>
							</div>

							<div class="col-12">
								<p class="account-desc">
									Already have an account? 
									<a href="<?=base_url('home/login')?>">Sign Up</a>
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<script>
  const passwordInput = document.getElementById('password');
  const lengthCheck = document.getElementById('length-check');
  const numberCheck = document.getElementById('number-check');
  const registerButton = document.querySelector('button[type="submit"]');

  function validatePasswordLive() {
    const value = passwordInput.value;
    let isValid = true;

    // Cek panjang
    if (value.length >= 6) {
      lengthCheck.textContent = '✅ Minimal 6 karakter';
      lengthCheck.style.color = 'green';
    } else {
      lengthCheck.textContent = '❌ Minimal 6 karakter';
      lengthCheck.style.color = 'red';
      isValid = false;
    }

    // Cek angka
    if (/\d/.test(value)) {
      numberCheck.textContent = '✅ Mengandung angka';
      numberCheck.style.color = 'green';
    } else {
      numberCheck.textContent = '❌ Mengandung angka';
      numberCheck.style.color = 'red';
      isValid = false;
    }

    // Aktif/nonaktifkan tombol Register
    registerButton.disabled = !isValid;
  }

  passwordInput.addEventListener('input', validatePasswordLive);
  document.addEventListener('DOMContentLoaded', validatePasswordLive); // Untuk disable awal
</script>
		<!-- End Sign Up Area -->
