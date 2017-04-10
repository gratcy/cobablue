<?php
$lastlogin = explode('*', $this -> memcachedlib -> sesresult['ulastlogin']);
?>
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Dashboard</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="#" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-screen-2"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul>

                </div><!-- End .heading-->

                <!-- Build page from here: -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default chart gradient">
                            <div class="panel-heading">
                                <h4>
                                    <span class="icon16 icomoon-icon-meter"></span>
                                    <span>History Login</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="panel-body" style="padding-bottom:0;">
					<p>Hello, <?php echo $this -> memcachedlib -> sesresult['uemail']; ?></p>
					<p>Login Today <?php echo __get_date($this -> memcachedlib -> sesresult['ldate'],3) . ' with IP Address ' . long2ip($this -> memcachedlib -> sesresult['lip']); ?></p>
					<p>Last Login <?php echo __get_date($lastlogin[1],3) . ' with IP Address ' . long2ip($lastlogin[0]); ?></p>
					<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4) : ?>
					<p>Rerreral Code: <b><a href="<?php echo site_url('register/?ref='.$this -> memcachedlib -> sesresult['urefcode']); ?>"><?php echo site_url('register/?ref='.$this -> memcachedlib -> sesresult['urefcode']); ?></a> (<?php echo $this -> memcachedlib -> sesresult['urefcode']; ?>)</b></p>
					<p>Point: <b><?php echo __get_point($this -> memcachedlib -> sesresult['uid']); ?></b></p>
					<p>User Expire: <b><?php echo ($expire[0] -> uexpire < time() ? 'Expired' : date('d/m/Y H:i',$expire[0] -> uexpire)); ?></b></p>
					<?php endif; ?>
					</div>
					</div>
					</div>
				</div>
				<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4) : ?>
                <div class="row">

                    <div class="col-lg-6">

                        <div class="panel panel-default chart gradient">
                            <div class="panel-heading">
                                <h4>
                                    <span class="icon16 icomoon-icon-file"></span>
                                    <span>Recent Transaction</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="panel-body" style="padding-bottom:0;">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="col-lg-1">Product</th>
                                            <th class="col-lg-1">Transaction No.</th>
                                            <th>Date</th>
                                            <th>Period</th>
                                            <th>Price</th>
                                            <th class="col-lg-1">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											foreach($transaction as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo $v -> pname; ?></td>
                                            <td><?php echo $v -> tno; ?></td>
                                            <td><?php echo __get_date($v -> tdate,3); ?></td>
                                            <td><?php echo __get_date($v -> tfrom,1) .' - ' . __get_date($v -> tto,1); ?></td>
                                            <td><?php echo __get_rupiah($v -> ttotal); ?></td>
                                            <td><?php echo __get_status_transaction($v -> tstatus,1); ?></td>
                                          </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth"></div>
                        </div><!-- End .panel -->

                    </div><!-- End .span6 -->

                </div><!-- End .row -->
                <div class="row">

                    <div class="col-lg-6">

                        <div class="panel panel-default chart gradient">
                            <div class="panel-heading">
                                <h4>
                                        <span class="icon16 icomoon-icon-users"></span>
                                    <span>Recent Refferal</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="panel-body" style="padding-bottom:0;">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Email</th>
                                            <th>Ref Code</th>
                                            <th class="col-lg-1">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											foreach($refferal as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo $v -> uemail; ?></td>
                                            <td><?php echo $v -> urefcode; ?></td>
                                            <td><?php echo __get_status($v -> ustatus,1);?></td>
                                          </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth"></div>
                        </div><!-- End .panel -->

                    </div><!-- End .span6 -->

                </div><!-- End .row -->
                <?php endif; ?>

                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
