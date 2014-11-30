<?php
use App\Support\Facades\Router;
use App\Support\Facades\View;

/**
 * Define routes here
 */

// Home Page
Router::map('/', 'App\\Controllers\\HomeController@index');
Router::map('/ajax-get-filter-data', 'App\\Controllers\\HomeController@ajaxGetFilterData');








/**
 * 404 error handler
 */
Router::show404(function()
{
    header("HTTP/1.0 404 Not Found");
    header("Status: 404 Not Found");

    View::show('errors/404');
});