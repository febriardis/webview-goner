<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbWarung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_warung', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger ('user_id'); //foreign key
            $table->string('nm_warung');
            $table->string('foto');
            $table->string('hp_warung');
            $table->string('almt_warung');
            $table->text('deskripsi');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_warung', function(Blueprint $kolom){ //schema initial foreign key
            $kolom->foreign('user_id')->references('id')->on('tb_users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_warung');
    }
}
