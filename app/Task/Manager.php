<?php
namespace App\Task;

use App\Support\Facades\Config;

/**
 * Class DataProviderManager
 * @package App\Task
 * @author Fruty <ed.fruty@gmail.com>
 */
class Manager
{
    /**
     * Create data source provider instance
     *
     * @access public
     * @param string $type
     * @return \App\Task\Contracts\DataProviderInterface
     */
    public static function factory($type)
    {
        if (! static::existsProvider($type)) {
            throw new \InvalidArgumentException("Data provider {$type} does not exists", 500);
        }

        $providerClass = __NAMESPACE__.'\\DataProviders\\' . ucfirst($type) . "Provider";

        return new $providerClass();
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return Config::get('dataProviders');
    }

    /**
     * Check if exists provider
     *
     * @access public
     * @param string $type
     * @return bool
     */
    public static function existsProvider($type)
    {
        return in_array($type, static::getList());
    }
} 