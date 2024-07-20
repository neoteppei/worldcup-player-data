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
        Schema::table('players', function (Blueprint $table) {
            if (!Schema::hasColumn('players', 'del_flg')) {
                $table->integer('del_flg')->default(0)->comment('0:表示, 1:非表示');
            }
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
            if (Schema::hasColumn('players', 'del_flg')) {
                $table->dropColumn('del_flg');
            }
        });
    }
};
