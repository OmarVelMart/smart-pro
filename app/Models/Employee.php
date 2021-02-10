<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'email',
    'area',
    'phone',
    'status',
    'password',
    'url'];

    public function computer(){
        return $this->hasOne('App\Models\Computer','employees_id');
    }



}
