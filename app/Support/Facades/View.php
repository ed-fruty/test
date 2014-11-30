<?php
namespace App\Support\Facades;

use App\Support\Templating\View as Accessor;

/**
 * Class View
 * @package App\Support\Facades
 * @author Fruty <ed.fruty@gmail.com>
 *
 * @method void setDriver(string $driver) static
 * @method void share(string $name, $value) static
 * @method string get(string $template, array $data = array()) static
 * @method void show(string $template, array $data = array()) static
 */
class View extends AbstractFacade
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
}