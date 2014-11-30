<?php
namespace App\Support\Http\Routing;

use App\Support\Facades\Request;
use App\Support\Traits\ClassNameTrait;

/**
 * Class Router
 * @package App\Support\Routing
 * @author Fruty <ed.fruty@gmail.com>
 */
class Router
{
    use ClassNameTrait;

    /**
     * Registered routes
     *
     * @access protected
     * @var array
     */
    protected $routes = [];

    /**
     * @var \Closure
     */
    protected $action404;

    /**
     * Register route
     *
     * @access public
     * @param string $uri
     * @param mixed [string|\Closure] $action
     */
    public function map($uri, $action)
    {
        $route = new Route();
        $route->setUri($uri);
        $route->setAction($action);

        $this->routes[] = $route;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->routes as $route) {
            if ($this->matchRequest($route)) {
                /** @var Route $route */
                return $route->dispatch();
            }
        }
        return $this->show404();
    }

    /**
     * @param $route
     * @return int
     */
    protected function matchRequest(Route $route)
    {
        return preg_match($route->getRegex(), Request::getUri());
    }

    /**
     * @param callable $closure
     * @return mixed
     */
    public function show404(\Closure $closure = null)
    {
        if ($closure) {
            $this->action404 = $closure;
        } else {
            $closure = $this->action404;
            if (! is_callable($closure)) {
                throw new \InvalidArgumentException("404 page handler not defined");
            }
            return $closure();
        }
    }
} 