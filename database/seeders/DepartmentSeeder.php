<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Department::insert([
            ['depName' => 'Marketing', 'depStatus' => 1],
            ['depName' => 'Accounting', 'depStatus' => 1],
            ['depName' => 'IT', 'depStatus' => 1],
        ]);
        
    }
    
}
