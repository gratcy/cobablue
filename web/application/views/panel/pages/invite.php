        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Invite</h3>                    

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
                        <li class="active">Invite</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-user-plus"></span>
                                        <span>Invite</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" action="<?php echo site_url('panel/invite');?>" role="form" method="post">
                                    <input type="hidden" name="type" value="2">
			<?php echo __get_error_msg(); ?>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Email</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="desc" rows="8" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                Example:<br /><br />
                                                example@example.com<br />
                                                test@example.com<br />
                                                stage@example.com<br />
                                            </div>
                                        </div><!-- End .form-group  -->                   
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-disk"></span> Submit</button>
                                                <button type="button" class="btn btn-default" onclick="javascript: history.go(-1)"><span class="icon16 icomoon-icon-backspace-2"></span> Back</button>
                                            </div>
                                        </div><!-- End .form-group  -->                   

                                    </form>
<hr />
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Import</label>
                                            <div class="col-lg-9">
                                                <button type="button" class="btn btn-default"><span class="icon16 icomoon-icon-google"></span></button>
                                                <button type="button" class="btn btn-default"><span class="icon16 icomoon-icon-yahoo"></span></button>
                                                <button type="button" class="btn btn-default"><span class="icon16 icomoon-icon-facebook"></span></button>
                                                </div>
                                                </div>
                                                </form>
                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
               
                <!-- Page end here -->
                                    
