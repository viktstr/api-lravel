<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');
            $table->integer('source_id', false, true);
            $table->timestamp('created_at')->nullable();
            $table->foreign('source_id')->references('id')->on('source');
        });

        Schema::create('structure', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->json('data');
            $table->integer('source_id', false, true);
            $table->timestamp('created_at')->nullable();
            $table->foreign('source_id')->references('id')->on('source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('structure', function(Blueprint $table)
        {
            $table->dropForeign('structure_source_id_foreign');
        });
        Schema::dropIfExists('structure');

        Schema::table('data', function(Blueprint $table)
        {
            $table->dropForeign('data_source_id_foreign');
        });
        Schema::dropIfExists('data');

        Schema::dropIfExists('source');
    }
}
