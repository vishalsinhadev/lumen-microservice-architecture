<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\SearchableTrait;
use App\Http\Traits\Scopes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{

    use SearchableTrait, Scopes, SoftDeletes;

    protected $table = 'branches';

    protected $primaryKey = 'id';

    protected $fillable = [
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
        'state_id',
        'created_by'
    ];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'id' => 10,
            'name' => 10,
            'address_line1' => 9,
            'address_line2' => 9
        ]
    ];

    protected $perPage = 10;

    public static $rules = [
        'name' => 'required',
        'address_line1' => 'required',
        // 'address_line2' => 'required',
        'zip_code' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'currency' => 'required',
        'email' => 'required|email|unique:branches,email|unique:users,email',
        'tax_id_gst' => 'required',
        'mobile' => 'required'
        // 'telephone' => 'required'
    ];

    public function createUser()
    {
        $model = User::where([
            'email' => $this->email
        ])->first();
        if ($model == null) {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make('welcome2021'),
                'phone' => $this->mobile,
                'role_id' => User::ROLE_BRANCH_ADMIN
            ]);
        }
    }

    public function mobileCountry()
    {
        return $this->belongsTo(Country::class, 'mobile_country_code', 'id');
    }

    public function telephoneCountry()
    {
        return $this->belongsTo(Country::class, 'tel_country_code', 'id');
    }

    public function getNoOfUsers()
    {
        return 0;
    }

    public function deleteRelated()
    {
        $branchId = $this->id;
    }
}
