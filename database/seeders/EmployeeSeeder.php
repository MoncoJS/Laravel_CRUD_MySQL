<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::insert([
            ['empNo' => 'EMP0001', 'empName' => 'Suree', 'empDepID' => 2, 'empSalary' => 15000, 'empManager' => null, 'empStatus' => 1],
            ['empNo' => 'EMP0002', 'empName' => 'Jirasak', 'empDepID' => 1, 'empSalary' => 12000, 'empManager' => 1, 'empStatus' => 1],
            ['empNo' => 'EMP0003', 'empName' => 'Nattaporn', 'empDepID' => 1, 'empSalary' => 12000, 'empManager' => 1, 'empStatus' => 1],
            ['empNo' => 'EMP0004', 'empName' => 'Sarawut', 'empDepID' => 3, 'empSalary' => 18000, 'empManager' => null, 'empStatus' => 1],
            ['empNo' => 'EMP0005', 'empName' => 'Peerakorn', 'empDepID' => 2, 'empSalary' => 15000, 'empManager' => 1, 'empStatus' => 1],
            ['empNo' => 'EMP0006', 'empName' => 'Naruechai', 'empDepID' => 3, 'empSalary' => 17000, 'empManager' => 4, 'empStatus' => 1],
        ]);        
    }
}
