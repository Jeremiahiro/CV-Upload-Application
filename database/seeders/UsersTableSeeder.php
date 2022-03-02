<?php

namespace Database\Seeders;

use App\Enums\UserType;
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
        $super_admin = User::create([
            'email' => 'admin@cvupload.text',
            'type' => UserType::Admin(),
            'password' => '$2y$10$LQjAQ9xYxKE8Zn9SMeTFTuwKwjlV7/.CagzTblKen9BDfU4QSr4mm',
            'email_verified_at' => now()
        ]);

        $recruiter = User::create([
            'email' => 'recruiter@cvupload.text',
            'type' => UserType::Recruiter(),
            'password' => '$2y$10$LQjAQ9xYxKE8Zn9SMeTFTuwKwjlV7/.CagzTblKen9BDfU4QSr4mm',
            'email_verified_at' => now()
        ]);

        $jobseeker = User::create([
            'email' => 'jobseeker@cvupload.text',
            'type' => UserType::Jobseeker(),
            'password' => '$2y$10$LQjAQ9xYxKE8Zn9SMeTFTuwKwjlV7/.CagzTblKen9BDfU4QSr4mm',
            'email_verified_at' => now()
        ]);

    }
}
