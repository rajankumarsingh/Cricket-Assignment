<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamIdToPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->integer('teamId')->unsigned()->nullable()->after('id');
			// 2. Create foreign key constraints
            $table->foreign('teamId')->references('id')->on('teams')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['teamId']);

            // 2. Drop the column
            $table->dropColumn('teamId');
        });
    }
}
