<?php

namespace Database\Seeders;

use App\Models\IndustrialSector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(SecondaryQualificationSeeder::class);
        $this->call(TertiaryTypesSeeder::class);
        $this->call(TertiaryInstitutionSeeder::class);
        $this->call(TertiaryCourseTypesSeeder::class);
        $this->call(TertiaryCoursesSeeder::class);
        $this->call(TertiaryQualificationTypesSeeder::class);
        $this->call(TertiaryQualificationSeeder::class);
        $this->call(ProfessionalInstitutionsSeeder::class);
        $this->call(ProfessionalQualificationsSeeder::class);
        $this->call(IndustrialSectorSeeder::class);
        $this->call(SecondarySubjectsSeeder::class);
        $this->call(SecondaryGradesSeeder::class);
        $this->call(EmploymentRoleSeeder::class);

    }
}
