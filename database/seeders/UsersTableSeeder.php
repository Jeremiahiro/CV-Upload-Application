<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User */

        // super admin
        $admin = User::factory()
            ->create([
                'email' => 'admin@cvupload.test',
                'type' => UserType::Admin(),
                'password' => '$2y$10$LQjAQ9xYxKE8Zn9SMeTFTuwKwjlV7/.CagzTblKen9BDfU4QSr4mm',
                'email_verified_at' => now()
        ]);

        $admin->assignRole(Role::where('name', 'admin')->get());

        $recruiter = User::factory()
            ->create([
                'email' => 'recruiter@cvupload.test',
                'type' => UserType::Recruiter(),
                'password' => '$2y$10$LQjAQ9xYxKE8Zn9SMeTFTuwKwjlV7/.CagzTblKen9BDfU4QSr4mm',
                'email_verified_at' => now()
        ]);

        $recruiter->assignRole(Role::where('name', 'recruiter')->get());

        $jobseeker = User::factory()
            ->create([
                'email' => 'jobseeker@cvupload.test',
                'type' => UserType::Recruiter(),
                'password' => '$2y$10$LQjAQ9xYxKE8Zn9SMeTFTuwKwjlV7/.CagzTblKen9BDfU4QSr4mm',
                'email_verified_at' => now()
        ]);

        $jobseeker->assignRole(Role::where('name', 'jobseeker')->get());


    }
}
