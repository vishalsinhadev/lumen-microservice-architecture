<?php

/**
 * Company Routes
 */
$router->group(['middleware' => 'client.credentials'], function() use ($router){
    $router->get('/company/', 'Company\CompanyController@list');
    $router->get('/company/get', 'Company\CompanyController@get');
    $router->post('/company/create', 'Company\CompanyController@create');
    $router->put('/company/edit/{id}', 'Company\CompanyController@edit');

/**
 * Branch
 */
    $router->get('/branch/', 'Company\BranchController@list');
    $router->post('/branch/create', 'Company\BranchController@create');
    $router->put('/branch/edit/{id}', 'Company\BranchController@edit');
    $router->post('/branch/change-status/{id}', 'Company\BranchController@changeStatus');
    $router->delete('/branch/delete/{id}', 'Company\BranchController@delete');
});
?>