        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Confirmation</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-cart-checkout"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Confirmation</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-cart-checkout"></span>
                                        <span>Confirmation</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
			<?php echo __get_error_msg(); ?>
									
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="ch">#</th>
                                            <th class="col-lg-1">Product</th>
                                            <th class="col-lg-2">Transaction No.</th>
                                            <th>Date</th>
                                            <th>Period</th>
                                            <th>Price</th>
                                            <th class="col-lg-2">Status</th>
                                            <th style="width:10%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($confirmation as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo ($page * $i); ?>.</td>
                                            <td><?php echo $v -> pname; ?></td>
                                            <td>#<?php echo $v -> tno; ?></td>
                                            <td><?php echo __get_date($v -> tdate,3); ?></td>
                                            <td><?php echo __get_date($v -> tfrom,1) .' - ' . __get_date($v -> tto,1); ?></td>
                                            <td><?php echo __get_rupiah($v -> ttotal); ?></td>
                                            <td><?php echo __get_status_transaction($v -> ttstatus,1); ?></td>
                                            <td>
                                            <div class="controls center">
												<?php if ($v -> ttstatus == 1) : ?>
                                                    <a href="<?php echo site_url('panel/confirmation/update/' . $v -> ttid); ?>" title="Update Product" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                    <a href="<?php echo site_url('panel/confirmation/delete/' . $v -> ttid); ?>" title="Remove Product" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
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
                        <div class="col-lg-10">
<div class="dataTables_paginate paging_bootstrap pagination right">
<?php echo $pages; ?>
</div>
</div>
                                </div>
                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
               
                <!-- Page end here -->
                                    
