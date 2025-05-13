
# Employee Management System (Laravel + MySQL)

โปรเจกต์นี้คือระบบจัดการพนักงาน (Employee) และแผนก (Department) ที่พัฒนาโดยใช้ **Laravel Framework** และ **MySQL** ครอบคลุมการเพิ่ม-ลบ-แก้ไข-แสดง (CRUD) พร้อมข้อมูลตัวอย่างและหน้า Dashboard สำหรับแสดงจำนวนพนักงานในแต่ละแผนก

---

## 🏗️ ความสามารถหลัก

✅ จัดการข้อมูลพนักงาน (เพิ่ม/แก้ไข/ลบ/แสดง)  
✅ จัดการข้อมูลแผนก (เพิ่ม/แก้ไข/ลบ/แสดง)  
✅ Dashboard แสดงจำนวนพนักงานตามแผนก  
✅ ใช้ Seeder เติมข้อมูลตัวอย่าง  
✅ รองรับ export โค้ดโปรเจกต์เป็นไฟล์ .zip

---

## ⚙️ ขั้นตอนการติดตั้ง

### 1️⃣ ติดตั้ง Laravel
```
composer create-project laravel/laravel employee-system
cd employee-system
```

---

### 2️⃣ ตั้งค่าไฟล์ .env
```
DB_DATABASE=employee_db
DB_USERNAME=root
DB_PASSWORD=
```

> **หมายเหตุ:**  
> - สร้างฐานข้อมูล `employee_db` ใน MySQL ก่อน  
> - ถ้าใช้ XAMPP ให้เปิด phpMyAdmin เพื่อสร้างฐานข้อมูลนี้

---

### 3️⃣ สร้าง Model + Migration
```
php artisan make:model Employee -m
php artisan make:model Department -m
```

---

### 4️⃣ แก้ไขไฟล์ Migration

**ไฟล์ `create_employees_table.php`**
```php
Schema::create('employees', function (Blueprint $table) {
    $table->id();
    $table->string('empNo');
    $table->string('empName');
    $table->unsignedBigInteger('empDepID');
    $table->integer('empSalary');
    $table->unsignedBigInteger('empManager')->nullable();
    $table->integer('empStatus')->default(1);
    $table->timestamps();
});
```

**ไฟล์ `create_departments_table.php`**
```php
Schema::create('departments', function (Blueprint $table) {
    $table->id();
    $table->string('depName');
    $table->integer('depStatus')->default(1);
    $table->timestamps();
});
```

---

### 5️⃣ รัน migration
```
php artisan migrate
```

---

### 6️⃣ สร้าง Seeder + เติมข้อมูลตัวอย่าง

สร้าง seeder:
```
php artisan make:seeder DepartmentSeeder
php artisan make:seeder EmployeeSeeder
```

**ไฟล์ `DepartmentSeeder.php`**
```php
use App\Models\Department;

Department::insert([
    ['depName' => 'Marketing', 'depStatus' => 1],
    ['depName' => 'Accounting', 'depStatus' => 1],
    ['depName' => 'IT', 'depStatus' => 1],
]);
```

**ไฟล์ `EmployeeSeeder.php`**
```php
use App\Models\Employee;

Employee::insert([
    ['empNo' => 'EMP0001', 'empName' => 'Suree', 'empDepID' => 2, 'empSalary' => 15000, 'empManager' => null, 'empStatus' => 1],
    ['empNo' => 'EMP0002', 'empName' => 'Jirasak', 'empDepID' => 1, 'empSalary' => 12000, 'empManager' => 1, 'empStatus' => 1],
    ['empNo' => 'EMP0003', 'empName' => 'Nattaporn', 'empDepID' => 1, 'empSalary' => 12000, 'empManager' => 1, 'empStatus' => 1],
    ['empNo' => 'EMP0004', 'empName' => 'Sarawut', 'empDepID' => 3, 'empSalary' => 18000, 'empManager' => null, 'empStatus' => 1],
    ['empNo' => 'EMP0005', 'empName' => 'Peerakorn', 'empDepID' => 2, 'empSalary' => 15000, 'empManager' => 1, 'empStatus' => 1],
    ['empNo' => 'EMP0006', 'empName' => 'Naruechai', 'empDepID' => 3, 'empSalary' => 17000, 'empManager' => 4, 'empStatus' => 1],
]);
```

**ไฟล์ `DatabaseSeeder.php`**
```php
$this->call([
    DepartmentSeeder::class,
    EmployeeSeeder::class,
]);
```

รัน:
```
php artisan db:seed
```

---

### 7️⃣ สร้าง Controller
```
php artisan make:controller EmployeeController --resource
php artisan make:controller DepartmentController --resource
php artisan make:controller DashboardController
```

---

### 8️⃣ กำหนด Route

ใน `routes/web.php`
```php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);
```

---

### 9️⃣ เขียน Controller

**EmployeeController.php** (ส่วนสำคัญ)
```php
public function edit(Employee $employee)
{
    $departments = Department::where('depStatus', 1)->get();
    return view('employees.edit', compact('employee', 'departments'));
}

public function update(Request $request, Employee $employee)
{
    $request->validate([...]);
    $employee->update($request->all());
    return redirect()->route('employees.index')->with('success', 'อัปเดตพนักงานเรียบร้อยแล้ว');
}

public function destroy(Employee $employee)
{
    $employee->delete();
    return redirect()->route('employees.index')->with('success', 'ลบพนักงานเรียบร้อยแล้ว');
}
```

---

### 🔨 10️⃣ สร้าง View

โฟลเดอร์:
```
resources/views/employees
resources/views/departments
resources/views/dashboard
```

ตัวอย่าง `employees/index.blade.php`:
```blade
<h1>รายชื่อพนักงาน</h1>
<a href="{{ route('employees.create') }}">เพิ่มพนักงาน</a>
<table>
    @foreach ($employees as $emp)
    <tr>
        <td>{{ $emp->empNo }}</td>
        <td>{{ $emp->empName }}</td>
        <td>{{ $emp->empDepID }}</td>
        <td>{{ $emp->empSalary }}</td>
        <td>
            <a href="{{ route('employees.edit', $emp->id) }}">แก้ไข</a>
            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">ลบ</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
```

---

### 1️⃣1️⃣ รันโปรเจกต์
```
composer install

php artisan serve
```

เปิด:
```
http://localhost:8000/employees
http://localhost:8000/departments
http://localhost:8000/dashboard
```

---

### 📦 Export โปรเจกต์เป็น .zip
```
cd ..
zip -r employee-system.zip employee-system/
```

---

