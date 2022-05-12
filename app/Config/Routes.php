<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ItemController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'ItemController::index');

$routes->get('/adicionarProduto', 'ItemController::InsertView');
$routes->post('/adicionarProduto', 'ItemController::InsertProduct');
$routes->post('/adicionarCliente', 'ItemController::InsertClient');
$routes->get('/verListagem', 'ItemController::showRegisterForm');
$routes->get('/editarProduto/(:any)', 'ItemController::getEditProduct/$1');
$routes->post('/editarProduto', 'ItemController::postEditProduct');
$routes->get('/deletarProduto/(:any)', 'ItemController::deleteProduct/$1');

$routes->get('/users/view', 'UsersController::ViewUsers');
$routes->get('/users/create', 'UsersController::CadastroView');
$routes->post('/users/create', 'UsersController::Cadastrar');
$routes->get('/users/edit/(:num)','UsersController::getEditUser/$1');
$routes->post('/users/edit/(:num)','UsersController::editUser/$1');
$routes->get('/users/delete/(:num)','UsersController::deleteUser/$1');

$routes->get('/categorias/view','CategoriesController::getAllCategories');
$routes->get('/categorias/create','CategoriesController::showCreateCategoryForm');
$routes->post('/categorias/create','CategoriesController::createCategory');
$routes->get('/categorias/edit/(:num)','CategoriesController::showEditCategoryForm/$1');
$routes->post('/categorias/edit/(:num)','CategoriesController::editCategory/$1');
$routes->get('/categorias/delete/(:num)','CategoriesController::deleteCategory/$1');

$routes->get('/consoles/view','ConsolesController::getAllConsoles');
$routes->get('/consoles/create','ConsolesController::showCreateConsoleForm');
$routes->post('/consoles/create','ConsolesController::createConsole');
$routes->get('/consoles/edit/(:num)','ConsolesController::showEditConsoleForm/$1');
$routes->post('/consoles/edit/(:num)','ConsolesController::editConsole/$1');
$routes->get('/consoles/delete/(:num)','ConsolesController::deleteConsole/$1');

$routes->get('/carrinho/view','NotaFiscalController::InsertView');
$routes->post('/carrinho/view','NotaFiscalController::Insert');

$routes->get('/notasfiscais/view','NotaFiscalController::InsertView');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
