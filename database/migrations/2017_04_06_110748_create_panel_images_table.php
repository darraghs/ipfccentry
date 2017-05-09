<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanelImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panel_images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image');
            $table->text('author_name');
            $table->text('author_email');
            $table->text('title');
            $table->unsignedInteger('Judge1_Score');
            $table->unsignedInteger('Judge2_Score');
            $table->unsignedInteger('Judge3_Score');
            $table->tinyInteger('award');
            $table->unsignedInteger("panel_order");
            $table->tinyInteger('substitue');
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
        Schema::dropIfExists('panel_images');
    }
}
