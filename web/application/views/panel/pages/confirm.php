        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Confirm Payment</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-calculate-2"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Confirm Payment</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-calculate-2"></span>
                                        <span>Confirm Payment</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/transaction/confirm');?>" role="form" method="post">
			<?php echo __get_error_msg(); ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Transaction No.</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Transaction No." name="tno" value="<?php echo $tno; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Bank</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="bank"><?php echo __get_bank(0,2,1); ?></select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Bank Account Number</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Account Number" name="ano">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Bank Account Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Account Name" name="aname">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Total</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Total Amount" name="total" onkeyup="formatharga(this.value,this)">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Max Hidden Bank</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="mbank"><?php echo __get_bank(0,2,2); ?></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="desc">Notes</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="desc" rows="3" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-disk"></span> Submit</button>
                                                <button type="button" class="btn btn-default" onclick="javascript: history.go(-1)"><span class="icon16 icomoon-icon-backspace-2"></span> Back</button>
                                            </div>
                                        </div><!-- End .form-group  -->                   

                                    </form>

                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
                    
                    
                    
                    <!-- payment method -->
                    <div class="payment_method">
                      <h2>Payment Method</h2>
                      <h5>Please make a payment by bank transfer to this following account:</h5>
                      <ul class="clearenter">
                        
                        <li class="bca">
                          <div>
                            <div class="logo"><img src="<?php echo site_url('application/views/panel/assets/images/bca.jpg'); ?>" /></div>
                            <ul class="clearenter">
                              <li class="kode"><b>Bank Code</b></li>
                              <li class="isi">BCA</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Account Number</b></li>
                              <li class="isi">8650095767</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Name</b></li>
                              <li class="isi">Agus Suryadi</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Branch</b></li>
                              <li class="isi">BCA KCP Pantai Indah Kapuk II</li>
                            </ul>
                          </div>
                        </li>
                        
                        <li class="mandiri">
                          <div>
                            <div class="logo"><img src="<?php echo site_url('application/views/panel/assets/images/mandiri.jpg'); ?>" /></div>
                            <ul class="clearenter">
                              <li class="kode"><b>Bank Code</b></li>
                              <li class="isi">Mandiri</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Account Number</b></li>
                              <li class="isi">1160092003780</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Name</b></li>
                              <li class="isi">Agus Suryadi</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Branch</b></li>
                              <li class="isi">Mandiri</li>
                            </ul>
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                    <!-- end payment method -->
                    
               
                <!-- Page end here -->
                                    
