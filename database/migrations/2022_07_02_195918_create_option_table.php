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
        Schema::create('option', function (Blueprint $table) {
            $table->id("option_id");
            //Add the foreign key to the poll table
            $table->foreignId("poll_id")
                ->constrained("poll","poll_id")
                ->onUpdate("no action")
                ->onDelete("cascade");
                
            $table->string("options",100);
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
        Schema::dropIfExists('option');
    }
};
