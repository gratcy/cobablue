
<script type="text/javascript">
var captchaContainer = null;
var captchar = null;
var loadCaptcha = function() {
  captchaContainer = grecaptcha.render('captcha_container', {
	'sitekey' : '6Le2UxkTAAAAAF3MwydlfwgtO-lM-YZoW5-nvowi',
	'callback' : function(response) {
		captchar = response;
	}
  });
};
</script>
<div class="page-nonindex container">
  <form action="<?php echo site_url('register'); ?>" method="post">
  <div class="form-login form-register">
    <div>
      <h1 class="title">Register Form</h1>
	<?php echo __get_error_msg(); ?>
      <ul class="clearenter">
        <li>
          <span>Full Name</span>
          <div class="field"><input name="name" type="text" /></div>
        </li>
        <li>
          <span>Phone</span>
          <div class="field"><input name="phone" type="text" /></div>
        </li>
        <li>
          <span>Email</span>
          <div class="field"><input name="email" type="text" /></div>
        </li>
        <li>
          <span>Confirm Email</span>
          <div class="field"><input name="cemail" type="text" /></div>
        </li>
        <li>
          <span>Password</span>
          <div class="field"><input name="pass" type="password" /></div>
        </li>
        <li>
          <span>Confirm Password</span>
          <div class="field"><input name="cpass" type="password" /></div>
        </li>
        <li class="capcha full" style="margin:0 auto;text-align:center">
			<div style="margin:0 auto;text-align:center;display:inline-block">
          <div id="captcha_container"></div>
      <script src="https://www.google.com/recaptcha/api.js?onload=loadCaptcha&render=explicit" async defer></script>
      </div>
        </li>
        <li class="term full">
          By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Policy</a>.
        </li>
        <li class="button full">
          <input name="register" class="btn" value="Register" type="submit" />
        </li>
      </ul>
    </div>
  </div>
  </form>
</div>
