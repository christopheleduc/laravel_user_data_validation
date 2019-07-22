<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Promo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable()->default(null);
            $table->unsignedInteger('value');
            $table->unsignedInteger('type');
            $table->unsignedInteger('promo_start')->nullable()->default(null);
            $table->unsignedInteger('promo_end')->nullable()->default(null);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
