<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Resources\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'organisation_name' => $this->organisation_name,
            'organisation_alias' => $this->organisation_alias,
            'primary_administrator_name' => $this->primary_administrator_name,
            'company_website' => $this->company_website,
            'phone' => $this->phone,
            'email' => $this->email
        ];
    }
}
