<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Optional: CRUD route
$route['barangantik'] = 'barangantik/index';
$route['barangantik/create'] = 'barangantik/create';
$route['barangantik/store'] = 'barangantik/store';
$route['barangantik/edit/(:num)'] = 'barangantik/edit/$1';
$route['barangantik/update/(:num)'] = 'barangantik/update/$1';
$route['barangantik/delete/(:num)'] = 'barangantik/delete/$1';

$route['jenisbarang'] = 'jenisbarang/index';
$route['jenisbarang/create'] = 'jenisbarang/create';
$route['jenisbarang/store'] = 'jenisbarang/store';
$route['jenisbarang/edit/(:num)'] = 'jenisbarang/edit/$1';
$route['jenisbarang/update/(:num)'] = 'jenisbarang/update/$1';
$route['jenisbarang/delete/(:num)'] = 'jenisbarang/delete/$1';

$route['pemilik'] = 'pemilik/index';
$route['pemilik/create'] = 'pemilik/create';
$route['pemilik/store'] = 'pemilik/store';
$route['pemilik/edit/(:num)'] = 'pemilik/edit/$1';
$route['pemilik/update/(:num)'] = 'pemilik/update/$1';
$route['pemilik/delete/(:num)'] = 'pemilik/delete/$1';
$route['profile'] = 'profile/index';
$route['profile/update'] = 'profile/update';
$route['profile/update_password'] = 'profile/update_password';
