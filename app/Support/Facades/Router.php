<?php
namespace App\Support\Facades;

use App\Support\Http\Routing\Router as Accessor;

/**
 * Class Router
 * @package App\Support\Facades
 * @category Router
 * @author Fruty <ed.fruty@gmail.com>
 *
 * @method void map(string $uri, $action) static
 * @method mixed handle() static
 * @method mixed show404(\Closure $action = null) static
 */
class Router extends AbstractFacade
{
    /**
     * Get facade accessor class name
     *
     * @access public
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return Accessor::className();
    }

    /**
     * @return bool|\stdClass
     */
    public function t()
    {
        return (1 > 2) ? new \stdClass() : false;
    }
}