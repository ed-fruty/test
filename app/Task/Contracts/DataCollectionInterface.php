<?php
namespace App\Task\Contracts;

/**
 * Interface DataCollectionInterface
 * @package App\Task\Contracts
 * @author Fruty <ed.fruty@gmail.com>
 */
interface DataCollectionInterface 
{
    /**
     * Sort collection data
     *
     * @access public
     * @param string $field
     * @param string $type
     * @return $this
     */
    public function sort($field, $type);

    /**
     * Filter collection data
     *
     * @access public
     * @param $field
     * @param $type
     * @param $value
     * @return mixed
     */
    public function filter($field, $type, $value);
} 