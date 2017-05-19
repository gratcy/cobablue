<script src="<?php echo site_url('application/views/front/js/fancy_scroll/jquery.localscroll.js'); ?>" type="text/javascript"></script> 
<script src="<?php echo site_url('application/views/front/js/fancy_scroll/jquery.scrollTo.js'); ?>" type="text/javascript"></script> 
<script type="text/javascript">
$(document).ready(function() {
  $('.next_btn').localScroll(
    {
	  duration:800,
	  offset:{top:-36}
	}
  );
});
</script>

<div class="page-index container">
  
  <div id="index-welcome" class="display_center">
    <div class="bg_cover"></div>
    <div class="bg_overlay"></div>
    <div class="message">
      <h1 class="title">Welcome To Neverblock</h1>
      <h5>Browse the internet privately, anonymously and securely.</h5>
      <ul class="clearenter">
        <li class="next_btn"><a href="#index-info">Take a Tour</a></li>
        <li class="next_btn"><a href="#index-download">Download</a></li>
        <li><a href="<?php echo site_url('register'); ?>">Register</a></li>
      </ul>
    </div>
  </div>
  
  <div id="index-info">
    <ul class="clearenter">
      <li>
        <img src="<?php echo site_url('application/views/front/images/icon-fitur-video.png'); ?>" />
        <h5>Video from anywhere</h5>
        <p>Watch the content you want from any country on earth.</p>
      </li>
      <li>
        <img src="<?php echo site_url('application/views/front/images/icon-fitur-unblock.png'); ?>" />
        <h5>Secure websites access</h5>
        <p>Browse safely without blocked by any hackers.</p>
      </li>
      <li>
        <img src="<?php echo site_url('application/views/front/images/icon-fitur-easy.png'); ?>" />
        <h5>Easy To Use</h5>
        <p>You can secure your connection in one click.</p>
      </li>
    </ul>
  </div>
  
  <div id="index-works">
    <h1 class="title">How Neverblock Works?</h1>
	<div class="clearenter">
	  <div class="works_image">
	    <img src="<?php echo site_url('application/views/front/images/icon-works-big.png'); ?>" />
	  </div>
	
      <ul class="clearenter">
        <li>Using a VPN is like having a PO box on the internet - an address that no one can trace back to you.</li>
		<li>Instead of giving out its real IP address when you click on a website, your computer gives one of ours.</li>
		<li>The website's data is delivered to our address - and then we forward it to you, instantly and securely.</li>
		<li>The result? You appear to be wherever our server is located, allowing you to access the Internet like a local, wherever you are in the world.</li>
		<li>And snoopers and hackers online can't trace your activity back to your real address and find out who or where you are.</li>
      </ul>
	</div>
  </div>
  
  <div id="index-feature" class="clearenter">
    <h1 class="title">Features</h1>
    <div class="bg_cover"></div>
    <div class="bg_overlay"></div>
    <div class="content clearenter">
    <ul class="clearenter">
      <li class="image left">
        <img src="<?php echo site_url('application/views/front/images/icon-bypass_proxy.png'); ?>" />
      </li>
      <li class="content right">
        <h5>Access All Website</h5>
        <p>As every online web proxy, this free proxy service may allow you to access websites anonymously,
bypass website blocks/filters and browse websites blocked in your computer or mobile device.</p>
      </li>
    </ul>
    
    <ul class="clearenter">
      <li class="image right">
        <img src="<?php echo site_url('application/views/front/images/icon-fast_proxy.png'); ?>" />
      </li>
      <li class="content left">
        <h5>Fast Proxy Servers</h5>
        <p>This proxy runs on very fast web servers that are capable of handling more than 200Mb/s of bandwidth.
This allows you to browse websites anonymously and very quickly, with almost no delays or slowdowns.</p>
      </li>
    </ul>
    
    <ul class="clearenter">
      <li class="image left">
        <img src="<?php echo site_url('application/views/front/images/icon-friendly.png'); ?>" />
      </li>
      <li class="content right">
        <h5>Sysops-Friendly</h5>
        <p>This free web proxy can be useful not only for regular Internet users, but also for System and Network
Administrators to test if a website is online, verify if a website is blocked in a network, and much more.</p>
      </li>
    </ul>
    
    <ul class="clearenter">
      <li class="image right">
        <img src="<?php echo site_url('application/views/front/images/icon-anonym.png'); ?>" />
      </li>
      <li class="content left">
        <h5>Improve Anonymity</h5>
        <p>Improve your online anonymity by hiding/obfuscating your real IP address while visiting websites. For
100% online anonymity we recommend you to buy a professional and reliable VPN service.</p>
      </li>
    </ul>
    
    <ul class="clearenter">
      <li class="image left">
        <img src="<?php echo site_url('application/views/front/images/icon-web_proxy.png'); ?>" />
      </li>
      <li class="content right">
        <h5>Web Proxy Benefits</h5>
        <p>With a web proxy you can be anonymous online, hide your IP address, hide your traces online, visit
websites anonymously, save Internet bandwidth. Use this service ethically and read out terms.</p>
      </li>
    </ul>
    
    <ul class="clearenter">
      <li class="image right">
        <img src="<?php echo site_url('application/views/front/images/icon-free_proxy.png'); ?>" />
      </li>
      <li class="content left">
        <h5>Free Web Proxy</h5>
        <p>Yes, this web proxy is completely free to use and we don't ask you anything in exchange (except to use it
ethically). If you have found this web proxy useful and cool, please share it with your friends.</p>
      </li>
    </ul>
    </div>
  </div>
  
  <div id="index-package">
    <h1 class="title">Package</h1>
    <ul class="clearenter">
      
      <li class="package package-1">
        <h2>Personal 1</h2>
        <h5>IDR 100.000</h5>
        <ul>
          <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span>1 Years</span></li>
        </ul>
        <a class="buy-button" href="https://neverblock.me/panel/transaction/topup" target="_blank"><i class="fa fa-tag" aria-hidden="true"></i> <span>Buy</span></a>
      </li>
      
      <li class="package package-2">
        <h2>Personal 2</h2>
        <h5>IDR 250.000</h5>
        <ul>
          <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span>3 Years</span></li>
        </ul>
        <a class="buy-button" href="https://neverblock.me/panel/transaction/topup" target="_blank"><i class="fa fa-tag" aria-hidden="true"></i> <span>Buy</span></a>
      </li>
      
      <li class="package package-3">
        <h2>Personal 3</h2>
        <h5>IDR 450.000</h5>
        <ul>
          <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span>5 Years</span></li>
        </ul>
        <a class="buy-button" href="https://neverblock.me/panel/transaction/topup" target="_blank"><i class="fa fa-tag" aria-hidden="true"></i> <span>Buy</span></a>
      </li>
      
      <li class="package package-4">
        <h2>Retail</h2>
        <h5>IDR 400.000</h5>
        <ul>
          <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span>5 Years</span></li>
          <li><i class="fa fa-star" aria-hidden="true"></i> <span>5 Point</span></li>
          <li><i class="fa fa-users" aria-hidden="true"></i> <span>Reseller</span></li>
        </ul>
        <a class="buy-button" href="https://neverblock.me/panel/transaction/topup" target="_blank"><i class="fa fa-tag" aria-hidden="true"></i> <span>Buy</span></a>
      </li>
      
    </ul>
  </div>
  
  <div id="index-download">
    <h1 class="title">Download</h1>
    <ul class="clearenter">
      <li class="dl-android">
        <a href="<?php echo $file[1] -> file; ?>" target="_blank">
          <span class="dl-icon">
            <img class="img-top" src="<?php echo site_url('application/views/front/images/icon-androidlogo.png'); ?>" />
            <img class="img-bottom" src="<?php echo site_url('application/views/front/images/icon-androidlogo-hover.png'); ?>" />
          </span>
          <h5>Android</h5>
        </a>
		<div class="tutorial-tombol">
          <a href="<?php echo $file[1] -> file; ?>" target="_blank">Download</a>
          <a href="<?php echo site_url('application/views/front/file/tutorial_neverblock-android.pdf'); ?>" target="_blank">Guide</a>
        </div>
      </li>
      <li class="dl-osx">
        <a href="<?php echo $file[2] -> file; ?>" target="_blank">
          <span class="dl-icon">
            <img class="img-top" src="<?php echo site_url('application/views/front/images/icon-osxlogo.png'); ?>" />
            <img class="img-bottom" src="<?php echo site_url('application/views/front/images/icon-osxlogo-hover.png'); ?>" />
          </span>
          <h5>OS X</h5>
        </a>
        <div class="tutorial-tombol">
          <a href="<?php echo $file[2] -> file; ?>" target="_blank">Download</a>
          <a href="<?php echo site_url('application/views/front/file/tutorial_neverblock-osx.pdf'); ?>" target="_blank">Guide</a>
        </div>
      </li>
      <li class="dl-windows">
        <a href="<?php echo $file[3] -> file; ?>"  target="_blank">
          <span class="dl-icon">
            <img class="img-top" src="<?php echo site_url('application/views/front/images/icon-winlogo.png'); ?>" />
            <img class="img-bottom" src="<?php echo site_url('application/views/front/images/icon-winlogo-hover.png'); ?>" />
          </span>
          <h5>Windows</h5>
        </a>
		<div class="tutorial-tombol">
          <a href="<?php echo $file[3] -> file; ?>" target="_blank">Download</a>
          <a href="<?php echo site_url('application/views/front/file/tutorial_neverblock-windows.pdf'); ?>" target="_blank">Guide</a>
        </div>
      </li>
      <li class="dl-ios">
        <a href="<?php echo $file[4] -> file; ?>"  target="_blank">
          <span class="dl-icon">
            <img class="img-top" src="<?php echo site_url('application/views/front/images/icon-applelogo.png'); ?>" />
            <img class="img-bottom" src="<?php echo site_url('application/views/front/images/icon-applelogo-hover.png'); ?>" />
          </span>
          <h5>IOS</h5>
        </a>
        <div class="tutorial-tombol">
          <a href="https://appsto.re/id/6Mhhib.i" target="_blank">Download</a>
        </div>
      </li>
      <li class="dl-linux">
        <div>
          <span class="dl-icon">
            <img src="<?php echo site_url('application/views/front/images/icon-linuxlogo.png'); ?>" />
          </span>
          <h5>Linux</h5>
		  <b>Coming Soon</b>
        </div>
      </li>
    </ul>
  </div>
  
  <!--
  <div id="index-contact">
    <h1 class="title">Contact Us</h1>
    <div class="bg_cover"></div>
    <div class="bg_overlay"></div>
    <div class="content clearenter">
      <div class="email-phone">
        <b>Email : <a href="mailto:admin@neverblock.me">admin@neverblock.me</a></b> | 
        <b>Phone : -</b>
      </div>
      <div class="contact-form">
        <b>Please fill out the form below to get more information about neverblock.</b>
        <ul class="clearenter">
        
          <li class="left">
            <div>
              <input name="name" type="text" placeholder="Insert your name" />
            </div>
            <div>
              <input name="email" type="text" placeholder="Insert your email" />
            </div>
            <div>
              <input name="phone" type="text" placeholder="Insert your phone" />
            </div>
            <div>
              <input name="title" type="text" placeholder="Insert the title of your message" />
            </div>
          </li>
          
          <li class="right">
            <div>
              <textarea name="message" required="" cols="" rows="" placeholder="Insert Your Message"></textarea>
            </div>
          </li>
          
        </ul>
        
        <div class="submit">
          <div>
            <span>capcha here</span>
          </div>
          <div>
            <span><input name="submit" class="btn" value="Submit" type="submit"></span>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  -->
  
</div>

<div class="btt index-btt" title="Return To Top">
  <ul>
    <li class="next_btn floatbtn-info"><a href="#index-info"> <div><b>Info</b></div></a></li>
    <li class="next_btn floatbtn-works"><a href="#index-works"> <div><b>How Neverblock Works</b></div></a></li>
    <li class="next_btn floatbtn-feature"><a href="#index-feature"> <div><b>Features</b></div></a></li>
    <li class="next_btn floatbtn-package"><a href="#index-package"> <div><b>Package</b></div></a></li>
    <li class="next_btn floatbtn-download"><a href="#index-download"> <div><b>Download</b></div></a></li>
    <!--<li class="next_btn floatbtn-contact"><a href="#index-contact"> <div><b>Contact Us</b></div></a></li>-->
  </ul>
</div>



<div id="iklan_popoup_cache"></div>
<script src="<?php echo site_url('application/views/front/js/popup_expire/popup_script.js'); ?>" type="text/javascript"></script> <!-- adv absolute close -->
<script type='text/javascript' src='<?php echo site_url('application/views/front/js/popup_expire/popup_cookie.js'); ?>'></script> <!-- cookie -->
<script>
$(window).load(function() {
    var popup_check_cookie = $.cookie("iklan_popup_cookie");	
	if(popup_check_cookie != 1){
	  $("#iklan_popoup_cache").html('<iframe id="iklan_popup_expire" src="https://www.youtube.com/embed/DVfeLO1RYyY?autoplay=1" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen></iframe>');
	  $("iframe#iklan_popup_expire").iklan_popup_expire({img: "https://neverblock.me/application/views/front/js/popup_expire/popup_close.png", css: "https://neverblock.me/application/views/front/js/popup_expire/popup_style.css"});
	}
  
});
</script>
