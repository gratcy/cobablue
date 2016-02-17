<div class="page-nonindex container">
  <form action="<?php echo site_url('lostpwd/setpwd'); ?>" method="post">
  <input type="hidden" name="email" value="<?php echo $email; ?>">
  <input type="hidden" name="key" value="<?php echo $key; ?>">
  <div class="form-login">
    <div>
      <h1 class="title">Forgot Password Form</h1>
	<?php echo __get_error_msg(); ?>
      <ul>
        <li>
          <span>New Password</span>
          <div class="field"><input name="pass" type="password" /></div>
        </li>
        <li>
          <span>Confirm New Password</span>
          <div class="field"><input name="cpass" type="password" /></div>
        </li>
        <li class="button">
          <input name="forgot" class="btn" value="Submit" type="submit" />
        </li>
      </ul>
    </div>
  </div>
  </form>
</div>
