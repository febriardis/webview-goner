<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('warung_id');
            $table->unsignedInteger('kategori_id');
            $table->string('nm_barang');
            $table->string('foto');
            $table->string('desk_barang');
            $table->string('harga');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_barang', function(Blueprint $kolom){ //schema initial foreign key
            $kolom->foreign('warung_id')->references('id')->on('tb_warung')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('kategori_id')->references('id')->on('tb_kategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_barang');
    }
}
