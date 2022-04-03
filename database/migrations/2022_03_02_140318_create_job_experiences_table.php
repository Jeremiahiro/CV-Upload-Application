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
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('employer');
            $table->date('date');
            $table->longText('job_description');
            $table->string('no_of_positions');
            $table->boolean('is_current')->default(false);
            $table->foreignId('employment_roles_id')->nullable()->constrained();
            $table->string('other_employment_role')->nullable();
            $table->foreignId('industrial_sectors_id')->nullable()->constrained();
            $table->string('other_industry')->nullable();
            $table->boolean('have_prior_role')->default(false);
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
        Schema::dropIfExists('job_experiences');
    }
};
