<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "ADMIN";
        $user->password = Hash::make('password');
        $user->email = "admin@admin.com";
        $user->save();
         Company::factory(20)->create();
         Employee::factory(100)->create();
    }
}
