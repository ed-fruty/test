<?php
namespace App\Support\Http;

/**
 * Class Response
 * @package app\Support\Http
 * @author Fruty <ed.fruty@gmail.com>
 */
class Response
{
    public function __construct($content)
    {
        echo $content;
    }
} 