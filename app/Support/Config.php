<?php
namespace App\Support;

use App\Support\Facades\App;
use App\Support\Traits\ClassNameTrait;

/**
 * Class Config
 * @package App\Support
 * @category Config
 * @author Fruty <ed.fruty@gmail.com>
 */
class Config
{
    use ClassNameTrait;

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Try to load environment configuration from /bootstrap/{ENVIRONMENT}/ directory
     * Or load it from /bootstrap/ if it doesn't exists in environment catalog
     *
     * @access public
     * @throws \RuntimeException
     */
    public function __construct()
    {
        $configFiles = [
            '/config/'.App::getEnvironment().'/config.php',
            '/config/config.php',
        ];

        foreach ($configFiles as $file) {
            if (is_file($filename = App::getProjectRootDirectory().$file)) {
                $this->config = require $filename;
                return $this;
            }
        }
        throw new \RuntimeException("Configuration file not found", 500);
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return isset($this->config[$key]) ? $this->config[$key] : $default;
    }
} 