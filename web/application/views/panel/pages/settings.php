        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Profile</h3>                    

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
                        <li class="active">Profile</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-user"></span>
                                        <span>Profile</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/settings');?>" role="form" method="post">
                                    <input type="hidden" name="type" value="1">
										<div id="msg"></div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Email</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Email" value="<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>" name="email" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Old Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" placeholder="Old Password" name="oldpass">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">New Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" placeholder="New Password" name="newpass">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Retype Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" placeholder="Retype Password" name="repass">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-disk"></span> Submit</button>
                                                <button type="button" class="btn btn-default" onclick="javascript: history.go(-1)"><span class="icon16 icomoon-icon-backspace-2"></span> Back</button>
                                            </div>
                                        </div><!-- End .form-group  -->                   

                                    </form>
                                    
                                    <hr />
                                    <form class="form-horizontal" action="<?php echo site_url('panel/settings');?>" role="form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="2">
                                    <input type="hidden" name="oldavatar" value="<?php echo $detail[0] -> uavatar; ?>">
			<?php echo __get_error_msg(); ?>
			<?php $pdt = explode('*', $detail[0] -> uttl); ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Full Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Full Name" value="<?php echo $detail[0] -> ufullname; ?>" name="fname">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Place Date of Birth</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Place" value="<?php echo $pdt[0]; ?>" name="place">
                                                <input type="text" id="dt" class="form-control" placeholder="Date of Birth" value="<?php echo date('d/m/Y',$pdt[1]); ?>" name="dt">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Country</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Country" value="<?php echo $detail[0] -> ucountry; ?>" name="country">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">City</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="City" value="<?php echo $detail[0] -> ucity; ?>" name="city">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Postal Code</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Postal Code" value="<?php echo $detail[0] -> upostal; ?>" name="postal">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Phone</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Phone" value="<?php echo $detail[0] -> uphone; ?>" name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Address</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="addr" rows="3" class="form-control elastic"><?php echo $detail[0] -> uaddr; ?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Avatar</label>
                                            <div class="col-lg-9">
                                                <input type="file" id="avatar" class="form-control" placeholder="Avatar" name="avatar">
												<div class="newavatar"></div>
												<br />
												<div class="currentavatar">Current Avatar <br /><img width="150" src="<?php echo __get_avatar($detail[0] -> uavatar,2); ?>" class="image" /></div>
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
               
<script type="text/javascript">
	$("#avatar").uploadPreview(1);
	
	$('form#resetpass').submit(function(e){
		$(this).setPasswordPanel(e);
	});
</script>

                <!-- Page end here -->
                                    
