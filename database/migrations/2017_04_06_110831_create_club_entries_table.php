<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_entries', function (Blueprint $table) {
            $table->unsignedInteger("club_id");
            $table->string("status")->nullable();
            $table->string("payment")->nullable();
            $table->unsignedInteger("panel_number")->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('club_entries');
        Schema::enableForeignKeyConstraints();
    }
}
