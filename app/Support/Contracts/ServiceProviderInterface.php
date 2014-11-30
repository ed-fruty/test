<?php
namespace App\Support\Contracts;

/**
 * Interface ServiceProviderInterface
 * @package App\Support\Contracts
 * @author Fruty <ed.fruty@gmail.com>
 */
interface ServiceProviderInterface 
{
    /**
     * Method will be executed before application booting
     *
     * @access public
     * @return void
     */
    public function register();


    /**
     * Method will be executed after application booting
     * So if your provider has dependency or relationships with other providers use boot methods
     * When all other providers registered already
     *
     * @access public
     * @return void
     */
    public function boot();
} 