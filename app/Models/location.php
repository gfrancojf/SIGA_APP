<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at' ];




    public function employee()
    {
        return $this->hasMany(Employees::class);
    }


}