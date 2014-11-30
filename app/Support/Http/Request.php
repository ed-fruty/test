<?php
namespace App\Support\Http;

use App\Support\Traits\ClassNameTrait;

/**
 * Class Request
 * @package App\Support\Http
 * @author Fruty <ed.fruty@gmail.com>
 */
class Request
{
    use ClassNameTrait;

    /**
     * Get current uri
     *
     * @return mixed
     */
    public function getUri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Get request variable
     *
     * @access public
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return isset($_REQUEST[$name]) ? filter_var($_REQUEST[$name], FILTER_SANITIZE_STRING) : $default;
    }

    /**
     * Mass getting data from request by keys
     *
     * @access public
     * @param array $items
     * @return array
     */
    public function only(array $items)
    {
        $result = [];
        foreach ($items as $item) {
            $result[$item]  = $this->get($item);
        }
        return $result;
    }
} 