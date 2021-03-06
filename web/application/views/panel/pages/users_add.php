        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>User</h3>                    

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
                        <li class="active">Add New User</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-users"></span>
                                        <span>Add New User</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/users/add');?>" role="form" method="post">
			<?php echo __get_error_msg(); ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Level</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="level"><?php echo __get_user_level(0,2); ?></select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Email</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" placeholder="Password" name="pass">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Confirm Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                                            </div>
                                        </div>
                                        <hr />
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Full Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Country</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Country" name="country">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">City</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="City" name="city">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Postal Code</label>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" placeholder="Postal Code" name="postal">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Phone</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Phone" name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="desc">Address</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="addr" rows="3" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="desc">Place Date of Birth</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" placeholder="Place" name="tmpt">
                                            </div>
                                            <div class="col-lg-4">
                                                <input id="dt" type="text" class="form-control" placeholder="Date of Birth" name="tgl">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Status</label>
                                            <div class="col-lg-9">
                                               <?php echo __get_status(0,2,2); ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-disk"></span> Submit</button>
                                                <button type="button" class="btn btn-default" onclick="javascript: history.go(-1)"><span class="icon16 icomoon-icon-backspace-2"></span> Back</button>
                                            </div>
                                        </div><!-- End .form-group  -->                   

                                    </form>
                                    
                                 
                                </div>


                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
                <!-- Page end here -->
