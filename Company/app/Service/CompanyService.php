<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Service;

use App\Models\Company;

class CompanyService
{

    private $model = Company::class;

    public function list($request)
    {
        $model = $this->model::search($request->get('q'))->handleSort($request);
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
    
    public function getOne()
    {
        $model = $this->model::first();
        return $model;
    }

    public function store($request, $id = null)
    {
        $fields = [
            'organisation_name',
            'organisation_alias',
            'primary_administrator_name',
            'company_website',
            'phone',
            'email'
        ];
        if ($id !== null) {
            $model = $this->get($id);
            $model->update($request->only($fields));
            return $model;
        }
        return $this->model::create($request->only($fields));
    }
}