<?php
namespace App\Controllers;

use App\Support\Facades\View;
use App\Support\Facades\Request;
use App\Task\Manager as ProviderManager;

/**
 * Class HomeController
 * @package App\Controllers
 * @author Fruty <ed.fruty@gmail.com>
 */
class HomeController
{
    /**
     * Index action
     *
     * @access public
     * @return mixed
     */
    public function index()
    {
        return View::get('home.index');
    }

    /**
     * @return string
     */
    public function ajaxGetFilterData()
    {
        try {
            $request = Request::only(['data_source', 'group', 'filter_field', 'filter_type', 'filter_value', 'sort_by', 'sort_type']);

            // create source data provider instance
            $collection = ProviderManager::factory($request['data_source'])
                // set data group
                ->setGroup($request['group'])
                // create data collection
                ->collect()
                // filter data (new instance of collection with filtered data returns)
                ->filter($request['filter_field'], $request['filter_type'], $request['filter_value'])
                // sort filtered data
                ->sort($request['sort_by'], $request['sort_type']);

            $html = View::get('home.filter', compact('collection'));

            return $this->jsonResponse($html);

        } catch (\Exception $e) {
            return $this->jsonResponse($e->getMessage(), false);
        }
    }

    /**
     * @param mixed $data
     * @param bool $success
     * @return string
     */
    private function jsonResponse($data, $success = true)
    {
        return json_encode(compact('data', 'success'));
    }
} 