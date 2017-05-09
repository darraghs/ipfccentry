<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_panels', function (Blueprint $table) {
            $table->unsignedInteger('club_id');
            $table->string('image_type', 10);
            $table->unsignedInteger("image_id");
            $table->timestamps();

            $table->index(['club_id', 'image_type', 'image_id']);
            //$table->foreign('club_id')->references('club_id')->on('club_entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('club_panels',  function (Blueprint $table) {
//            $table->dropForeign(['entry_id']);
//        });
        Schema::dropIfExists('club_panels');
    }
}
