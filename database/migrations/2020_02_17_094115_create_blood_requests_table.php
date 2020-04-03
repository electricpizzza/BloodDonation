<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('caravan_id')->unique()->nullable();
            $table->unsignedBigInteger('association_id')->unique()->nullable();
            $table->index('caravan_id');
            $table->index('association_id');
            $table->index('user_id');
            $table->string('bloodType');
            $table->string('city');
            $table->string('address');
            $table->string('description');
            $table->integer('nbMax');
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
        Schema::dropIfExists('blood_requests');
    }
}
