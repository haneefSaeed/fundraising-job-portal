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
        Schema::create('prof_profiles', function (Blueprint $table) {

            $table->id();
            $table->string('current_position');
            $table->string('current_company');
            $table->string('location');
            $table->text('statement');
            $table->string('cv');
            $table->string('cl');
            $table->string('other_doc');
            $table->foreignId('career_id');
            $table->foreignId('user_id');
            $table->foreignId('edu_id');
            $table->integer('total_exp');

            $table->timestamps();


            $table->index('career_id');
            $table->index('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prof_profiles');
    }
};
