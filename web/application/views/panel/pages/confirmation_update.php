        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Confirmation Update</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-cart-checkout"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Confirmation Update</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-cart-checkout"></span>
                                        <span>Confirmation Update</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/confirmation/update');?>" role="form" method="post">
			<?php echo __get_error_msg(); ?>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="ptype" value="<?php echo $detail[0] -> ptype; ?>">
			<input type="hidden" name="tcid" value="<?php echo $detail[0] -> tcid; ?>">
			<input type="hidden" name="uid" value="<?php echo $detail[0] -> tuid; ?>">
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Transaction No.</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" readonly placeholder="Transaction No." name="tno" value="#<?php echo $detail[0] -> tno;?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Product</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="product" readonly>
                                                <?php echo $product; ?>
                                                </select>
                                            </div>
                                        </div>
										<?php if ($detail[0] -> ptype != 1) : ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Period</label>
                                            <div class="col-lg-4">
                                                From <input type="text" readonly class="form-control" placeholder="From" name="from" value="<?php echo date('d/m/Y H:i:s',$detail[0] -> tfrom);?>">
                                            </div>
                                            <div class="col-lg-4">
                                                To <input type="text" readonly class="form-control" placeholder="To" name="to" value="<?php echo date('d/m/Y H:i:s',$detail[0] -> tto);?>">
                                            </div>
                                        </div>
										<?php endif; ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Bank</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" readonly name="bank"><?php echo __get_bank($detail[0] -> tabank,2,1); ?></select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Bank Account Number</label>
                                            <div class="col-lg-9">
                                                <input type="text" readonly class="form-control" placeholder="Account Number" name="ano" value="<?php echo $detail[0] -> tano; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Bank Account Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" readonly class="form-control" placeholder="Account Name" name="aname" value="<?php echo $detail[0] -> taname; ?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Total</label>
                                            <div class="col-lg-9">
                                                <input type="text" readonly class="form-control" placeholder="Total Amount" name="total" value="<?php echo __get_rupiah($detail[0] -> ttotal,3); ?>" onkeyup="formatharga(this.value,this)">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Max Hidden Bank</label>
                                            <div class="col-lg-9">
                                                <select readonly class="form-control" name="mbank"><?php echo __get_bank($detail[0] -> tmbank,2,2); ?></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="desc">Description</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="desc" rows="3" class="form-control elastic"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Approve</label>
                                            <div class="col-lg-9">
                                               <?php echo __get_approved(0,2); ?>
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
               
                <!-- Page end here -->
