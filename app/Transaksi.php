<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';
	protected $fillable = [
		'user_id', 
		'barang_id',
		'waktu',
		'status',
	];
	function FKtransaksi() {
		return $this->belongsTo(User::class);
	}
}
