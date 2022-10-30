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
        Schema::create('jour_feries', function (Blueprint $table) {
            $table->id();
            $table->integer('type'); //jour fériés pro/scolaire
            $table->integer('langue_code');
            $table->String('pays');
            $table->String('langue');
            $table->String('libelle');
            $table->String('slug');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->index(['type', 'langue_code','pays']);
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
        Schema::dropIfExists('jour_feries');
    }
};
