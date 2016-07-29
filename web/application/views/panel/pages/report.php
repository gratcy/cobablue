<link href="<?php echo site_url('application/views/panel/assets/css/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" /> 
<script src="<?php echo site_url('application/views/panel/assets/js/daterangepicker.js'); ?>"></script>
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Report Create Account</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-list"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Report Create Account</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 icomoon-icon-list"></span>
                                        <span>Report</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
									
                                <div class="panel-body">
									<form action="<?php echo site_url('panel/report');?>" method="post">
                                         <div class="form-group" style="margin-top:-10px">
                                            <label class="col-lg-2 control-label" for="placeholder" style="line-height:22pt">Sort Date</label>
                                            <div class="col-lg-4">
								<input type="text" class="form-control" id="datesort" name="datesort" autocomplete="off" style="width:80%;float:left" value="<?php echo ($from && $to ? date('d/m/Y', strtotime($from)) . ' - ' . date('d/m/Y', strtotime($to)) : ''); ?>" /><button type="submit" class="btn btn-info" style="float:left;margin-left:2px">Go!</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th class="ch">#</th>
                                            <th class="col-lg-2">Date</th>
                                            <th class="col-lg-2">Email</th>
                                            <th class="col-lg-2">Price</th>
                                            <th class="col-lg-2">Duration</th>
                                            <th>Desc</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php
											$i=1;
											foreach($report as $k => $v) :
											?>
                                          <tr>
                                            <td><?php echo $i; ?>.</td>
                                            <td><?php echo __get_date($v -> cdate,3); ?></td>
                                            <td><?php echo $v -> cemail; ?></td>
                                            <td><?php echo __get_rupiah($v -> cprice); ?></td>
                                            <td><?php echo __get_duration($v -> cduration,1); ?></td>
                                            <td><?php echo $v -> cdesc; ?></td>
                                          </tr>
                                          <?php ++$i; endforeach; ?>
                                        </tbody>
                                    </table>
                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
               
                <!-- Page end here -->
                                   
<script type="text/javascript">
$(function(){
	$('#datesort').daterangepicker();
});
</script>
 
