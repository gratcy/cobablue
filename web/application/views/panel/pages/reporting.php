<link href="<?php echo site_url('application/views/panel/assets/css/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" /> 
<script src="<?php echo site_url('application/views/panel/assets/js/daterangepicker.js'); ?>"></script>
<script src="<?php echo site_url('application/views/panel/assets/plugins/highcharts/highcharts.js'); ?>"></script>
<script src="<?php echo site_url('application/views/panel/assets/plugins/highcharts/modules/exporting.js'); ?>"></script>
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Reporting</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="./" class="tip" title="back to dashboard">
                                <span class="icon16 iconic-icon-chart"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Reporting</li>
                    </ul>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row"></div> -->

                    <div class="row">
                        <div class="col-lg-12">                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <span class="icon16 iconic-icon-chart"></span>
                                        <span>Report</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="panel-body noPad">
									
                                <div class="panel-body">
									<form action="<?php echo site_url('panel/reporting');?>" method="post">
                                         <div class="form-group" style="margin-top:-10px">
                                            <label class="col-lg-2 control-label" for="placeholder" style="line-height:22pt">Sort Date</label>
                                            <div class="col-lg-4">
								<input type="text" class="form-control" id="datesort" name="datesort" autocomplete="off" style="width:80%;float:left" value="<?php echo ($from && $to ? date('d/m/Y', strtotime($from)) . ' - ' . date('d/m/Y', strtotime($to)) : ''); ?>" /><button type="submit" class="btn btn-info" style="float:left;margin-left:2px">Go!</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                            <div class="panel-body">
                                            <div class="col-lg-12">
                                        <div id="chart-daily"></div>
                                        <div style="padding:15px 0 15px;border-bottom:1px solid #ccc"></div>
                                        <div id="chart-weekly"></div>
                                        <div style="padding:15px 0 15px;border-bottom:1px solid #ccc"></div>
                                        <div id="chart-monthly"></div>
                                        </div>
                                        </div>
                                        
                            </div><!-- End .panel -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row -->
               
                <!-- Page end here -->
                                   
<script type="text/javascript">
$(function(){
	$('#datesort').daterangepicker();
});

<?php
$ttotal = '';
$tdate = '';
foreach($reporting_daily as $k => $v) :
	$ttotal .= $v -> rtotal . ',';
	$tdate .= '\''.$v -> rdate.'\'' . ',';
endforeach;
$tdate = rtrim($tdate, ',');
$ttotal = rtrim($ttotal, ',');
?>

Highcharts.chart('chart-daily', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Daily Registered Member'
    },
    subtitle: {
        text: 'Source: neverblock.me'
    },
    xAxis: {
        categories: [<?php echo $tdate; ?>]
    },
    yAxis: {
        title: {
            text: 'Registered'
        },
        labels: {
			
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Daily Registered Member',
        marker: {
            symbol: 'square'
        },
        data: [<?php echo $ttotal; ?>]

    }]
});

<?php
$ttotal = '';
$tdate = '';
foreach($reporting_weekly as $k => $v) :
	$ttotal .= $v -> rtotal . ',';
	$tdate .= '\''.__get_month(date('m',$v -> monthweek)-2) . ' / '.$v -> rdate.'\'' . ',';
endforeach;
$tdate = rtrim($tdate, ',');
$ttotal = rtrim($ttotal, ',');
?>

Highcharts.chart('chart-weekly', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Weekly Registered Member'
    },
    subtitle: {
        text: 'Source: neverblock.me'
    },
    xAxis: {
        categories: [<?php echo $tdate; ?>]
    },
    yAxis: {
        title: {
            text: 'Registered'
        },
        labels: {
			
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Weekly Registered Member',
        marker: {
            symbol: 'square'
        },
        data: [<?php echo $ttotal; ?>]

    }]
});

<?php
$ttotal = '';
$tdate = '';
foreach($reporting_monthly as $k => $v) :
	$ttotal .= $v -> rtotal . ',';
	$tdate .= '\''.__get_month($v -> rdate-2).'\'' . ',';
endforeach;
$tdate = rtrim($tdate, ',');
$ttotal = rtrim($ttotal, ',');
?>

Highcharts.chart('chart-monthly', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Monthly Registered Member'
    },
    subtitle: {
        text: 'Source: neverblock.me'
    },
    xAxis: {
        categories: [<?php echo $tdate; ?>]
    },
    yAxis: {
        title: {
            text: 'Registered'
        },
        labels: {
			
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Monthly Registered Member',
        marker: {
            symbol: 'square'
        },
        data: [<?php echo $ttotal; ?>]

    }]
});
</script>
 
