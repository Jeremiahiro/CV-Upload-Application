<?php

use App\Enums\CvStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob');
            $table->string('sex');
            $table->string('town')->nullable();
            $table->string('street')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('email')->nullable();
            $table->json('hobbies')->nullable();
            $table->longText('additional_information')->nullable();
            $table->string('status')->default(CvStatus::active());
            $table->string('preferred_employment_industry')->nullable();
            $table->string('no_of_secondary_school')->nullable();
            $table->boolean('tertiary_institution')->nullable();
            $table->boolean('has_hobbies')->nullable();
            $table->boolean('professional_qualification')->nullable();
            $table->boolean('completed_nysc')->nullable();
            $table->boolean('location_preference')->nullable();
            $table->foreignId('preferred_state_id')->nullable()->constrained('states');
            $table->foreignId('preferred_industry_id')->nullable()->constrained('industrial_sectors');
            $table->boolean('employment_status')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('preferred_employment_city')->nullable()->constrained('cities');
            $table->foreignId('country_id')->nullable()->constrained();
            $table->foreignId('state_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_v_s');
    }
};
