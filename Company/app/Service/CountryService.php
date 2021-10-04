<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Service;

use App\Models\Country;

class CountryService
{

    private $model = Country::class;

    public function list($request)
    {
        $model = $this->model::search($request->get('q'))->handleSort($request);
        return $model;
    }
}