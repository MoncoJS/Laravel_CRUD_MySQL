<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'empNo',
        'empName',
        'empDepID',
        'empSalary',
        'empManager',
        'empStatus',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'empDepID');
    }
}
