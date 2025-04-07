<!-- Inner Banner -->
<div class="inner-banner inner-bg4">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Sign In</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Sign In</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Start Sign In Area -->
<section class="sign-in-area ptb-100">
    <div class="container">
        <div class="section-title text-center">
            <span>Sign In</span>
            <h2>Sign In to your account!</h2>
        </div>
        <div class="contact-wrap-form log-in-width">
            <form id="login-form" action="<?=base_url('/home/aksi_login')?>" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Username or Email" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
    	                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LeF9ugqAAAAAJ5jpTL4PtZcO3TSHymtLsYqj2wK">
                    </div>
                    <div class="col-lg-6 col-sm-6 form-condition">
                        <div class="agree-label">
                            <input type="checkbox" id="chb1" name="remember">
                                <label for="chb1">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <a class="forget" href="<?=base_url('home/resetpw')?>">Forgot my password?</a>
                    </div>

                    <div class="col-12 text-center">
                        <button class="default-btn btn-two" type="button" onclick="validateCaptcha()">
                            Sign In Now
                        </button>
                    </div>

                    <div class="col-12">
                        <p class="account-desc">
                            Not a member?
                            <a href="<?=base_url('home/register')?>">Sign Up</a>
                        </p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    function validateCaptcha() {
        var response = grecaptcha.getResponse();
        if(response.length === 0) {
            alert("Please complete the CAPTCHA before submitting.");
        } else {
            document.getElementById('login-form').submit();
        }
    }
</script>
<!-- End Sign In Area -->
