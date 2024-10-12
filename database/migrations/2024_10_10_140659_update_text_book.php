<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::table('textbooks', function (Blueprint $table) {
            $table->dropForeign('textbooks_seance_id_foreign');
            $table->dropColumn('seance_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });

    }


    public function down()
    {
        Schema::table('textbooks', function (Blueprint $table) {
            $table->dropForeign('textbooks_course_id_foreign');
            $table->dropColumn('course_id');
            $table->unsignedBigInteger('seance_id');
            $table->foreign('seance_id')->references('id')->on('seances');
        });
    }
};


