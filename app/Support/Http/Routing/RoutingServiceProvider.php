<?php
namespace App\Support\Http\Routing;

use App\Support\Contracts\ServiceProviderInterface;
use App\Support\Facades\App;

/**
 * Class RoutingServiceProvider
 * @package App\Support\Http\Routing
 * @author Fruty <ed.fruty@gmail.com>
 */
class RoutingServiceProvider implements ServiceProviderInterface
{

    /**
     * Method will be executed before application booting
     *
     * @access public
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
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
        require_once App::getPath('bootstrap/routes.php');
    }
}