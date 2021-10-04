<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Controllers;

use App\Http\Resources\Branch\BranchResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Branch;
use App\Service\BranchService;
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
        $data = [];
        $models = $this->service->list($request);
        $models = $models->paginate();
        $data['result'] = BranchResource::collection($models);
        $data['pagination'] = getPaginationData($models);
        return $this->successWithData($data);
    }

    public function create(Request $request)
    {
        $data = [];
        $this->validate($request, Branch::$rules);
        $model = $this->service->store($request);
        $model->createUser();
        $data['result'] = new BranchResource($model);
        return $this->successWithData($data, 'Branch Created');
    }

    public function edit(Request $request, $id)
    {
        $data = [];
        $this->validate($request, [
            'name' => 'required',
            'address_line1' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'currency' => 'required',
            'email' => 'required|email|unique:branches,email,' . $request->id,
            'tax_id_gst' => 'required',
            'mobile' => 'required'
        ]);
        $model = $this->service->store($request, $id);
        $data['result'] = new BranchResource($model);
        return $this->successWithData($data, 'Branch Updated');
    }

    public function changeStatus(Request $request, $id)
    {
        $data = [];
        $this->validate($request, [
            'state_id' => 'required|in:1,0'
        ]);
        $this->service->changeStatus($id, $request->get('state_id'));
        return $this->successWithData($data, 'Successfully Update');
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return $this->successWithData([], 'Branch Deleted');
    }
}