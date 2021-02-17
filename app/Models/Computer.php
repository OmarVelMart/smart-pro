<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'cpu',
        'ram',
        'storage',
        'version_office',
        'model',
        'mark',
        'quantity',
        'condition',
        'details',
        'area',
        'status',
        'employees_id'
    ];

    public function employees(){
        return $this->belongsTo('App\Models\Employee');
    }
}
