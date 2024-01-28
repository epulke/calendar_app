<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id('entryid');
            $table->string('description', 2048);
            $table->timestamp('start_date_time')->nullable();
            $table->timestamp('end_date_time');
            $table->integer('repeat');
            $table->integer('occurance');
            $table->string('tag', 64);
            $table->unsignedBigInteger('calendarid');
            $table->unsignedBigInteger('userid');

            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->foreign('calendarid')->references('calendarid')->on('calendars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry');
    }
}
