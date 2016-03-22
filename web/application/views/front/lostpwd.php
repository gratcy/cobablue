
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
  <form action="<?php echo site_url('lostpwd'); ?>" method="post">
  <div class="form-login">
    <div>
      <h1 class="title">Forgot Password Form</h1>
	<?php echo __get_error_msg(); ?>
      <ul>
        <li>
          <span>Email</span>
          <div class="field"><input name="email" type="text" /></div>
        </li>
        <li class="capcha">
			<div style="margin:0 auto;text-align:center;display:inline-block">
          <div id="captcha_container"></div>
      <script src="https://www.google.com/recaptcha/api.js?onload=loadCaptcha&render=explicit" async defer></script>
      </div>
        </li>
        <li class="button">
          <input name="forgot" class="btn" value="Submit" type="submit" />
        </li>
      </ul>
    </div>
  </div>
  </form>
</div>
