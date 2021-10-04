<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Service\Company\BranchService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ApiResponseTrait;

    public $service;

    public function __construct(BranchService $service)
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

    public function changeStatus(Request $request, $id)
    {
        return $this->successWithData($this->service->changeStatus($request, $id));
    }

    public function delete($id)
    {
        return $this->successWithData($this->service->delete($id));
    }
}