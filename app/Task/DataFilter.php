<?php
namespace App\Task;

/**
 * Class DataFilter
 * @package App\Task
 * @author Fruty <ed.fruty@gmail.com>
 */
class DataFilter
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param array $items
     */
    public function __construct(&$items)
    {
        $this->items = $items;
    }

    /**
     * Filter data where field value less than request value
     *
     * @access public
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function lessThan($field, $value)
    {
        return array_filter($this->items, function($item) use ($field, $value)
        {
            return $item[$field] < $value;
        });
    }

    /**
     * Filter data where field value less than or equal to the request value
     *
     * @access public
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function lessThanOrEqual($field, $value)
    {
        return array_filter($this->items, function($item) use ($field, $value)
        {
            return $item[$field] <= $value;
        });
    }

    /**
     * Filter data where field value equal to the request value
     *
     * @access public
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function equalTo($field, $value)
    {
        return array_filter($this->items, function($item) use ($field, $value)
        {
            return $item[$field] == $value;
        });
    }

    /**
     * Filter data where field value more than request value
     *
     * @access public
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function moreThan($field, $value)
    {
        return array_filter($this->items, function($item) use ($field, $value)
        {
            return $item[$field] > $value;
        });
    }

    /**
     * Filter data where field value more than or equal to the request value
     *
     * @access public
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function moreThanOrEqual($field, $value)
    {
        return array_filter($this->items, function($item) use ($field, $value)
        {
            return $item[$field] >= $value;
        });
    }

    /**
     * Filter data where field value like request value
     *
     * @access public
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function like($field, $value)
    {
        return array_filter($this->items, function($item) use ($field, $value)
        {
            similar_text($item[$field], $value, $percentage);
            return $percentage >= 80 || strpos($item[$field], $value) !== false;
        });
    }
} 