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
                        <li class="active">Upload</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-download"></span>
                                        <span>Upload</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
			<?php echo __get_error_msg(); ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Name</th>
                                            <th>File</th>
                                            <th>Version</th>
                                            <th>Status</th>
                                            <th class="col-lg-1">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
										  <?php foreach($files as $k => $v) : ?>
                                          <tr>
											  <td><?php echo $v -> fname; ?></td>
											  <td><a href="<?php echo ($v -> ffile ? __get_url_file($v -> ffile) : $v -> furl); ?>">Download</a></td>
											  <td><?php echo $v -> fversion; ?></td>
											  <td><?php echo __get_status($v -> fstatus,1); ?></td>
                                            <td>
                                            <div class="controls center">
                                                    <a href="<?php echo site_url('panel/upload/update/' . $v -> fid); ?>" title="Update File" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                    <a href="<?php echo site_url('panel/upload/delete/' . $v -> fid); ?>" title="Remove File" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
												</div>
                                            </td>
                                          </tr>
                                          <?php endforeach; ?>
                                        </tbody>
									</table>
                                    <div id="pgboth">
                        <div class="col-lg-2">
						<a href="<?php echo site_url('panel/upload/add'); ?>" class="btn btn-default"><span class="icon16 icomoon-icon-plus"></span> Upload</a>
						</div>
                        <div class="col-lg-10">
<div class="dataTables_paginate paging_bootstrap pagination right">
<?php echo $pages; ?>
</div>
</div>
                                </div>

