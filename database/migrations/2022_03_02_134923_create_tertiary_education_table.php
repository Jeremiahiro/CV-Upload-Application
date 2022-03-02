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
        Schema::create('tertiary_education', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('other_type')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('qualification');
            $table->boolean('professional_qualification');
            $table->foreignId('cv_id')->constrained();
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
        Schema::dropIfExists('tertiary_education');
    }
};
