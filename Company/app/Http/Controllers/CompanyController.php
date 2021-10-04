<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Controllers;

use App\Http\Resources\Company\CompanyResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Company;
use App\Service\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use ApiResponseTrait;

    public $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
        $data = [];
        $models = $this->service->list($request);
        $models = $models->paginate();
        $data['result'] = CompanyResource::collection($models);
        $data['pagination'] = getPaginationData($models);
        return $this->successWithData($data);
    }

    public function create(Request $request)
    {
        $data = [];
        $this->validate($request, Company::$rules);
        $model = Company::first();
        if ($model == null) {
            $model = $this->service->store($request);
        }
        $data['result'] = new CompanyResource($model);
        return $this->successWithData($data, 'Company Created');
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        $this->validate($request, Company::$rules);
        $model = $this->service->store($request, $id);
        $data['result'] = new CompanyResource($model);
        return $this->successWithData($data, 'Company Updated');
    }

    public function get(Request $request)
    {
        $data = [];
        $model = Company::first();
        $data['result'] = new CompanyResource($model);
        return $this->successWithData($data, 'Company');
    }
}