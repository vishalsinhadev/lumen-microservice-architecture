<?php
/**
 * @author Vishal Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\SearchableTrait;
use App\Http\Traits\Scopes;
use Illuminate\Support\Facades\Hash;

class Company extends Model
{
    use SearchableTrait, Scopes;

    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'organisation_name',
        'organisation_alias',
        'primary_administrator_name',
        'company_website',
        'phone',
        'email',
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
            'organisation_name' => 10,
            'organisation_alias' => 10
        ]
    ];
    
    protected $perPage = 10;

    public static $rules = [
        'organisation_name' => 'required',
        'organisation_alias' => 'required',
        'primary_administrator_name' => 'required',
        'company_website' => 'required',
        'phone' => 'required',
        'email' => 'required'
    ];

    public function createUser()
    {
        $model = User::where([
            'email' => $this->email
        ])->first();
        if ($model == null) {
            User::create([
                'name' => $this->organisation_name,
                'email' => $this->email,
                'password' => Hash::make('welcome2021'),
                'phone' => $this->phone
            ]);
        }
    }
}
