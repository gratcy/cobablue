
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98825074-1', 'auto');
  ga('send', 'pageview');

</script>
<head>
<title>NeverBlock - Browse the internet privately, anonymously and securely.</title>
<meta name="description" content="NeverBlock - Browse the internet privately, anonymously and securely."/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<link rel="image_src" href="<?php echo site_url('application/views/front/images/logo-share.png'); ?>" / >
<link href="<?php echo site_url('application/views/front/images/favicon.ico'); ?>" rel="icon" type="image/ico" />
<link href="<?php echo site_url('application/views/front/css/reset.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('application/views/front/css/fonts.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url('application/views/front/css/rancak.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo site_url('application/views/front/js/jquery-1.11.0.min.js'); ?>"></script>  
<script type="text/javascript" src="<?php echo site_url('application/views/front/js/jquery-migrate-1.2.1.min.js'); ?>"></script>       
</head>
<body>
<?php if (!preg_match('/mobile/i',$_SERVER['HTTP_USER_AGENT'])) : ?>
<div class="se-pre-con"></div>
<?php endif; ?>
<div class="menu-mobile-cover"></div>

<header>
  <div class="sticky-download">
    <a href="javascript:void(0)" class="sd-close content_center" id="sd-close"><span>x</span></a>
    <?php if (!preg_match('/Mac/i', $_SERVER['HTTP_USER_AGENT'])) : ?>
    <a href="https://play.google.com/store/apps/details?id=de.blinkt.bluenexia" class="sd-right">
	<?php else : ?>
    <a href="https://appsto.re/id/6Mhhib.i" class="sd-right">
	<?php endif; ?>
      <div class="sd-icon content_center"><img src="<?php echo site_url('application/views/front/images/neverblock-icon-40.png'); ?>" /></div>
      <div class="sd-info clearenter">
        <b>Neverblock App</b>
        <span>Install</span>
        <div>Browse the internet privately, anonymously and securely.</div>
      </div>
    </a>
  </div>

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
        <li class="next_btn menu-mobile-only"><a href="<?php echo ($_SERVER['REQUEST_URI'] == '/' ? '' : site_url('/'))?>#index-welcome">Home</a></li>
        <li class="next_btn menu-mobile-only"><a href="<?php echo ($_SERVER['REQUEST_URI'] == '/' ? '' : site_url('/'))?>#index-info">Info</a></li>
        <li class="next_btn menu-mobile-only"><a href="<?php echo ($_SERVER['REQUEST_URI'] == '/' ? '' : site_url('/'))?>#index-works">How Neverblock Works</a></li>
        <li class="next_btn menu-mobile-only"><a href="<?php echo ($_SERVER['REQUEST_URI'] == '/' ? '' : site_url('/'))?>#index-feature">Features</a></li>
        <li class="next_btn menu-mobile-only"><a href="<?php echo ($_SERVER['REQUEST_URI'] == '/' ? '' : site_url('/'))?>#index-download">Download</a></li>
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
