        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Voucher</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-vcard"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Voucher</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-vcard"></span>
                                        <span>List Voucher</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
			<?php echo __get_error_msg(); ?>
									<form action="" method="post" id="searchuser" name="searchuser">
									<div class="row" style="padding:10px;">
									<div class="col-lg-4">
									<input type="search" class="form-control input-sm" name="keyword" placeholder="Email" aria-controls="table-ajax-defer">
									</div>
									<div class="col-lg-2" style="margin-left: -25px;margin-top: -2px;">
									<a href="javascript:void(0);" onclick="document.getElementById('searchuser').submit();" class="btn btn-default"> Go! </a>
									</div>
									</div>
									<div style="clear:both"></div>
									</form>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="ch">#</th>
                                            <th>Voucher</th>
                                            <th>Day (s)</th>
                                            <th>Expired</th>
                                            <th>Used By</th>
                                            <th>Date Used</th>
                                            <th class="col-lg-1">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($voucher as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo ((($page - 1) * $limit) + $i); ?>.</td>
                                            <td><?php echo $v -> vcode; ?></td>
                                            <td><?php echo $v -> vday; ?></td>
                                            <td><?php echo ($v -> vexpire < time() ? 'Expired' : __get_date($v -> vexpire,1)); ?></td>
                                            <td><?php echo $v -> uemail; ?></td>
                                            <td><?php echo ($v -> vdateused ? __get_date($v -> vdateused,1) : ''); ?></td>
                                            <td>
                                            <div class="controls center">
												<?php if ($v -> vstatus == 1) : ?>
                                                    <a href="<?php echo site_url('panel/voucher/delete/' . $v -> vid); ?>" title="Remove Voucher" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                    <?php endif;?>
												</div>
                                            </td>
                                          </tr>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth">
                        <div class="col-lg-2">
						<a href="<?php echo site_url('panel/voucher/generate'); ?>" class="btn btn-default"><span class="icon16 icomoon-icon-plus"></span> Generate Voucher</a>
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
               
                <!-- Page end here -->
                                    
