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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prof_prof_id')->nullable();
            $table->foreignId('vac_id')->nullable();
            $table->dateTime('apply_date')->nullable();
            $table->string('message')->nullable();
            $table->string('reply')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->index('prof_prof_id');
            $table->index('vac_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
