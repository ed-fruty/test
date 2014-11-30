<?php
namespace App\Support\Facades;

use App\Support\Config as Accessor;

/**
 * Class Config
 * @package App\Support\Facades
 * @category Config
 * @author Fruty <ed.fruty@gmail.com>
 *
 * @method mixed get(string $key, $default = null) static
 */
class Config extends AbstractFacade
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