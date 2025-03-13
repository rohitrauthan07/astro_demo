<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'auth/login';
$route['auth/login_post'] = 'auth/login_post';
$route['auth/logout'] = 'auth/logout';
$route['auth/forgot_password'] = 'auth/forgot_password';
$route['auth/forgot_password_post'] = 'auth/forgot_password_post';
$route['admin/manage_category/(:num)'] = 'admin/manage_category/$1';
$route['admin/delete_category/(:num)'] = 'admin/delete_category/$1';
$route['admin/manage_subcategory/(:num)'] = 'admin/manage_subcategory/$1';
$route['admin/delete_subcategory/(:num)'] = 'admin/delete_subcategory/$1';
$route['profile/create_subcategory'] = 'profile/create_subcategory';
