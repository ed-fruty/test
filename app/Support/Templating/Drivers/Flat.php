<?php
namespace App\Support\Templating\Drivers;

use App\Support\Templating\Contracts\TemplateDriverInterface;
use App\Support\Facades\App;
use App\Support\Facades\Config;

/**
 * Class Flat
 * @package App\Support\Templating\Drivers
 * @author Fruty <ed.fruty@gmail.com>
 */
class Flat implements TemplateDriverInterface
{
    /**
     * @var array
     */
    protected $toShare = [];

    /**
     * Share variable to the all templates
     *
     * @access public
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    public function share($name, $value)
    {
        $this->toShare[$name] = $value;
    }

    /**
     * Get template source as string
     *
     * @access public
     * @param string $template
     * @param array $data
     * @return mixed
     */
    public function get($template, array $data = array())
    {
        ob_start();
            $this->show($template, $data);
        return ob_get_clean();
    }

    /**
     * Send template data to the output
     *
     * @access public
     * @param string $template
     * @param array $data
     * @return mixed
     */
    public function show($template, array $data = array())
    {
        if (is_file($filename = App::getPath(Config::get('views')['templatePath']).str_replace('.', DIRECTORY_SEPARATOR, $template).".php")) {
            extract($this->toShare);
            extract($data);
            return require $filename;
        }
        throw new \InvalidArgumentException("Template {$template} not found", 500);
    }
}