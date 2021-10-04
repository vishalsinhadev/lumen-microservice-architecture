<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Service\Company\CompanyService;
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
        return $this->successWithData($this->service->list($request));
    }

    public function create(Request $request)
    {
        return $this->successWithData($this->service->create($request));
    }

    public function edit(Request $request, $id)
    {
        return $this->successWithData($this->service->edit($request, $id));
    }

    public function get(Request $request)
    {
        return $this->successWithData($this->service->getOne($request));
    }
}