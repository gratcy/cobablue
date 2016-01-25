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
        <li class="capcha full">
          Capcha Here
        </li>
        <li class="button">
          <input name="forgot" class="btn" value="Submit" type="submit" />
        </li>
      </ul>
    </div>
  </div>
  </form>
</div>
