        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Support</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-screen-2"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Support</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-support"></span>
                                        <span>List Ticket</span>
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
                                            <th>From</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th class="col-lg-1">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($tickets as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo ($page * $i); ?>.</td>
                                            <td><?php echo __get_support_type($v -> tto,1); ?></td>
                                            <td><?php echo __get_from_support($v -> ufullname, $this -> memcachedlib -> sesresult['ulevel'], 0,1);?></td>
                                            <td><?php echo __get_date($v -> tdate,3); ?></td>
                                            <td class="col-lg-5"><?php echo $v -> tsubject; ?></td>
                                            <td>
                                            <div class="controls center">
										<?php if ($this -> memcachedlib -> sesresult['ulevel'] != 4) : ?>
											<a href="<?php echo site_url('panel/support/reply/' . $v -> tid); ?>" title="Reply <?php echo $v -> tsubject; ?>" class="tip"><span class="icon12 icomoon-icon-reply"></span></a>
										<?php endif; ?>
                                                    <a href="<?php echo site_url('panel/support/delete/' . $v -> tid); ?>" title="Remove Message" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
												</div>
                                            </td>
                                          </tr>
                                          <?php
                                          $ptickets = $this -> support_model -> __get_tickets($v -> tid,$this -> memcachedlib -> sesresult['ulevel'],2);
                                          foreach($ptickets as $k1 => $v1) :
                                          ?>
                                          <tr>
                                            <td></td>
                                            <td>-- <?php echo __get_support_type($v1 -> tto,1); ?></td>
                                            <td><?php echo ($v1 -> truid == $this -> memcachedlib -> sesresult['uid'] ? 'You' : __get_from_support($v1 -> ufullname, $this -> memcachedlib -> sesresult['ulevel'], $v1 -> ulevel,2)); ?></td>
                                            <td><?php echo __get_date($v1 -> tdate,3); ?></td>
                                            <td><?php echo $v1 -> tsubject; ?></td>
                                                                                        <td>
                                                <div class="controls center">
													<?php if ($v1 -> truid != $this -> memcachedlib -> sesresult['uid'] && $v1 -> ulevel != $this -> memcachedlib -> sesresult['ulevel']) : ?>
                                                    <a href="<?php echo site_url('panel/support/reply/' . $v1 -> tid); ?>" title="Reply <?php echo $v1 -> tsubject; ?>" class="tip"><span class="icon12 icomoon-icon-reply"></span></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo site_url('panel/support/delete/' . $v1 -> tid); ?>" title="Remove Message" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
												</div>
                                            </td>
                                          </tr>
                                          <?php endforeach;?>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth">
										<?php if ($this -> memcachedlib -> sesresult['ulevel'] == 4) : ?>
                        <div class="col-lg-2">
						<a href="<?php echo site_url('panel/support/ticket'); ?>" class="btn btn-default"><span class="icon16 icomoon-icon-ticket"></span> Add New Ticket</a>
						</div>
						<?php endif; ?>
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
                                    
