<?php
namespace App\Support\Facades;

use App\Support\Foundation\Application as Accessor;

/**
 * Class App
 * @package App\Support\Facades
 * @category App
 * @author Fruty <ed.fruty@gmail.com>
 *
 * @method void detectEnvironment(\Closure $closure) static
 * @method string getEnvironment() static
 * @method string getProjectRootDirectory() static
 * @method void setProjectRootDirectory(string $projectRootDirectory) static
 * @method string getPath(string $path) static
 */
class App extends AbstractFacade
{
    /**
     * Get facade accessor
     *
     * @access public
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return Accessor::className();
    }
} 