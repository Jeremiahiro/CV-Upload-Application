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
        Schema::create('nysc_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained();
            $table->date('date');
            $table->boolean('ref_for_location')->default(false);
            $table->boolean('employed')->default(false);
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
        Schema::dropIfExists('nysc_details');
    }
};
