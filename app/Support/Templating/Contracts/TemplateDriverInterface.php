<?php
namespace App\Support\Templating\Contracts;

/**
 * Interface TemplateDriverInterface
 * @package App\Support\Templating\Contracts
 * @author Fruty <ed.fruty@gmail.com>
 */
interface TemplateDriverInterface
{
    /**
     * Share variable to the all templates
     *
     * @access public
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    public function share($name, $value);

    /**
     * Get template source as string
     *
     * @access public
     * @param string $template
     * @param array $data
     * @return mixed
     */
    public function get($template, array $data = array());

    /**
     * Send template data to the output
     *
     * @access public
     * @param string $template
     * @param array $data
     * @return mixed
     */
    public function show($template, array $data = array());
} 