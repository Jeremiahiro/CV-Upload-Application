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
            $table->string('town');
            $table->string('street');
            $table->string('mobile_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('email');
            $table->string('status')->default(CvStatus::active());
            $table->string('preferred_employment_industry');
            $table->json('hobbies');
            $table->longText('additional_information');
            $table->string('no_of_secondary_school');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('preferred_employment_city')->constrained('cities');
            $table->foreignId('country_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
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
