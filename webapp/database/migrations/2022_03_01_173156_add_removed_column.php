<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemovedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_post', function (Blueprint $table) {
            $table->tinyInteger('is_removed')->nullable()->default(null)
                ->after('channel_id');
            $table->smallInteger('http_status')
                ->unsigned()
                ->nullable()
                ->default(null)->after('is_removed');
            $table->string('error_msg', 400)->nullable()->default(null)->after('http_status');
            $table->datetime('checked_at')->nullable()->default(null)->after('error_msg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_post', function (Blueprint $table) {
            $table->dropColumn('is_removed');
            $table->dropColumn('http_status');
            $table->dropColumn('error_msg');
            $table->dropColumn('checked_at');
        });
    }
}
