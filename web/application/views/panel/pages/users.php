        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>List User</h3>                    

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
                        <li class="active">List User</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-users"></span>
                                        <span>List User</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
			<?php echo __get_error_msg(); ?>
									<form action="" method="post" id="searchuser" name="searchuser">
									<div class="row" style="padding:10px;">
									<div class="col-lg-4">
									<input type="search" class="form-control input-sm" name="keyword" placeholder="" aria-controls="table-ajax-defer">
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
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th>Full Name</th>
                                            <th>Refcode</th>
                                            <th>Refid</th>
                                            <th>Last Login</th>
                                            <th>Expire</th>
                                            <th>Status</th>
                                            <th class="col-lg-1">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($users as $k => $v) :
											$llogin = explode('*',$v -> ulastlogin);
											?>
                                          <tr>
                                            <td><?php echo ($page * $i); ?>.</td>
                                            <td><?php echo __get_user_level($v -> ulevel,1); ?></td>
                                            <td><?php echo $v -> uemail; ?></td>
                                            <td><?php echo $v -> ufullname; ?></td>
                                            <td><?php echo $v -> urefcode; ?></td>
                                            <td><?php echo $v -> urefid; ?></td>
                                            <td><?php echo (isset($llogin[0]) ? long2ip($llogin[0]) : '') . ' - ' . (isset($llogin[1]) ? __get_date($llogin[1],3) : ''); ?></td>
                                            <td><?php echo __get_date($v -> uexpire,3); ?></td>
                                            <td><?php echo __get_status($v -> ustatus,1); ?></td>
                                            <td>
                                            <div class="controls center">
                                                    <a href="<?php echo site_url('panel/users/update/' . $v -> uid); ?>" title="Update User" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                    <a href="<?php echo site_url('panel/users/delete/' . $v -> uid); ?>" title="Remove User" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
												</div>
                                            </td>
                                          </tr>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pgboth">
                        <div class="col-lg-2">
						<a href="<?php echo site_url('panel/users/add'); ?>" class="btn btn-default"><span class="icon16 icomoon-icon-plus"></span> Add New User</a>
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
                                    
