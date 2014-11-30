<?php
namespace App\Task\DataProviders;

use App\Task\Contracts\DataProviderInterface;
use App\Support\Facades\App;
use App\Task\DataCollection;

/**
 * Class XmlProvider
 * @package App\Task\DataProviders
 * @author Fruty <ed.fruty@gmail.com>
 */
class XmlProvider extends AbstractProvider implements DataProviderInterface
{

    /**
     * Load source data
     */
    public function loadResource()
    {
        if (! is_file($filename = App::getPath('resources/data/data.xml'))) {
            throw new \Exception("Data source not found", 500);
        }
        $this->source = new \SimpleXMLElement($filename, 0, true);
    }

    /**
     * Set data group
     *
     * @param string $group
     * @return $this
     */
    public function setGroup($group)
    {
        foreach ($this->source->Item as $item) {
             if ($item['Type'] == $group || ! $group) {
                $this->groupItems[] = [
                    'code' => (string) $item->Code,
                    'name' => (string) $item->Description,
                    'price'=> (float) $item->Value
                ];
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
        return new DataCollection($this->groupItems);
    }
}