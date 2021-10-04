<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Service;

use App\Models\Branch;

class BranchService
{

    private $model = Branch::class;

    public function list($request)
    {
        $model = $this->model::search($request->get('q'))->handleSort($request);
        if (! isSuperAdmin()) {
            $model = $model->active();
        }
        if (isBranchAdmin()) {
            $model = $model->where([
                'email' => auth()->user()->email
            ]);
        }
        return $model;
    }

    public function get($id)
    {
        $model = $this->model::where([
            'id' => $id
        ]);
        $model = $model->first();
        return $model;
    }

    public function store($request, $id = null)
    {
        $fields = [
            'name',
            'address_line1',
            'address_line2',
            'zip_code',
            'country',
            'state',
            'city',
            'currency',
            'email',
            'tax_id_gst',
            'mobile',
            'telephone',
            'mobile_country_code',
            'tel_country_code',
            'ext',
            'state_id'
        ];
        if ($id !== null) {
            $model = $this->get($id);
            $model->update($request->only($fields));
            return $model;
        }
        // if (isSuperAdmin()){
        $request->merge([
            'state_id' => 1
        ]);
        // }
        return $this->model::create($request->only($fields));
    }

    public function changeStatus($id, $status)
    {
        $model = $this->get($id);
        return $model->update([
            'state_id' => $status
        ]);
    }

    public function delete($id)
    {
        $model = $this->get($id);
        if ($model != null) {
            $model->deleteRelated();
            $model->delete();
        }
    }
}