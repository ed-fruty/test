<?php
namespace App\Task\DataProviders;

use App\Task\Contracts\DataProviderInterface;
use App\Task\DataCollection;
use App\Support\Facades\App;

/**
 * Class PhpProvider
 * @package App\Task\DataProviders
 * @category PhpProvider
 * @author Fruty <ed.fruty@gmail.com>
 */
class ArrayProvider extends AbstractProvider implements DataProviderInterface
{

    /**
     * Load source data
     *
     * @throws \Exception
     */
    public function loadResource()
    {
        if (! is_file($filename = App::getPath('resources/data/data.php'))) {
            throw new \Exception("Data source not found", 500);
        }

        $this->source = require $filename;
        if (! is_array($this->source)) {
            throw new \Exception("Wrong data type", 500);
        }
    }

    /**
     * Set data group
     *
     * @param string $group
     * @return $this
     */
    public function setGroup($group)
    {
        if (isset($this->source[$group])) {
            $this->groupItems = $this->source[$group];
        } else {
            // no group selected, collect data from all groups
            foreach ($this->source as $group) {
                foreach ($group as $code => $attributes) {
                    $this->groupItems[$code] = $attributes;
                }
            }
        }

        return $this;
    }

    /**
     * Collect data
     *
     * @return \App\Task\DataCollection
     */
    public function collect()
    {
        $items = [];

        foreach ($this->groupItems as $code => $el) {
            $items[] = [
                'code' => (string) $code,
                'name' => (string) $el['name'],
                'price' => (float) $el['value'],
            ];
        }
        return new DataCollection($items);
    }
}