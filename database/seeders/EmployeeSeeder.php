<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::create([
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'1',
            'gender'=>'1',
            'age'=>'23',
            'address'=>'Damascus',
            'type'=>'4',
            'createdBy' => '1',
        ]);
        
        Employee::create([
            'name' => 'employee1',
            'email' => 'employee1@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'0',
            'gender'=>'0',
            'age'=>'30',
            'address'=>'Homs',
            'type'=>'3',
            'createdBy' => '1',


        ]);
        Employee::create([
            'name' => 'employee2',
            'email' => 'employee2@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'1',
            'gender'=>'0',
            'age'=>'50',
            'address'=>'damas',
            'type'=>'1',
            'createdBy' => '1',
        ]);

        Employee::create([
            'name' => 'employee3',
            'email' => 'employee3@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'1',
            'gender'=>'0',
            'age'=>'40',
            'address'=>'damas',
            'type'=>'1',
            'createdBy' => '1',
        ]);


        Employee::create([
            'name' => 'employee4',
            'email' => 'employee4@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'0',
            'gender'=>'0',
            'age'=>'30',
            'address'=>'Homs',
            'type'=>'5',
            'createdBy' => '1',


        ]);
        Employee::create([
            'name' => 'employee5',
            'email' => 'employee5@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'1',
            'gender'=>'0',
            'age'=>'50',
            'address'=>'damas',
            'type'=>'5',
            'createdBy' => '1',
        ]);

        Employee::create([
            'name' => 'employee6',
            'email' => 'employee3@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>'0987654321',
            'status'=>'1',
            'gender'=>'0',
            'age'=>'40',
            'address'=>'damas',
            'type'=>'5',
            'createdBy' => '1',
        ]);
    }
}
