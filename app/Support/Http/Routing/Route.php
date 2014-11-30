<?php
namespace App\Support\Http\Routing;

/**
 * Class Route
 * @package App\Support\Routing
 * @author Fruty <ed.fruty@gmail.com>
 */
class Route
{
    /**
     * @var string
     */
    protected $uri;

    /**
     * @var mixed [string|\Closure]
     */
    protected $action;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function getRegex()
    {
        return "~^{$this->uri}$~i";
    }

    /**
     * Dispatch route
     *
     * @return mixed
     */
    public function dispatch()
    {
        if (is_callable($this->action)) {
            $action = $this->action;
            return $action();
        }
        if (strpos($this->action, '@') === false) {
            throw new \RuntimeException("Bad action {$this->action} for the route", 500);
        }
        list($controller, $action) = explode("@", $this->action);
        $controller = new $controller();
        if (is_callable([$controller, $action])) {
            return $controller->$action();
        }
        throw new \BadMethodCallException("Call undefined controller method {$action}", 500);
    }
} 