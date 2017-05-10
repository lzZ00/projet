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
*//*
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
*/
/*
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
*/


$route['news/test'] = 'news/test';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';


$route['Affiche_Client/(:any)'] = 'Affiche_Client/view/$1';
$route['Affiche_Client']='Affiche_Client';

$route['Affiche_Produit/delete_PanierProduit'] = 'Affiche_Produit/delete_PanierProduit';
$route['Affiche_Produit/createProduit'] = 'Affiche_Produit/createProduit';
$route['Affiche_Produit/editProduit'] = 'Affiche_Produit/editProduit';
$route['Affiche_Produit/addProduit'] = 'Affiche_Produit/addProduit';
$route['Affiche_Produit/type1Produit'] = 'Affiche_Produit/type1Produit';
$route['Affiche_Produit/type2Produit'] = 'Affiche_Produit/type2Produit';
$route['Affiche_Produit/type3Produit'] = 'Affiche_Produit/type3Produit';
$route['Affiche_Produit/search_produit'] = 'Affiche_Produit/search_produit';
$route['Affiche_Produit/pagination'] = 'Affiche_Produit/pagination';
$route['Affiche_Produit/index'] = 'Affiche_Produit/index';
$route['Affiche_Produit/(:any)'] = 'Affiche_Produit/view/$1';
$route['Affiche_Produit'] = 'Affiche_Produit';


$route['user/login'] = 'user/login';
$route['user/logout'] = 'user/logout';
$route['user/(:any)'] = 'user/view/$1';
$route['user'] = 'user';

$route['commande/creerCommande'] = 'commande/creerCommande';
$route['commande/allCommande'] = 'commande/allCommande';
$route['commande/valideCommande'] = 'commande/valideCommande';
$route['commande/test'] = 'commande/test';
$route['commande/detail'] = 'commande/detail';
$route['commande/(:any)'] = 'commande/view/$1';
$route['commande'] = 'commande';


$route['Affiche_Panier/(:any)'] = 'Affiche_Panier/view/$1';
$route['Affiche_Panier'] = 'panier';


$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';