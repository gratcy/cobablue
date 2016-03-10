        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Product</h3>                    

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
                        <li class="active">Update Product</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-quill"></span>
                                        <span>Update Product</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" id="resetpass" action="<?php echo site_url('panel/product/update');?>" role="form" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
			<?php echo __get_error_msg(); ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Product Name" value="<?php echo $detail[0] -> pname; ?>" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="price">Price</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" onkeyup="formatharga(this.value,this)" placeholder="Product Price" autocomplete="off" name="price" value="<?php echo __get_rupiah($detail[0] -> pprice,2); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="price">Duration In Year</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" placeholder="Duration In Year" autocomplete="off" name="year" value="<?php echo $detail[0] -> pyear; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="desc">Description</label>
                                            <div class="col-lg-9">
                                                <textarea id="textarea1" name="desc" rows="3" class="form-control elastic"><?php echo $detail[0] -> pdesc; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Status</label>
                                            <div class="col-lg-9">
                                               <?php echo __get_status($detail[0] -> pstatus,2,2); ?>
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
                                    
