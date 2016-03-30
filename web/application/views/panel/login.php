<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>NeverBlock User Panel</title>
    <meta name="author" content="SuggeElson" />
    <meta name="application-name" content="NeverBlock.Me - User Panel" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normla mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Le styles -->
    <link href="<?php echo site_url('application/views/panel/assets/css/bootstrap/bootstrap.css');?>" rel="stylesheet" />
    <link href="<?php echo site_url('application/views/panel/assets/css/bootstrap/bootstrap-responsive.css'); ?>" rel="stylesheet" />
    <link href="<?php echo site_url('application/views/panel/assets/css/supr-theme/jquery.ui.supr.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo site_url('application/views/panel/assets/css/icons.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('application/views/panel/assets/plugins/forms/uniform/uniform.default.css'); ?>" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="<?php echo site_url('application/views/panel/assets/css/main.css'); ?>" rel="stylesheet" type="text/css" /> 

    <!--[if IE 8]><link href="<?php echo site_url('application/views/panel/assets/css/ie8.css'); ?>" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/libs/excanvas.min.js'); ?>"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/libs/respond.min.js'); ?>"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo site_url('application/views/panel/assets/images/favicon.ico'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-144-precomposed.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-114-precomposed.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-72-precomposed.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo site_url('application/views/panel/assets/images/apple-touch-icon-57-precomposed.png'); ?>" />

    <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/libs/modernizr.js'); ?>"></script>

    </head>
      
    <body class="loginPage">

    <div class="container">

        <div id="header">

            <div class="row">

                <div class="navbar">
                    <div class="container panel-top-login">
                        <a class="navbar-brand" href="<?php echo site_url('panel'); ?>" title="NeverBlock User Panel">Never Block<span class="slogan">Panel</span></a>
                        <!--<div class="top-gotoweb top-gotoweb-login"><a href="index.php"><span>Go To Website</span></a></div>-->
                        <ul class="nav navbar-right usernav clearenter">
                          <li class="active top-gotoweb">
                            <a href="<?php echo site_url(); ?>" title="Back to site?"><span>Go To Website</span></a>
                          </li>
                        </ul>
                    </div>
                </div><!-- /navbar -->

            </div><!-- End .row -->

        </div><!-- End #header -->

    </div><!-- End .container -->    

    <div class="container">

        <div class="loginContainer">
            <form class="form-horizontal" method="post" action="<?php echo site_url('panel/login/logging');?>" id="loginForm" role="form" >
			<?php echo __get_error_msg(); ?>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="username">Email:</label>
                    <div class="col-lg-12">
                        <input id="username" type="text" name="uemail" class="form-control" value="" placeholder="Enter your email...">
                        <span class="icon16 icomoon-icon-user right gray marginR10"></span>
                    </div>
                </div><!-- End .form-group  -->
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="password">Password:</label>
                    <div class="col-lg-12">
                        <input id="password" type="password" name="upass" placeholder="Enter your password..." value="" class="form-control">
                        <span class="icon16 icomoon-icon-lock right gray marginR10"></span>
                    </div>
                </div><!-- End .form-group  -->
                <div class="form-group">
                    <div class="col-lg-12 clearfix form-actions">
                        <div class="checkbox left">
                            <label><input type="checkbox" id="keepLoged" value="Value" class="styled" name="remember" /> Keep me logged in</label>
                            <br />
                            <label><a href="<?php echo site_url('lostpwd');?>">Lost password!</a></label>
                        </div>
                        <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Login</button>
                    </div>
                </div><!-- End .form-group  -->
            </form>
        </div>
    </div><!-- End .container -->

    <!-- Le javascript
    ================================================== -->
    <script  type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/jquery-1.9.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/js/bootstrap/bootstrap.js'); ?>"></script>  
    <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/plugins/forms/validate/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('application/views/panel/assets/plugins/forms/uniform/jquery.uniform.min.js'); ?>"></script>

     <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            //------------- Options for Supr - admin tempalte -------------//
            var supr_Options = {
                rtl:false//activate rtl version with true
            }
            //rtl version
            if(supr_Options.rtl) {
                localStorage.setItem('rtl', 1);
                $('#bootstrap').attr('href', '<?php echo site_url('application/views/panel/assets/css/bootstrap/bootstrap.rtl.min.css'); ?>');
                $('#bootstrap-responsive').attr('href', '<?php echo site_url('application/views/panel/assets/css/bootstrap/bootstrap-responsive.rtl.min.css'); ?>');
                $('body').addClass('rtl');
                $('#sidebar').attr('id', 'sidebar-right');
                $('#sidebarbg').attr('id', 'sidebarbg-right');
                $('.collapseBtn').addClass('rightbar').removeClass('leftbar');
                $('#content').attr('id', 'content-one')
            } else {localStorage.setItem('rtl', 0);}
            
            $("input, textarea, select").not('.nostyle').uniform();
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }  
                },
                messages: {
                    username: {
                        required: "Fill me please",
                        minlength: "My name is bigger"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "My password is more that 6 chars"
                    }
                }   
            });
        });
    </script> 
    </body>
</html>
