
            <div class="sidenav">
                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->

                <div class="mainnav">
                    <ul>
                        <li><a href="<?php echo site_url('panel');?>"><span class="icon16 icomoon-icon-home-6"></span>Dashboard</a></li>
                        <li rel="stuff">
                            <a href="#"><span class="icon16 icomoon-icon-cart"></span>Transaction<span class="notification blue">3</span></a>
                            <ul class="sub">
                                <li><a href="<?php echo site_url('panel/transaction');?>"><span class="icon16 icomoon-icon-file"></span>Transaction</a></li>
                                <li><a href="<?php echo site_url('panel/transaction/topup');?>"><span class="icon16 icomoon-icon-arrow-up-right"></span>Top Up</a></li>
                                <li><a href="<?php echo site_url('panel/transaction/confirm');?>"><span class="icon16 icomoon-icon-calculate-2"></span>Confirm Payment</a></li>
                            </ul>
                        </li>
                        <li rel="media">
                            <a href="#"><span class="icon16 icomoon-icon-tree-2"></span>Refferal<span class="notification green">2</span></a>
                            <ul class="sub">
                                <li><a href="<?php echo site_url('panel/refferal');?>"><span class="icon16 icomoon-icon-users"></span>List Refferal</a></li>
                                <li><a href="<?php echo site_url('panel/invite');?>"><span class="icon16 icomoon-icon-user-plus"></span>Invite Member</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo site_url('panel/support');?>" ><span class="icon16 icomoon-icon-support"></span>Support</a></li>
                        <li><a href="<?php echo site_url('panel/download');?>" ><span class="icon16 icomoon-icon-download"></span>Download Application</a></li>
                        <li><a href="<?php echo site_url('panel/settings');?>" ><span class="icon16 icomoon-icon-user"></span>Profile</a></li>
                        <li><a href="<?php echo site_url('panel/login/logout');?>" onclick="return confirm('<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><span class="icon16 icomoon-icon-exit"></span>Logout</a></li>
                    </ul>
                </div>
            </div><!-- End sidenav -->

        </div><!-- End #sidebar -->

