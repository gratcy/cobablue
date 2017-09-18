        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Transaction</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-file"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Transaction</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-file"></span>
                                        <span>Transaction</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
			<?php echo __get_error_msg(); ?>
									
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="ch">#</th>
                                            <th class="col-lg-1">Type</th>
                                            <th class="col-lg-1">Product</th>
                                            <th class="col-lg-2">Transaction No.</th>
                                            <th>Date</th>
                                            <th>Period / Points</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th class="col-lg-1">Status</th>
                                            <th style="width:10%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($transaction as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo ($page * $i); ?>.</td>
                                            <td><?php echo __get_product_type($v -> ptype,1); ?></td>
                                            <td><?php echo $v -> pname; ?></td>
                                            <td>#<?php echo $v -> tno; ?></td>
                                            <td><?php echo __get_date($v -> tdate,3); ?></td>
                                            <td><?php echo ($v -> ptype == 0 ? __get_date($v -> tfrom,1) .' - ' . __get_date($v -> tto,1) : 'Retail (' . $v -> tpoint .' Points)'); ?></td>
                                            <td><?php echo __get_rupiah($v -> ttotal); ?></td>
                                            <td>
												<?php if ($v -> ttotalhash > $v -> ttotal && $v -> tapiinv > 0) : ?>
												Mohon sebelumnya dituliskan berita: <b>INVOICE-<?php echo $v -> tapiinv; ?></b> pada kolom berita transfer.
												<br /> Atau jika via ATM silahkan transfer dengan jumlah: <b><?php echo __get_rupiah($v -> ttotalhash); ?></b>.
												<?php endif; ?>
                                            </td>
                                            <td><?php echo __get_date($v -> tduedate,3); ?></td>
                                            <td><?php echo ($v -> tduedate < time() && $v -> tstatus != 2 ? 'Expired' : __get_status_transaction($v -> tstatus,1)); ?></td>
                                            <td>
                                            <div class="controls center">
												<?php if ($v -> tstatus == 0 && $v -> tduedate > time()) : ?>
                                                    <a href="<?php echo site_url('panel/transaction/confirm/?tno=' . $v -> tno); ?>" title="Confirm Transaction" class="tip"><span class="icon12 icomoon-icon-cart"></span></a>
                                                    <a href="<?php echo site_url('panel/transaction/delete/' . $v -> tid); ?>" title="Cancel Transaction" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                    <?php else: ?>
													<a href="#"><span class="icon12 icomoon-icon-checkmark"></span></a>
                                                    <?php endif; ?>
												</div>
                                            </td>
                                          </tr>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth">
                        <div class="col-lg-2">
						<a href="<?php echo site_url('panel/transaction/topup'); ?>" class="btn btn-default"><span class="icon16 icomoon-icon-arrow-up-right"></span> Top Up</a>
						</div>
                        <div class="col-lg-10">
<div class="dataTables_paginate paging_bootstrap pagination right">
<?php echo $pages; ?>
</div>
</div>
                                </div>
                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
                    
                    
                    <!-- payment method -->
                    <div class="payment_method">
                      <h2>Payment Method</h2>
                      <h5>Please make a payment by bank transfer to this following account:</h5>
                      <ul class="clearenter">
                        
                        <li class="bca">
                          <div>
                            <div class="logo"><img src="<?php echo site_url('application/views/panel/assets/images/bca.jpg'); ?>" /></div>
                            <ul class="clearenter">
                              <li class="kode"><b>Bank Code</b></li>
                              <li class="isi">BCA</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Account Number</b></li>
                              <li class="isi">8650666080</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Name</b></li>
                              <li class="isi">Kawi</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Branch</b></li>
                              <li class="isi">BCA KCP Pantai Indah Kapuk II</li>
                            </ul>
                          </div>
                        </li>
                        <!--
                        <li class="mandiri">
                          <div>
                            <div class="logo"><img src="<?php echo site_url('application/views/panel/assets/images/mandiri.jpg'); ?>" /></div>
                            <ul class="clearenter">
                              <li class="kode"><b>Bank Code</b></li>
                              <li class="isi">Mandiri</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Account Number</b></li>
                              <li class="isi">1160092003780</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Name</b></li>
                              <li class="isi">Agus Suryadi</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Branch</b></li>
                              <li class="isi">Mandiri</li>
                            </ul>
                          </div>
                        </li>
                        -->
                      </ul>
                    </div>
                    <!-- end payment method -->
                    
               
                <!-- Page end here -->
                                    
