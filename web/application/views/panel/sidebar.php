
            <div class="sidenav">
                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->

                <div class="mainnav">
                    <ul>
                        <li><a href="<?php echo site_url('panel');?>"><span class="icon16 icomoon-icon-home-6"></span>Dashboard</a></li>
						<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4) : ?>
                        <li rel="reseller"><a href="#"><span class="icon16 icomoon-icon-transmission"></span>Create Account</a>
                        	<ul class="sub">
                                <li>
                                  <a href="<?php echo site_url('panel/create_account');?>">
                                    <span class="icon16 icomoon-icon-tags"></span>Reseller
                                  </a>
                                </li>
                                <li>
                                  <a href="<?php echo site_url('panel/reseller-tutorial');?>">
                                    <span class="icon16 icomoon-icon-book"></span>Tutorial Reseller
                                  </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if ($this -> memcachedlib -> sesresult['ulevel'] == 1) : ?>
                        <li><a href="<?php echo site_url('panel/product');?>" ><span class="icon16 icomoon-icon-quill"></span>Products</a></li>
                        <?php endif; ?>
                        <?php if ($this -> memcachedlib -> sesresult['ulevel'] == 1 || $this -> memcachedlib -> sesresult['ulevel'] == 3) : ?>
                        <li><a href="<?php echo site_url('panel/confirmation');?>" ><span class="icon16 icomoon-icon-cart-checkout"></span>Confirmation</a></li>
                        <li><a href="<?php echo site_url('panel/voucher');?>" ><span class="icon16 icomoon-icon-vcard"></span>Voucher</a></li>
                        <?php endif; ?>
                        <?php if ($this -> memcachedlib -> sesresult['ulevel'] == 1) : ?>
                        <li><a href="<?php echo site_url('panel/upload');?>" ><span class="icon16 icomoon-icon-file-2"></span>Upload</a></li>
                        <?php endif; ?>
						<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4) : ?>
                        <li rel="user_transaction">
                            <a href="#"><span class="icon16 icomoon-icon-cart"></span>Transaction<span class="notification blue">3</span></a>
                            <ul class="sub">
                                <li><a href="<?php echo site_url('panel/transaction/topup');?>"><span class="icon16 icomoon-icon-arrow-up-right"></span>Top Up</a></li>
                                <li><a href="<?php echo site_url('panel/transaction/confirm');?>"><span class="icon16 icomoon-icon-calculate-2"></span>Manual Confirmation</a></li>
                                <li><a href="<?php echo site_url('panel/transaction');?>"><span class="icon16 icomoon-icon-file"></span>History Transaction</a></li>
                               <!-- <li><a href="<?php echo site_url('panel/topup-tutorial');?>"><span class="icon16 icomoon-icon-book-2"></span>Tutorial Top Up</a></li> -->
								<!-- <li><a href="<?php echo site_url('panel/topup-tutorial');?>" ><span class="icon16 entypo-icon-help"></span>Payment Method</a></li> -->
                            </ul>
                        </li>
                        <li><a href="<?php echo site_url('panel/use-voucher');?>" ><span class="icon16 icomoon-icon-vcard"></span>Voucher</a></li>
                        <?php endif; ?>
						<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4 || $this -> memcachedlib -> sesresult['ulevel'] == 3) : ?>
                        <li rel="refferal">
                            <a href="#"><span class="icon16 icomoon-icon-tree-2"></span>Refferal<span class="notification green">2</span></a>
                            <ul class="sub">
                                <li><a href="<?php echo site_url('panel/refferal');?>"><span class="icon16 icomoon-icon-users"></span>List Refferal</a></li>
                                <li><a href="<?php echo site_url('panel/invite');?>"><span class="icon16 icomoon-icon-user-plus"></span>Invite Member</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
						<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4) : ?>
                        <li><a href="<?php echo site_url('panel/report');?>"><span class="icon16 icomoon-icon-list"></span>Report Create Account</a></li>
                        <?php endif; ?>
                        <?php if ($this -> memcachedlib -> sesresult['ulevel'] == 1) : ?>
                        <li rel="reports">
						<a href="#"><span class="icon16 icomoon-icon-pie-3"></span>Reporting<span class="notification blue">2</span></a>
						<ul class="sub">
                        <li><a href="<?php echo site_url('panel/reporting');?>" ><span class="icon16 iconic-icon-chart"></span>Report Registration</a></li>
                        <li><a href="<?php echo site_url('panel/report_reseller');?>"><span class="icon16 icomoon-icon-pie-4"></span>Report Reseller</a></li>
                        </ul>
                        </li>
                        <?php endif; ?>
                        <li><a href="<?php echo site_url('panel/support');?>" ><span class="icon16 icomoon-icon-support"></span>Support</a></li>
                        <li><a href="<?php echo site_url('panel/download');?>" ><span class="icon16 icomoon-icon-download"></span>Download Application</a></li>
                        <li><a href="<?php echo site_url('panel/settings');?>" ><span class="icon16 icomoon-icon-user"></span>Profile</a></li>
                        <?php if ($this -> memcachedlib -> sesresult['ulevel'] == 1) : ?>
                        <li><a href="<?php echo site_url('panel/users');?>" ><span class="icon16 icomoon-icon-users"></span>Users</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo site_url('panel/login/logout');?>" onclick="return confirm('<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><span class="icon16 icomoon-icon-exit"></span>Logout</a></li>
                    </ul>
                </div>
            </div><!-- End sidenav -->

        </div><!-- End #sidebar -->

<script type="text/javascript">
	if (/\/transaction|topup\-tutorial/.test(window.location.href) === true) {
		$('li[rel="user_transaction"] > a').addClass('drop');
		$('li[rel="user_transaction"] > .sub').css({'display': 'block'});
	}
	else if (/\/refferal|invite/.test(window.location.href) === true) {
		$('li[rel="refferal"] > a').addClass('drop');
		$('li[rel="refferal"] > .sub').css({'display': 'block'});
	}
	else if (/\/reseller-tutorial|create_account/.test(window.location.href) === true) {
		$('li[rel="reseller"] > a').addClass('drop');
		$('li[rel="reseller"] > .sub').css({'display': 'block'});
	}
	else if (/\/report_reseller|reporting/.test(window.location.href) === true) {
		$('li[rel="reports"] > a').addClass('drop');
		$('li[rel="reports"] > .sub').css({'display': 'block'});
	}
</script>
