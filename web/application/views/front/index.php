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
      <h1 class="title">Welcome To Unblockwebs</h1>
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
        <h5>Unblock websites</h5>
        <p>Access any website or app without geographic restrictions or censorship.</p>
      </li>
      <li>
        <img src="<?php echo site_url('application/views/front/images/icon-fitur-easy.png'); ?>" />
        <h5>Easy To Use</h5>
        <p>You can secure your connection and unblock websites in one click.</p>
      </li>
    </ul>
  </div>
  
  <div id="index-works">
    <h1 class="title">How Unblockwebs Works?</h1>
	<div>
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
    <ul class="clearenter">
      <li class="image left">
        <img src="<?php echo site_url('application/views/front/images/icon-bypass_proxy.png'); ?>" />
      </li>
      <li class="content right">
        <h5>Bypass Filters</h5>
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
      
  <div id="index-download">
    <h1 class="title">Download</h1>
    <ul class="clearenter">
      <li class="dl-android">
        <a href="#">
          <span class="dl-icon"></span>
          <h5>Android</h5>
        </a>
      </li>
      <li class="dl-ios">
        <a href="#">
          <span class="dl-icon"></span>
          <h5>IOS</h5>
        </a>
      </li>
      <li class="dl-windows">
        <a href="#">
          <span class="dl-icon"></span>
          <h5>Windows</h5>
        </a>
      </li>
      <li class="dl-linux">
        <a href="#">
          <span class="dl-icon"></span>
          <h5>Linux</h5>
        </a>
      </li>
    </ul>
  </div>
  
</div>

<div class="btt index-btt" title="Return To Top">
  <ul>
    <li class="next_btn floatbtn-info"><a href="#index-info"> <div><b>Info</b></div></a></li>
    <li class="next_btn floatbtn-works"><a href="#index-works"> <div><b>How Antiblock Works</b></div></a></li>
    <li class="next_btn floatbtn-feature"><a href="#index-feature"> <div><b>Features</b></div></a></li>
    <li class="next_btn floatbtn-download"><a href="#index-download"> <div><b>Download</b></div></a></li>
  </ul>
</div>
