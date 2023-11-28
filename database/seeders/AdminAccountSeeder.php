<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Administrator";
        $user->nik = "0000000000000000";
        $user->email = "admin@gmail.com";
        $user->birth_date = "2023-01-01";
        $user->gender = "Laki-Laki";
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('administrator');
        $user->role = "admin";
        $user->address = "Admin";
        $user->tps_address = "Admin";
        $user->tps_number = "00";
        $user->save();
    }
}
