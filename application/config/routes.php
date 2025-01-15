<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['datails/(:any)'] = 'Home/subCateDatails/$1';
$route['listing/(:any)'] = 'Home/cateListing/$1';



// Admin routes
$route['Adminlogin'] = 'Adminlogin';
$route['admin'] = 'Adminlogin';
$route['adminlogin/validatelogin'] = 'adminlogin/validatelogin';
$route['AdminDashboard'] = 'AdminDashboard';
$route['dashboard'] = 'AdminDashboard/dashboard';
$route['category_all'] = 'AdminDashboard/category_all';
$route['categoryAdd'] = 'AdminDashboard/category_add';
$route['productImageD'] = 'AdminDashboard/productImageD';
$route['subcategory_all'] = 'AdminDashboard/subcategory_all';
$route['subCategoryAdd'] = 'AdminDashboard/subCategoryAdd';
$route['nashik_blog'] = 'AdminDashboard/nashik_blog';