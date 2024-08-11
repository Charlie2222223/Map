<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->string('municipalities')->nullable();
            $table->unsignedBigInteger('prefectures_id'); // 外部キーとして設定するカラム
            $table->integer('municipalities_id');

            // 外部キー制約
            $table->foreign('prefectures_id')->references('id')->on('prefectures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
    }
}
