<?php
namespace App\Support\Foundation;

use App\Support\Contracts\ServiceProviderInterface;
use App\Support\Facades\Config;
use App\Support\Facades\Router;
use App\Support\Http\Response;

/**
 * Class Kernel
 * @package App\Support\Kernel
 * @author Fruty <ed.fruty@gmail.com>
 */
class Kernel
{
    /**
     * Run application
     *
     * @access public
     */
    public function run()
    {
        $this->registerServiceProviders()
            ->bootServiceProviders()
            ->handle();
    }

    /**
     * Register service provider
     *
     * @access protected
     * @return $this
     */
    protected function registerServiceProviders()
    {
        foreach (Config::get('serviceProviders') as $provider) {
            $this->getServiceProviderInstance($provider)->register();
        }
        return $this;
    }

    /**
     * Register service provider
     *
     * @access protected
     * @return $this
     */
    protected function bootServiceProviders()
    {
        foreach (Config::get('serviceProviders') as $provider) {
            $this->getServiceProviderInstance($provider)->boot();
        }
        return $this;
    }

    /**
     * Get service provider instance
     *
     * @access protected
     * @param string $provider
     * @return ServiceProviderInterface
     */
    protected function getServiceProviderInstance($provider)
    {
        static $providers = [];
        if (! isset($providers[$provider])) {
            $providers[$provider] = new $provider();
            if ($providers[$provider] instanceof ServiceProviderInterface === false) {
                throw new \RuntimeException("Service provider must implement interface 'App\\Support\\Contracts\\ServiceProviderInterface'", 500);
            }
        }
        return $providers[$provider];
    }

    /**
     * @return Response
     */
    public function handle()
    {
        ob_start();
            $result = Router::handle();
        $content = ob_get_clean();
        return new Response($content ?: $result);
    }
} 