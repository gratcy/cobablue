        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Reseller Create Account</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-pie-4"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Reseller Create Account</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 iconic-icon-chart"></span>
                                        <span>Filter Report</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body">
									
                                    <form class="form-horizontal" id="filterReport" action="<?php echo site_url('panel/report_reseller');?>" role="form" method="post">
                                         <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Search Reseller</label>
                                            <div class="col-lg-4">
                                                <select name="reseller" id="select1" class="nostyle">
													<?php echo $reseller; ?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder" style="line-height:22pt">Sort Date</label>
                                            <div class="col-lg-4">
												<input type="text" class="form-control" id="datesort" name="datesort" autocomplete="off" value="<?php echo ($from && $to ? date('d/m/Y', strtotime($from)) . ' - ' . date('d/m/Y', strtotime($to)) : ''); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-9">
                                                <button type="submit" class="btn btn-info"><span class="icon16 icomoon-icon-disk"></span> Submit</button>
                                            </div>
                                        </div><!-- End .form-group  -->      
                                    </form>
								</div>
							</div>
								
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-pie-4"></span>
                                        <span>List Account</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
			<?php echo __get_error_msg(); ?>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="ch">#</th>
                                            <th>Reseller</th>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                            <th>Expired Date</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($reports as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo $i; ?>.</td>
                                            <td><?php echo $v -> remail . ' - ' . $v -> ufullname; ?></td>
                                            <td><?php echo $v -> uemail; ?></td>
                                            <td><?php echo __get_date($v -> uexpire,3); ?></td>
                                            <td><?php echo __get_date($v -> uregdate,3); ?></td>
                                          </tr>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>

                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
               
                <!-- Page end here -->
