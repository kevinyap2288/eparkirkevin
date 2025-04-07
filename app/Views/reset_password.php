   <!-- Start Sign Up Area -->
		<section class="sing-up-area ptb-100">
			<div class="container">
				<div class="section-title text-center">
                    <span>Reset Password</span>
					<h2>Reset Your Password!</h2>
				</div>
				<div class="contact-wrap-form log-in-width">
					<form method="post" action="<?= base_url('home/reset_pass/'.$token) ?>">
						<div class="row">
                            
                            <div class="col-12">
								<div class="form-group">
									<input type="hidden" name="token" value="<?=$token?>">
									<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                                 <ul id="password-requirements" style="margin-top:10px; list-style: none; padding-left: 0;">
  								<li id="length-check" style="color: red;">❌ Minimal 6 karakter</li>
  								<li id="number-check" style="color: red;">❌ Mengandung angka</li>
								</ul>
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
