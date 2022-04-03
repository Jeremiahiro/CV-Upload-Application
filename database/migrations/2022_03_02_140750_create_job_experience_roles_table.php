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
        Schema::create('job_experience_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employment_roles_id')->nullable()->constrained();
            $table->string('other_employment_role')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->longText('job_description');
            $table->boolean('referees');
            $table->boolean('is_current')->default(false);
            $table->foreignId('job_experience_id')->constrained();
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
        Schema::dropIfExists('job_experience_roles');
    }
};
