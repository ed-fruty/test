<?php
namespace App\Task\Contracts;

/**
 * Interface DataProviderInterface
 * @package App\Task\Contracts
 * @category DataProviderInterface
 * @author Fruty <ed.fruty@gmail.com>
 */
interface DataProviderInterface 
{
    /**
     * Load source data
     */
    public function loadResource();

    /**
     * Set data group
     *
     * @param string $group
     * @return $this
     */
    public function setGroup($group);

    /**
     * Collect data
     *
     * @return \App\Task\DataCollection
     */
    public function collect();
} 