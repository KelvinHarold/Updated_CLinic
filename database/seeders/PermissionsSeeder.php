<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Admin
            'manage_users',
            'manage_roles',
            'manage_permissions',

            // Doctors
            'manage_mamas',
            'manage_children',
            'manage_appointments',
            'manage_announcements',
             'manage_vaccinations',
             'mother_child_record',
            'manage_reminders',
            'chat_with_mamas',
             ' view_own_children',
             'view_mama_announcements',
             
           

            // Mamas
            'view_health_records',
            'book_appointments',
            'set_reminders',
            'chat_with_doctors',
             'my_reminders',

            // Visitors
            'view_relative_clinic_info',
            'view_visitors_report',

            // NGO
            'view_reports',
            'view_ngos_report',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }

        // Sasa admin role iwe na zote
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $allPermissions = Permission::all();
        $adminRole->syncPermissions($allPermissions);
    }
}
