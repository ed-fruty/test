<?php
namespace App\Task\DataProviders;

use App\Task\Contracts\DataProviderInterface;
use App\Support\Facades\App;
use App\Task\DataCollection;

/**
 * Class JsonProvider
 * @package App\Task\DataProviders
 * @category JsonProvider
 * @author Fruty <ed.fruty@gmail.com>
 */
class JsonProvider extends AbstractProvider implements DataProviderInterface
{
    /**
     * Load source data
     *
     */
    public function loadResource()
    {
        if (! is_file($filename = App::getPath('resources/data/data.json'))) {
            throw new \Exception("Data source not found", 500);
        }

        $content = file_get_contents($filename);
        $this->source = json_decode($content) ?: json_decode(stripslashes($content));
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
        foreach ($this->source as $item) {
            $this->groupItems[] = [
                'code' => (string) $item[0],
                'name' => (string) $item[1],
                'price'=> (float) $item[2],
            ];
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
        return new DataCollection($this->groupItems);
    }
}