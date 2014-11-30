<?php
namespace App\Support\Templating;

use App\Support\Facades\Config;
use App\Support\ObjectExecutor;
use App\Support\Templating\Contracts\TemplateDriverInterface;
use App\Support\Traits\ClassNameTrait;

/**
 * Class View
 * @package App\Support\Templating
 * @author Fruty <ed.fruty@gmail.com>
 */
class View
{
    use ClassNameTrait;

    /**
     * Template drivers
     *
     * @access protected
     * @var array
     */
    protected $drivers;

    /**
     * Current driver name
     *
     * @acces protected
     * @var string
     */
    protected $current;


    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->setDriver(Config::get('views')['driver']);
    }

    /**
     * @param string $driver
     */
    public function setDriver($driver)
    {
        $this->current = $driver;
    }

    /**
     * @return mixed
     */
    protected function getDriver()
    {
        if (! isset($this->drivers[$this->current])) {
            $driverClass = "App\\Support\\Templating\\Drivers\\".ucfirst($this->current);
            $this->drivers[$this->current] = new $driverClass();
            if ($this->drivers[$this->current] instanceof TemplateDriverInterface === false) {
                throw new \RuntimeException("Template driver must implement TemplateDriverInterface", 500);
            }
        }
        return $this->drivers[$this->current];
    }

    /**
     * Delegate calls to the driver
     *
     * @access public
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args = array())
    {
        return ObjectExecutor::call($this->getDriver(), $method, $args);
    }
} 