        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Top Up</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-arrow-up-right"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Top Up</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-arrow-up-right"></span>
                                        <span>Top Up</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/transaction/topup');?>" role="form" method="post">
			<?php echo __get_error_msg(); ?>
			<input type="hidden" name="total" value="">
			<input type="hidden" name="year" value="">
			<input type="hidden" name="point" value="">
			<input type="hidden" name="ptype" value="">
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Product</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="product">
                                                <?php echo $product; ?>
                                                </select>
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
                              <li class="isi">8650666080</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Name</b></li>
                              <li class="isi">Kawi</li>
                            </ul>
                            <ul class="clearenter">
                              <li class="kode"><b>Branch</b></li>
                              <li class="isi">BCA KCP Pantai Indah Kapuk II</li>
                            </ul>
                          </div>
                        </li>
                        <!--
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
                        -->
                      </ul>
                    </div>
                    <!-- end payment method -->
               
                <!-- Page end here -->
                                    <script>
                                    $('select[name="product"]').change(function(){
										$('input[name="total"]').val($(':selected',this).attr('price'));
										$('input[name="year"]').val($(':selected',this).attr('year'));
										$('input[name="point"]').val($(':selected',this).attr('point'));
										$('input[name="ptype"]').val($(':selected',this).attr('ptype'));
									})
                                    </script>
