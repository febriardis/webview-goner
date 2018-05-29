<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('barang_id');
            $table->string('kirim_ke');
            $table->string('det_kirim_ke');
            $table->string('jum_orderan');
            $table->string('nominal');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_transaksi', function(Blueprint $kolom){ //schema initial foreign key
            $kolom->foreign('user_id')->references('id')->on('tb_users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('barang_id')->references('id')->on('tb_barang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
}
