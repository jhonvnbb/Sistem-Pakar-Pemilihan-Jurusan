<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveNilaiMbColumnFromMinatBakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minat_bakats', function (Blueprint $table) {
            if (Schema::hasColumn('minat_bakats', 'nilai_mb')) {
                $table->dropColumn('nilai_mb');
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
        Schema::table('minat_bakats', function (Blueprint $table) {
            $table->float('nilai_mb', 8, 2)->nullable();
        });
    }
}
