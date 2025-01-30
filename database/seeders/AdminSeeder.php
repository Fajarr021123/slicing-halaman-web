<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'phone' => '08123456789',
            'status' => 'active',
        ]);
    }
}
