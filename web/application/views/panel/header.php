<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script>
  //~ (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  //~ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  //~ m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  //~ })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  //~ ga('create', 'UA-98825074-1', 'auto');
  //~ ga('send', 'pageview');

</script>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Never Block - User Panel</title>
    <meta name="author" content="SuggeElson" />
    <meta name="application-name" content="Never Block - User Panel" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normal mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Le styles -->
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
<!--
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
-->
    <!-- Text -->
<!--
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> 
-->
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!-- Core stylesheets do not remove -->
    <link id="bootstrap" href="<?php echo site_url('application/views/panel/assets/css/bootstrap/bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('application/views/panel/assets/css/bootstrap/bootstrap-theme.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('application/views/panel/assets/css/supr-theme/jquery.ui.supr.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo site_url('application/views/panel/assets/css/icons.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Plugins stylesheets -->
    <link href="<?php echo site_url('application/views/panel/assets/plugins/misc/qtip/jquery.qtip.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('application/views/panel/assets/plugins/misc/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('application/views/panel/assets/plugins/misc/search/tipuesearch.css'); ?>" type="text/css" rel="stylesheet" />

    <link href="<?php echo site_url('application/views/panel/assets/plugins/forms/uniform/uniform.default.css'); ?>" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="<?php echo site_url('application/views/panel/assets/css/main.css'); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo site_url('application/views/panel/assets/plugins/forms/select/select2.css'); ?>" rel="stylesheet" type="text/css" /> 

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="<?php echo site_url('application/views/panel/assets/css/custom.css'); ?>" rel="stylesheet" type="text/css" /> 
    <script  type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/jquery-1.9.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/js.js'); ?>"></script>

    <!--[if IE 8]><link href="css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="js/libs/respond.min.js"></script>
    <![endif]-->
    
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo site_url('application/views/panel/assets/images/favicon.ico'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-144-precomposed.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-114-precomposed.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-72-precomposed.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-57-precomposed.png'); ?>" />

    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="application-name" content="Supr"/> 
    <meta name="msapplication-TileColor" content="#3399cc"/> 

    <!-- Load modernizr first -->
    <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/libs/modernizr.js'); ?>"></script>

    </head>
      <script>
      var SITEURL = '<?php echo site_url('panel/');?>';
      </script>
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
        
    <div id="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo site_url('panel/');?>" title="Never Block Panel">Neverblock<span class="slogan">Panel</span></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon16 icomoon-icon-arrow-4"></span>
                </button>
            </div> 
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo site_url('panel');?>" title="Back to dashboard?"><span class="icon16 icomoon-icon-screen-2"></span> <span class="txt">Dashboard</span></a>
                    </li>
                    <li class="active top-gotoweb">
                      <a href="<?php echo site_url(); ?>" title="Back to site?"><span>Go To Website</span></a>
                    </li>
                </ul>
              
                <ul class="nav navbar-right usernav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <img src="<?php echo __get_avatar($this -> memcachedlib -> sesresult['uavatar'],2); ?>" alt="" class="image" /> 
                            <span class="txt"><?php echo $this -> memcachedlib -> sesresult['uemail']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu">
                                <ul>
                                    <li><a href="<?php echo site_url('panel/settings');?>"><span class="icon16 icomoon-icon-user"></span>Edit profile</a></li>
                                    <li><a href="<?php echo site_url('panel/invite');?>"><span class="icon16 icomoon-icon-plus"></span>Invite Member</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('panel/login/logout');?>" onclick="return confirm('<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><span class="icon16 icomoon-icon-exit"></span><span class="txt"> Logout</span></a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </nav><!-- /navbar --> 

    </div><!-- End #header -->

    <div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        
        <!--Left Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide Left Sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="<?php echo site_url('panel/transaction');?>" title="Transaction" class="tip"><span class="icon24 icomoon-icon-cart"></span></a></li>
                    <li><a href="<?php echo site_url('panel/refferal');?>" title="Refferal" class="tip"><span class="icon24 icomoon-icon-tree-2" style="margin-left: 2px;"></span></a></li>
                    <li><a href="<?php echo site_url('panel/download');?>" title="Download Application" class="tip"><span class="icon24 icomoon-icon-download"></span></a></li>
                    <li><a href="<?php echo site_url('panel/support');?>" title="Support" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                </ul>
            </div><!-- End search -->            
