<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_item', function (Blueprint $table) {
            $table->bigIncrements('feed_item_id');
            $table->unsignedInteger('feed_id')->nullable(false) ; // int(10) unsigned NOT NULL,
            $table->string('title', 50)->default(null) ; // varchar(50) DEFAULT NULL,
            $table->string('link', 150)->default(null) ; // varchar(150) DEFAULT NULL,
            $table->text('description') ; // text,
            $table->string('guid', 150)->default(null) ; // varchar(150) DEFAULT NULL,
            $table->date('pubdate')->default(null) ; // date DEFAULT NULL,
            $table->boolean('active')->default(true) ; // tinyint(3) unsigned NOT NULL DEFAULT '1',
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
        Schema::dropIfExists('feed_item');
    }
}
