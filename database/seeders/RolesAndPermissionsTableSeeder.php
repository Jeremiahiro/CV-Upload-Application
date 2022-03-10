<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'recruiter',
            'jobseeker',
         ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permissions = [
            'view-users',
            'delete-user',
            'view-cv',
            'create-cv',
            'update-cv',
            'delete-cv'
         ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::where('name', 'admin')->first();
        $recruiter = Role::where('name', 'recruiter')->first();
        $jobseeker = Role::where('name', 'jobseeker')->first();

        $recruiter_permissions = Permission::whereIn('name', ['view-cv'])->get();
        $jobseeker_permissions = Permission::whereIn('name', ['view-cv', 'create-cv', 'update-cv', 'delete-cv'])->get();

        $admin->givePermissionTo(
            array_map(function ($permission) {
                return $permission;
            }, $permissions)
        );

        $recruiter->givePermissionTo($recruiter_permissions);
        $jobseeker->givePermissionTo($jobseeker_permissions);
    }
}
