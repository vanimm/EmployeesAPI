<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $table= "employees";

    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'address',
        'phone',
        'website',
        'company'
    ];
}
