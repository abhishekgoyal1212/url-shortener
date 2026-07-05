<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO users (company_id, name, email, role, password, created_at, updated_at) value (?, ?, ?, ?, ?, NOW(), NOW())",[
            null, 'Super Admin','superadmin@gmail.com','SuperAdmin',Hash::make('superadmin@123')
        ]);
    }
}
