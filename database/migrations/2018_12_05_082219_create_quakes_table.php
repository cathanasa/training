<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quakes', function (Blueprint $table) {
            $table->increments('id');

            $table->float('mag');
            $table->string('place');
            $table->bigInteger('time');
            $table->bigInteger('updated');
            $table->integer('tz');
            $table->string('url');
            $table->integer('felt')->nullable();
            $table->float('cdi')->nullable();
            $table->float('mmi')->nullable();
            $table->string('alert')->nullable();
            $table->string('status');
            $table->boolean('tsunami');
            $table->integer('sig');
            $table->string('net');
            $table->string('code');
            $table->string('ids');
            $table->string('sources');
            $table->string('types');
            $table->integer('nst')->nullable();
            $table->float('dmin')->nullable();
            $table->float('rms')->nullable();
            $table->float('gap')->nullable();
            $table->string('mag_type');
            $table->string('type');
            $table->string('title');
            $table->longText('json');

            $table->text('description')->nullable();

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
        Schema::dropIfExists('quakes');
    }
}
