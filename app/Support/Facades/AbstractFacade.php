<?php
namespace App\Support\Facades;

use App\Support\ObjectExecutor;

/**
 * Class AbstractFacade
 * @package App\Support\Facades
 * @author Fruty <ed.fruty@gmail.com>
 */
abstract class AbstractFacade
{
    /**
     * @var array
     */
    private static $facadeAccessorInstances = [];

    /**
     * Get facade accessor class name
     *
     * @access public
     * @throws \Exception
     */
    public static function getFacadeAccessor()
    {
        throw new \Exception("Facade ". get_called_class() . " must implement getFacadeAccessor() method", 500);
    }

    /**
     * Get facade accessor instance
     *
     * @access public
     * @return mixed
     * @throws \Exception
     */
    public static function getFacadeRoot()
    {
        $accessor = static::getFacadeAccessor();
        if (! isset(self::$facadeAccessorInstances[$accessor])) {
            self::$facadeAccessorInstances[$accessor] = new $accessor();
        }
        return self::$facadeAccessorInstances[$accessor];
    }

    /**
     * Delegate calling methods to the facade accessor
     *
     * @access public
     * @param $method
     * @param array $args
     * @return int
     */
    public static function __callStatic($method, array $args = array())
    {
        return ObjectExecutor::call(static::getFacadeRoot(), $method, $args);
    }

    /**
     * Alias of __callStatic for calling from instance
     *
     * @access public
     * @param $method
     * @param array $args
     * @return int
     */
    public function __call($method, array $args = array())
    {
        return static::__callStatic($method, $args);
    }
} 