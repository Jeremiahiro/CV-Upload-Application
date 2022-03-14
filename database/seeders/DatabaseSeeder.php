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
        $this->call(SecondarySchoolQualificationSeeder::class);
        $this->call(TertiaryInstitutionTypesSeeder::class);
        $this->call(TertiaryInstitutionSeeder::class);
        $this->call(TertiaryInstitutionCoursesTypesSeeder::class);
        $this->call(TertiaryInstitutionCoursesSeeder::class);
        $this->call(TertiaryInstitutionQualificationTypesSeeder::class);
        $this->call(TertiaryInstitutionQualificationSeeder::class);
        $this->call(ProfessionalInstitutionsSeeder::class);
        $this->call(ProfessionalInstitutionsQualificationsSeeder::class);
        $this->call(IndustrialSectorSeeder::class);

    }
}
