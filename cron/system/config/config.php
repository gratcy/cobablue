<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Path Your Module
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
$conf['newmodule'] = true;
$conf['pathmodule'] = array('helpers' => BASEPATH . 'helpers',
							'models' => BASEPATH . 'models',
							'libraries' => BASEPATH . 'libraries',
							'cron' => BASEPATH . 'cron',
							);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Log Config
 * 
 * Make Sure there is a (/) strip at last directory
 * example: $conf['logdir'] = BASEPATH . 'logs/';
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
 
$conf['logdir'] = BASEPATH . 'logs/';
$conf['logname'] = 'gcli.log';
$conf['logsize'] = 1;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Administrator Email
 * 
 * this will send report error your cronjob,
 * leave it blank if you wont email report.
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$conf['domain'] = 'http://www.indogamers.com/';
$conf['administrator_email'] = 'gratcy@phpjunkies.org';
$conf['basepath'] = '/var/www/htdoc/';
$conf['basesite'] = '/var/www/htdoc/system/';

$conf['rpc'] = array('site_title' => 'Indogamers - One Stop Solution, Gamers Destination',
					'site_url'   => 'http://www.indogamers.com',
					'feed_url'   => 'http://rss.indogamers.com/getrss/main/all',
					'hub_endpoint' => 'http://pubsubhubbub.appspot.com/publish'
					);


