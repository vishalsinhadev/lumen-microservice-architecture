<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});


/**
 * Company Routes
 */
$router->get('/company/', 'CompanyController@list');
$router->get('/company/get', 'CompanyController@get');
$router->post('/company/create', 'CompanyController@create');
$router->put('/company/edit/{id}', 'CompanyController@edit');
/**
 * Branch
 */
$router->get('/branch/', 'BranchController@list');
$router->post('/branch/create', 'BranchController@create');
$router->put('/branch/edit/{id}', 'BranchController@edit');
$router->post('/branch/change-status/{id}', 'BranchController@changeStatus');
$router->delete('/branch/delete/{id}', 'BranchController@delete');
/**
 * Department
 */
$router->get('/department/', 'DepartmentController@list');
$router->post('/department/create', 'DepartmentController@create');
$router->put('/department/edit/{id}', 'DepartmentController@edit');
$router->post('/department/change-status/{id}', 'DepartmentController@changeStatus');
$router->delete('/department/delete/{id}', 'DepartmentController@delete');
/**
 * Designation
 */
$router->get('/designation/', 'DesignationController@list');
$router->post('/designation/create', 'DesignationController@create');
$router->put('/designation/edit/{id}', 'DesignationController@edit');
$router->post('/designation/change-status/{id}', 'DesignationController@changeStatus');
$router->delete('/designation/delete/{id}', 'DesignationController@delete');
/**
 * Country
 */
$router->get('/country/', 'CountryController@list');
/**
 * State
 */
$router->get('/state/', 'StateController@list');
