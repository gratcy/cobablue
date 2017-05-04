<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/


$route['default_controller'] = "home";
$route['404_override'] = '';

################################################### FRONTEND ##################################################

$route['register'] = 'register/home';
$route['confirm'] = 'confirm/home/index';
$route['reactive'] = 'confirm/home/reactive';
$route['page/(:any)'] = 'page/home/index/$1';
$route['lostpwd'] = 'lostpwd/home/index';
$route['lostpwd/setpwd'] = 'lostpwd/home/setpwd';

#################################################### PANEL ####################################################

$route['panel'] = 'panel/home';

$route['panel/login'] = 'login/home';
$route['panel/login/logging'] = 'login/home/logging';
$route['panel/login/logging_social'] = 'login/home/logging_social';
$route['panel/login/logout'] = 'login/home/logout';

$route['panel/confirmation/?(:num)?'] = 'confirmation/home/index/$1';
$route['panel/confirmation/update/?(:num)?'] = 'confirmation/home/update/$1';
$route['panel/confirmation/delete/?(:num)?'] = 'confirmation/home/delete/$1';

$route['panel/transaction/?(:num)?'] = 'transaction/home/index/$1';
$route['panel/transaction/topup'] = 'transaction/home/topup';
$route['panel/transaction/confirm'] = 'transaction/home/confirm';
$route['panel/transaction/delete/(:num)'] = 'transaction/home/delete/$1';

$route['panel/create_account'] = 'create_account/home/index';
$route['panel/report'] = 'report/home/index';

$route['panel/refferal/?(:num)?'] = 'refferal/home/index/$1';

$route['panel/invite'] = 'invite/home';
$route['panel/settings'] = 'settings/home';

$route['panel/download'] = 'download/home';
$route['panel/topup-tutorial'] = 'topuptutor/home';

$route['panel/support/?(:num)?'] = 'support/home/index/$1';
$route['panel/support/ticket'] = 'support/home/ticket';
$route['panel/support/reply/?(:num)?'] = 'support/home/reply/$1';
$route['panel/support/delete/(:num)'] = 'support/home/delete/$1';

$route['panel/product/?(:num)?'] = 'product/home/index/$1';
$route['panel/product/add'] = 'product/home/product_add';
$route['panel/product/update/?(:num)?'] = 'product/home/product_update/$1';
$route['panel/product/delete/(:num)'] = 'product/home/product_delete/$1';

$route['panel/users/?(:num)?'] = 'users/home/index/$1';
$route['panel/users/add'] = 'users/home/users_add';
$route['panel/users/update/?(:num)?'] = 'users/home/users_update/$1';
$route['panel/users/delete/(:num)'] = 'users/home/users_delete/$1';

$route['panel/voucher/?(:num)?'] = 'voucher/home/index/$1';
$route['panel/voucher/generate'] = 'voucher/home/voucher_generate';
$route['panel/voucher/delete/(:num)'] = 'voucher/home/voucher_delete/$1';
$route['panel/use-voucher'] = 'use_voucher/home';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
