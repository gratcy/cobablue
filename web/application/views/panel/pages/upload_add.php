        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Upload</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-file-2"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Add New File</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-file-2"></span>
                                        <span>Add New File</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" action="<?php echo site_url('panel/upload/add');?>" role="form" method="post" enctype="multipart/form-data">
			<?php echo __get_error_msg(); ?>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">File Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="File Name" name="fname">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-3 control-label" for="placeholder">Version</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Version" name="version">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">File Type</label>
                                            <div class="col-lg-9">
                                               <?php echo __get_upload_file_type(1,2); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="password">Upload Type</label>
                                            <div class="col-lg-9">
                                               <?php echo __get_upload_type(1,2); ?>
                                            </div>
                                        </div>
                                         <div class="form-group furl" style="display:none">
                                            <label class="col-lg-3 control-label" for="placeholder">URL</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="URL" name="url">
                                            </div>
                                        </div>
                                         <div class="form-group ffile">
                                            <label class="col-lg-3 control-label" for="placeholder">File</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="file">
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
<script>
$('input[name="utype"]').change(function(){
	if ($(this).val() == 1) {
		$('.furl').hide();
		$('.ffile').show();
	}
	else {
		$('.ffile').hide();
		$('.furl').show();
	}
})
</script>
