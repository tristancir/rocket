<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FlipItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flip_item', function (Blueprint $table) {
            $table->bigIncrements('flip_item_id');
            $table->unsignedInteger('flip_id');
            $table->text('content');
            $table->string('comments', 300)->nullable()->default(null);
            $table->datetime('posted_at')->nullable()->default(null);
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
        Schema::dropIfExists('flip_item');
    }
}
