        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Create VPN Account (<span style="color:red">Reseller</span>)</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-transmission"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Create VPN Account</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-users"></span>
                                        <span>Add New VPN Account</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/create_account');?>" role="form" method="post">
			<?php echo __get_error_msg(); ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder"></label>
                                            <div class="col-lg-9">
												<b>Your points is <?php echo __get_point($this -> memcachedlib -> sesresult['uid']); ?></b>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Account</label>
                                            <div class="col-lg-9">
                                                New User <input type="radio" checked="checked" name="acc" value="1" />Existing User <input type="radio"  name="acc" value="2" /> 
                                            </div>
                                        </div>
                                        <div id="existing-account" style="display:none;">
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Email</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Email Account" name="eemail" autocomplete="off">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Duration</label>
                                            <div class="col-lg-9">
                                                <select name="eduration" class="form-control">
                                                <?php echo __get_duration(0,2); ?>
                                                </select>
                                                <br />
                                                <span style="color:red"><i>1 point per year of duration</i></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Price (*)</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Price" name="eprice" onkeyup="formatharga(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Description</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="edesc" rows="3" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
										</div>
                                        <div id="new-account">
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Email</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="off">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Duration</label>
                                            <div class="col-lg-9">
                                                <select name="duration" class="form-control">
                                                <?php echo __get_duration(0,2); ?>
                                                </select>
                                                <br />
                                                <span style="color:red"><i>1 point per year of duration</i></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Price (*)</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Price" name="price" onkeyup="formatharga(this.value,this)">
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
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Description</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="desc" rows="3" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-disk"></span> Submit</button>
                                                <button type="button" class="btn btn-default" onclick="javascript: history.go(-1)"><span class="icon16 icomoon-icon-backspace-2"></span> Back</button>
                                            </div>
                                        </div><!-- End .form-group  -->     
                                        <div class="form-group">       
                                            <div class="col-lg-offset-3 col-lg-9">       
											<p><i>(*) Note : Optional, for your personal report selling</i></p>
											</div>
                                        </div>
                                    </form>
                                    
                                 
                                </div>


                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
                <!-- Page end here -->
<script>
$('input[name="acc"]').change(function(){
	if ($(this).val() == 1) {
		$('#new-account').show()
		$('#existing-account').hide()
	}
	else {
		$('#new-account').hide()
		$('#existing-account').show()
	}
})
</script>
