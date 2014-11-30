<?php
namespace App\Task\DataProviders;

use App\Task\Contracts\DataProviderInterface;

/**
 * Class AbstractProvider
 * @package App\Task\DataProviders
 * @category AbstractProvider
 * @author Fruty <ed.fruty@gmail.com>
 */
abstract class AbstractProvider implements DataProviderInterface
{
    /**
     * Source data
     *
     * @var mixed
     */
    protected $source;

    /**
     * Group data
     *
     * @var mixed
     */
    protected $groupItems = [];

    /**
     * Constructor
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->loadResource();
    }
} 