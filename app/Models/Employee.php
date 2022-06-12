<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $id
 * @property $name
 * @property $dni
 * @property $first_lastname
 * @property $second_lastname
 * @property $birthday
 * @property $gender
 * @property $phone
 * @property $cell_phone
 * @property $company_id
 * @property $departament_id
 * @property $date_of_admission
 * @property $date_of_egress
 * @property $files
 * @property $created_at
 * @property $updated_at
 *
 * @property Branch $branch
 * @property Departament $departament
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{ protected $guarded =['id','created_at','updated_at' ];

  
    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'company_id');
    }
   
    public function departament()
    {
        return $this->hasOne('App\Models\Departament', 'id', 'departament_id');
    }
    

    public function position()
    {
        return $this->hasOne('App\Models\Position', 'id', 'position_id');
    }

    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }

}
