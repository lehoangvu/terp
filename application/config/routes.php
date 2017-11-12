<?php
defined('BASEPATH') OR exit('No direct script access allowed');
CONST API_PREFIX = "";

$route['default_controller'] = 'welcome';

$route['api/products']['GET'] = 'api/ProductController/listAct';
$route['api/products/sync']['PUT'] = 'api/ProductController/syncHrvAct';
$route['api/products/(:any)']['GET'] = 'api/ProductController/detailAct/$1';

$route['api/customers']['POST'] = 'api/CustomerController/createAct';
$route['api/customers']['GET'] = 'api/CustomerController/listAct';

$route['404_override'] = '_404';
$route['403_override'] = '_404';
$route['500_override'] = '_404';
$route['translate_uri_dashes'] = FALSE;
