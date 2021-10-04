<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Resources\Branch;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'name' => $this->name,
            'address_line1' => $this->address_line1,
            'address_line2' => $this->address_line2,
            'zip_code' => $this->zip_code,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'currency' => $this->currency,
            'email' => $this->email,
            'tax_id_gst' => $this->tax_id_gst,
            'mobile' => $this->mobile,
            'state_id' => $this->state_id,
            'no_of_users' => $this->getNoOfUsers(),
            'mobile_country_code' => $this->mobile_country_code,
            'tel_country_code' => $this->tel_country_code,
            'mobile_country_code' => $this->country,
            'tel_country_code' => $this->country,
            'telephone' => $this->telephone,
            'ext' => $this->ext
        ];
    }
}
