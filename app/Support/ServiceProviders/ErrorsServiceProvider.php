<?php
namespace App\Support\ServiceProviders;

use App\Support\Contracts\ServiceProviderInterface;
use App\Support\Facades\App;

/**
 * Class ErrorsServiceProvider
 * @package App\Support\ServiceProviders
 * @author Fruty <ed.fruty@gmail.com>
 */
class ErrorsServiceProvider implements ServiceProviderInterface
{
    /**
     * Method will be executed before application booting
     *
     * @access public
     * @return void
     */
    public function register()
    {

    }

    /**
     * Method will be executed after application booting
     * So if your provider has dependency or relationships with other providers use boot methods
     * When all other providers registered already
     *
     * @access public
     * @return void
     */
    public function boot()
    {
        // show errors if development environment
        if (App::getEnvironment() == 'dev') {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
    }
}