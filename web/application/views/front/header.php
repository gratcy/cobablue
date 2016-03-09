<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Antiblock</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<link href="<?php echo site_url('application/views/front/css/reset.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('application/views/front/css/fonts.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('application/views/front/css/rancak.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo site_url('application/views/front/js/jquery-1.11.0.min.js'); ?>"></script>  
<script type="text/javascript" src="<?php echo site_url('application/views/front/js/jquery-migrate-1.2.1.min.js'); ?>"></script>       
</head>
<body>
<div class="se-pre-con"></div>
<div class="menu-mobile-cover"></div>

<header>
  <div class="menu-mobile">
    <input name="menu-show" id="menu-show" type="button" />
    <input name="menu-hide" id="menu-hide" type="button" style="display:none;" />
  </div>
  
  <div class="container">
  
    <div class="logo display_center">
      <a href="<?php echo site_url(); ?>"><img src="<?php echo site_url('application/views/front/images/logo.png'); ?>" /></a>
    </div>
    
    <menu>
      <ul class="clearenter">
		<?php if ($this -> memcachedlib -> login) : ?>
        <li><a href="<?php echo site_url('panel'); ?>">My Account</a></li>
        <li><a href="<?php echo site_url('panel/login/logout'); ?>">Logout</a></li>
        <?php else : ?>
        <li><a href="<?php echo site_url('panel/login'); ?>">Login</a></li>
        <li><a href="<?php echo site_url('register'); ?>">Register</a></li>
        <?php endif; ?>
      </ul>
    </menu>
    
  </div>
</header>

<section>