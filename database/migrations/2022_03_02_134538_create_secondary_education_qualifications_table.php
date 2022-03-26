<?php

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
        Schema::create('secondary_education_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('secondary_education');
            $table->foreignId('secondary_subject');
            $table->foreignId('secondary_grades');
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
        Schema::dropIfExists('secondary_education_qualifications');
    }
};
