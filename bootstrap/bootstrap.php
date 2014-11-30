<?php
use App\Support\ClassLoader;
use App\Support\Facades\App;


// first include and register class loader
require_once $projectRoot.'app/Support/ClassLoader.php';
$loader = new ClassLoader();
$loader->setPsr4('App\\', $projectRoot.'app/');


// Set project root directory
App::setProjectRootDirectory($projectRoot);

// Detect current environment
App::detectEnvironment(function()
{
    // here will be put some logic to determine environment
    return 'dev';
});