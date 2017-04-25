<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Set true if you want to run all of your script
 * Format: true or false
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$sch['start'] = true;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Time schedule your cronjob
 *
 * To define the time you can provide concrete values for
 * minute (m), hour (h), day of month (dom), month (mon),
 * and day of week (dow) or use '*' in these fields (for 'any').
 * Notice that tasks will be started based on the cron's system
 * daemon's notion of time and timezones.
 *
 * Format Time like crontab
 * For example, this will run your php every day at 12.30 AM
 * $sch['taks'] = array('yourphpfile' => array('30 12 * * *', true),
 *					);
 * set true if your want to run this script
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$sch['taks'] = array(
					'cron_autopoin' => array('*/14 * * * *', true),
					);
