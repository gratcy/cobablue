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
      <h1 class="title">Welcome To Antiblock</h1>
      <h5>Lorem ipsum dolor sit amet</h5>
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
    <h1 class="title">How Antiblock Works?</h1>
    <ul class="clearenter">
      <li class="without">
        <h5>Without Antiblock</h5>
        <ul>
          <li>teadfasga</li>
          <li>teadfasga</li>
        </ul>
      </li>
      <li class="with">
        <h5>With Antiblock</h5>
        <ul>
          <li>teadfasga</li>
          <li>teadfasga</li>
        </ul>
      </li>
    </ul>
  </div>
  
  <div id="index-feature" class="index-feature">
    <ul class="clearenter">
      <li class="image left">
        <div class="flex_thumb"><img src="<?php echo site_url('application/views/front/images/icon-androidlogo.png'); ?>" /></div>
      </li>
      <li class="content right">
        <h5>Feature Title</h5>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
      </li>
    </ul>
  </div>
  
  <div class="index-feature">
    <ul class="clearenter">
      <li class="image right">
        <div class="flex_thumb"><img src="<?php echo site_url('application/views/front/images/icon-androidlogo.png'); ?>" /></div>
      </li>
      <li class="content left">
        <h5>Feature Title</h5>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
      </li>
    </ul>
  </div>
  
  <div class="index-feature">
    <ul class="clearenter">
      <li class="image left">
        <div class="flex_thumb"><img src="<?php echo site_url('application/views/front/images/icon-androidlogo.png'); ?>" /></div>
      </li>
      <li class="content right">
        <h5>Feature Title</h5>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
      </li>
    </ul>
  </div>
  
  <div class="index-feature">
    <ul class="clearenter">
      <li class="image right">
        <div class="flex_thumb"><img src="<?php echo site_url('application/views/front/images/icon-androidlogo.png'); ?>" /></div>
      </li>
      <li class="content left">
        <h5>Feature Title</h5>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
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
