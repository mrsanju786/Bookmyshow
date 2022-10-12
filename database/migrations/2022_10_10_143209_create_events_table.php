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
            $table->id();
            $table->string('event_name');
            $table->string('title');
            $table->string('event_image');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')->on('categories')->onDelete('cascade');
            $table->string('address');
            $table->string('lat_address');
            $table->string('long_address');
            $table->string('street1');
            $table->string('street2');
            $table->string('languages');
            $table->text('shor_description');
            $table->text('long_description');
            $table->string('ticket_name');
            $table->string('ticket_type');
            $table->string('ticket_qty');
            $table->string('ticket_price');
            $table->integer('created_by');
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
