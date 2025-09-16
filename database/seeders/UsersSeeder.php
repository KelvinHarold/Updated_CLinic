<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@clinic.com'],
            ['name' => 'System Admin', 'password' => Hash::make('password')]
        );
        $admin->assignRole('Admin');

        // Doctor
        $doctor = User::firstOrCreate(
            ['email' => 'doctor@clinic.com'],
            ['name' => 'Dr. John Doe', 'password' => Hash::make('password')]
        );
        $doctor->assignRole('Doctor');

        // Pregnant Woman
        $pregnant = User::firstOrCreate(
            ['email' => 'mama1@clinic.com'],
            ['name' => 'Jane Pregnant', 'password' => Hash::make('password')]
        );
        $pregnant->assignRole('Pregnant Woman');

        // Breastfeeding Woman
        $breastfeeding = User::firstOrCreate(
            ['email' => 'mama2@clinic.com'],
            ['name' => 'Mary Breastfeeding', 'password' => Hash::make('password')]
        );
        $breastfeeding->assignRole('Breastfeeding Woman');

        // Visitor
        $visitor = User::firstOrCreate(
            ['email' => 'visitor@clinic.com'],
            ['name' => 'Peter Visitor', 'password' => Hash::make('password')]
        );
        $visitor->assignRole('Visitor');

        // NGO
        $ngo = User::firstOrCreate(
            ['email' => 'ngo@clinic.com'],
            ['name' => 'Health NGO', 'password' => Hash::make('password')]
        );
        $ngo->assignRole('NGO');
    }
}
