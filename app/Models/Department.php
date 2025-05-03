<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    protected $fillable = ['depName', 'depStatus'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'empDepID');
    }
}
