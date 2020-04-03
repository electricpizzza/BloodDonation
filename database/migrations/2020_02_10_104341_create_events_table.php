<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('caravan_id')->unique()->nullable();
            $table->unsignedBigInteger('association_id')->unique()->nullable();
            $table->index('caravan_id');
            $table->index('association_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('city');
            $table->string('address');
            $table->date('dateEnd');
            $table->date('dateStart');
            $table->time('startsAt');
            $table->time('endsAt');
            
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
        Schema::dropIfExists('events');
    }
}
