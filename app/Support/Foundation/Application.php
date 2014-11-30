<?php
namespace App\Support\Foundation;
use App\Support\Traits\ClassNameTrait;

/**
 * Class Application
 * @package app\Support
 * @author Fruty <ed.fruty@gmail.com>
 */
class Application
{
    use ClassNameTrait;

    /**
     * Application environment
     *
     * @access protected
     * @var string
     */
    protected $env;

    /**
     * @var string
     */
    protected $projectRootDirectory;

    /**
     * @var array
     */
    protected $config = [];



    /**
     * Detect current environment
     *
     * @access public
     * @param callable $closure
     */
    public function detectEnvironment(\Closure $closure)
    {
        $this->env = $closure();
    }

    /**
     * Get current environment
     *
     * @access public
     * @return string
     */
    public function getEnvironment()
    {
        return $this->env;
    }

    /**
     * @return string
     */
    public function getProjectRootDirectory()
    {
        return $this->projectRootDirectory;
    }

    /**
     * @param string $projectRootDirectory
     */
    public function setProjectRootDirectory($projectRootDirectory)
    {
        $this->projectRootDirectory = $projectRootDirectory;
    }

    /**
     * @param $path
     * @return string
     */
    public function getPath($path)
    {
        return $this->getProjectRootDirectory().$path;
    }
} 