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
        // Schema::table('types', function (Blueprint $table) {
        //     $table->dropColumn('codeBrand');
        // });

        Schema::table('types', function (Blueprint $table) {
            $table->unsignedBigInteger('codeBrand')->after('nameType');
            $table->foreign('codeBrand')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
