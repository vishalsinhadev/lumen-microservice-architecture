<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Service\Company;

use App\Http\Traits\ExternalService;

class CompanyService
{
    use ExternalService;

    private $name = '/company/';
    
    public function __construct()
    {
        $this->baseUri = config('services.company.base_uri');
        $this->secret = config('services.company.secret');
    }
    
    public function list($request)
    {
        return $this->performRequest('GET', $this->name, $request->all());
    }
    
    public function create($request)
    {
        return $this->performRequest('POST', $this->name . 'create', $request->all());
    }
    
    public function edit($request, $id)
    {
        return $this->performRequest('PUT', $this->name . "edit/$id", $request->all());
    }
    
    public function changeStatus($request, $id)
    {
        return $this->performRequest('POST', $this->name . 'change-status/'.$id, $request->all());
    }
    
    public function getOne($request)
    {
        return $this->performRequest('GET', $this->name . "get", $request->all());
    }
}