<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;





// Admin routes
$route['Adminlogin'] = 'Adminlogin';
$route['admin'] = 'Adminlogin';
$route['adminlogin/validatelogin'] = 'adminlogin/validatelogin';
$route['AdminDashboard'] = 'AdminDashboad';