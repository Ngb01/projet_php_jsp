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
|	https://codeigniter.com/user_guide/general/routing.html
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

// Diplômes
$route['diplomes/insert'] = 'diplomes/insert_db';
$route['diplomes/delete/(:any)'] = 'diplomes/delete_db/$1';
$route['diplomes/update/(:any)'] = 'diplomes/update_db/$1';
$route['diplomes/find'] = 'diplomes/find_by_universite';
$route['diplomes'] = 'diplomes/all';

// Cours
$route['cours/insert/(:any)'] = 'cours/insert_db/$1';
$route['cours/delete/(:any)'] = 'cours/delete_db/$1';
$route['cours/update/(:any)'] = 'cours/update_db/$1';
$route['cours/find'] = 'cours/find';
$route['cours/(:any)'] = 'cours/find_by_id/$1';
$route['cours'] = 'cours/search';

// Etudiants
$route['etudiants/insert'] = 'etudiants/insert_db';
$route['etudiants/delete/(:any)'] = 'etudiants/delete_db/$1';
$route['etudiants/update/(:any)'] = 'etudiants/update_db/$1';
$route['etudiants/search'] = 'etudiants/find';
$route['etudiants'] = 'etudiants/searchform';

// Programmes
$route['programmes/insert'] = 'programmes/insert_db';
$route['programmes/delete/(:any)'] = 'programmes/delete_db/$1';
$route['programmes/update/(:any)'] = 'programmes/update_db/$1';
$route['programmes/find'] = 'programmes/find';
$route['programmes'] = 'programmes/all';

// Contrats
$route['contrats/insert'] = 'contrats/insert_db';
$route['contrats/delete/(:any)'] = 'contrats/delete_db/$1';
$route['contrats/update/(:any)'] = 'contrats/update_db/$1';
$route['contrats/search/(:any)'] = 'contrats/find/$1';
$route['contrats'] = 'contrats/searchform';

// Default
$route['(:any)'] = 'accueil/view/$1';
$route['default_controller'] = 'accueil/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
