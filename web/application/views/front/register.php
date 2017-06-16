
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="page-nonindex container">
  <form action="<?php echo site_url('register'); ?>" method="post">
  <input type="hidden" name="ref" value="<?php echo $ref; ?>">
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
          <div class="g-recaptcha" data-sitekey="6Le2UxkTAAAAAF3MwydlfwgtO-lM-YZoW5-nvowi"></div>
      </div>
        </li>
        <li class="term full" style="color:red">
          Free VPN access VIP for 2 weeks. Unblock website encrypt your internet traffic, Wifi and Hacker Protection
        </li>
        <li class="term full">
          By clicking Sign Up, you agree to our <a href="<?php echo site_url('page/tos'); ?>">Terms</a> and that you have read our <a href="<?php echo site_url('page/privacy-policy'); ?>">Data Policy</a>.
        </li>
        <li class="button full">
          <input name="register" class="btn" value="Register" type="submit" />
        </li>
      </ul>
    </div>
  </div>
  </form>
</div>
