<?php
namespace App\Task;

use App\Task\Contracts\DataCollectionInterface;

/**
 * Class DataCollection
 * @package App\Task
 * @category DataCollection
 * @author Fruty <ed.fruty@gmail.com>
 */
class DataCollection implements DataCollectionInterface
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param array $items
     */
    public function __construct(array $items = array())
    {
        $this->items = $items;
    }


    /**
     * Sort collection data
     *
     * @access public
     * @param string $field
     * @param string $type
     * @return $this
     */
    public function sort($field, $type)
    {
        if ($this->isEmpty() || ! $field || ! $type) {
            return $this;
        }

        if (! isset($this->first()[$field])) {
            throw new \InvalidArgumentException("Field {$field} not found", 500);
        }
        usort($this->items, function($a, $b) use ($field, $type)
        {
            // replace places between arrays, when desc sorting
            $first  = ($type == 'asc') ? $a : $b;
            $second = ($type == 'asc') ? $b : $a;

//            if ((float) $first[$field] && (float) $second[$field]) {
//                // for numeric elements
//                return $first[$field] - $second[$field];
//            } else {
                // for strings
                return strcmp($first[$field], $second[$field]);
            //}
        });
        return $this;
    }

    /**
     * Filter collection data. New instance with filtered data will be created
     *
     * @access public
     * @param $field
     * @param $type
     * @param $value
     * @return DataCollection
     */
    public function filter($field, $type, $value)
    {
        if (! $field || ! $type || $this->isEmpty()) {
            return new static($this->items);
        }

        if (! isset($this->first()[$field])) {
            throw new \InvalidArgumentException("Field {$field} does not exists" . print_r($this->first(), 1), 500);
        }

        $filter = $this->getFilter();
        if (! is_callable([$filter, $type])) {
            throw new \InvalidArgumentException("Filter {$type} does not exists", 500);
        }
        return new static($filter->$type($field, $value));
    }

    /**
     * Get filter instance
     *
     * @access public
     * @return DataFilter
     */
    protected function getFilter()
    {
        return new DataFilter($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key = null, $default = null)
    {
        if (is_null($key)) {
            return $this->items;
        }
        return isset($this->items[$key]) ? $this->items[$key] : $default;
    }

    /**
     * @return array
     */
    public function first()
    {
        return reset($this->items);
    }
}