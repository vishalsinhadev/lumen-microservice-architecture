<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Service;

use App\Models\State;

class StateService
{

    private $model = State::class;

    public function list($request)
    {
        $model = $this->model::search($request->get('q'));
        if ($request->get('country_id', '') != '') {
            $model->where([
                'country_id' => $request->get('country_id')
            ]);
        }
        $model->handleSort($request);
        return $model;
    }
}