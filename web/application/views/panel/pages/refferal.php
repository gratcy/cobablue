        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>List Refferal</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-users"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">List Refferal</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-users"></span>
                                        <span>List Refferal</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="ch">#</th>
                                            <th>Reg Date</th>
                                            <th>Email</th>
                                            <th>Premium</th>
                                            <th>Ref Code</th>
                                            <th class="col-lg-1">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($refferal as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo (($page == 1 ? $page * $i : ($page * $limit) - $limit + $i)); ?>.</td>
                                            <td><?php echo __get_date($v -> uregdate,1); ?></td>
                                            <td><?php echo $v -> uemail; ?></td>
                                            <td><?php echo ($v -> uexpire > time() ? 'Yes' : 'No'); ?></td>
                                            <td><?php echo $v -> urefcode; ?></td>
                                            <td><?php echo __get_status($v -> ustatus,1);?></td>
                                          </tr>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth">
                        <div class="col-lg-2">
						<a href="<?php echo site_url('panel/invite'); ?>" class="btn btn-default"><span class="icon16 icomoon-icon-user-plus"></span> Invite Member</a>
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
                                    
