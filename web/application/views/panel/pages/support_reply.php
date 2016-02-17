        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Support Reply</h3>                    

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
                        <li class="active">Support Reply</li>
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
                                    <table class="table table-bordered">
                                          <tr><td style="width:25%"><b>Support Type</b></td><td><?php echo __get_support_type($detail[0] -> tto,1); ?></td></tr>
                                          <tr><td><b>From</b></td><td><?php echo $detail[0] -> ufullname; ?></td></tr>
                                          <tr><td><b>Date</b></td><td><?php echo __get_date($detail[0] -> tdate,3); ?></td></tr>
                                          <tr><td><b>Subject</b></td><td><?php echo $detail[0] -> tsubject; ?></td></tr>
                                          <tr><td><b>Message</b></td><td><?php echo $detail[0] -> tmsg; ?></td></tr>
                                          </table>
											<hr />
											
											
			<?php echo __get_error_msg(); ?>
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/support/reply');?>" role="form" method="post">
                                    <input type="hidden" name="tto" value="<?php echo $detail[0] -> tto; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="parent" value="<?php echo $detail[0] -> tparent; ?>">
										<div id="msg"></div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Subject</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Subject" name="subject">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Message</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="msg" rows="3" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-reply"></span> Reply</button>
                                                <button type="button" class="btn btn-default" onclick="javascript: history.go(-1)"><span class="icon16 icomoon-icon-backspace-2"></span> Back</button>
                                            </div>
                                        </div><!-- End .form-group  -->                   

                                    </form>
                                </div>


                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
               
                <!-- Page end here -->
                                    
