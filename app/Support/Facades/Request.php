<?php
namespace App\Support\Facades;

use App\Support\Http\Request as Accessor;

/**
 * Class Request
 * @package App\Support\Facades
 * @author Fruty <ed.fruty@gmail.com>
 *
 * @method string getUri() static
 * @method mixed get(string $key, $default) static
 * @method array only(array $items) static
 */
class Request extends AbstractFacade
{
    public static function getFacadeAccessor()
    {
        return Accessor::className();
    }
} 