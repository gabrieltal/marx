<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComraderiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comraderies', function (Blueprint $table) {
            $table->primary(['user_id', 'comraderie_id', 'comraderie_type']);
            $table->timestamps();
            $table->unsignedBigInteger('comraderie_id');
            $table->unsignedBigInteger('user_id');
            $table->string('comraderie_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comraderies');
    }
}
