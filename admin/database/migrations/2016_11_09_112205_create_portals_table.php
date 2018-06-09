<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portals', function(Blueprint $table) {
            $table->increments('id_portal');
            $table->integer('id_postal');
            $table->string('title');
            $table->string('display_popup');
            $table->integer('close_popup_time');
            $table->string('redirect_url');
            $table->string('fb_page_id');
            $table->string('fb_page_name');
            $table->string('share_action');
            $table->text('share_message');
            $table->integer('id_device');
            $table->integer('id_user');
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
        Schema::drop('portals');
    }
}
