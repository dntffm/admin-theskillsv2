<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinicoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minicourses', function (Blueprint $table) {
            $table->id();
            $table->string('minicourse_name',100);
            $table->string('link_video',255);
            $table->string('link_doc',255);
            $table->string('link_other_resource',255);
            $table->string('mc_thumbnail',255);
            $table->unsignedBigInteger('subcourse_id');
            $table->text('description');
            $table->foreign('subcourse_id')->references('id')->on('subcourses');
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
        Schema::dropIfExists('minicourses');
    }
}
