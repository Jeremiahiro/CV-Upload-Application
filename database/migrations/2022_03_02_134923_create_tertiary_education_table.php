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
            $table->foreignId('tertiary_institutions_id')->constrained();
            $table->foreignId('tertiary_types_id')->nullable()->constrained();
            $table->foreignId('tertiary_qualifications_id')->nullable()->constrained();
            $table->string('other_type')->nullable();
            $table->string('other_qualification')->nullable();
            $table->date('start_date');
            $table->date('end_date');
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
