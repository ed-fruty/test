<?php
namespace App\Support\Traits;

/**
 * Trait ClassnameTrait
 * @package App\Support\Traits
 * @author Fruty <ed.fruty@gmail.com>
 */
trait ClassNameTrait
{
    /**
     * @return string
     */
    public static function className()
    {
        return get_called_class();
    }
} 