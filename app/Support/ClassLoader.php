<?php
namespace App\Support;

/**
 * Class ClassLoader
 * @package App\Support
 * @author Fruty <ed.fruty@gmail.com>
 */
class ClassLoader
{
    /**
     * @var array
     */
    protected $psr4 = [];

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    /**
     * Registered class load function
     *
     * @access public
     * @param string $class
     * @throws \Exception
     */
    public function loadCLass($class)
    {
        if (! $this->loadClasspsr4($class)) {
            throw new \Exception("Class {$class} not found", 500);
        }
    }

    /**
     * Load class with psr-4 standard
     *
     * @access protected
     * @param $class
     * @return mixed
     */
    protected function loadClassPsr4($class)
    {
        foreach ($this->psr4 as $namespace => $catalogs) {
            if (substr($class, 0, strlen($namespace)) == $namespace) {
                $needClass = substr($class, strlen($namespace));
                foreach ($catalogs as $catalog) {
                    if (is_file($filename = $catalog.$this->getClassPath($needClass))) {
                        return require_once $filename;
                    }
                }
            }
        }
    }

    /**
     * Get class path
     *
     * @access public
     * @param string $class
     * @return string
     */
    public function getClassPath($class)
    {
        return str_replace(['\\', '_'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $class) . ".php";
    }

    /**
     * Set namespace catalog with psr-4 standard
     *
     * @access public
     * @param string $namespace
     * @param string $catalog
     * @throws \Exception
     */
    public function setPsr4($namespace, $catalog)
    {
        if (substr($namespace, -1) !== '\\') {
            throw new \Exception("Namespace must end with backslash '\\'", 500);
        }
        if (substr($catalog, -1) !== DIRECTORY_SEPARATOR) {
            throw new \Exception("Namespace catalog must end with slash '/", 500);
        }
        $this->psr4[$namespace][] = $catalog;
    }
} 