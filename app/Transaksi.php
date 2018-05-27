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
	function FKtransaksi2() {
		return $this->belongsTo(Barang::class);
	}

	function hasWarung($role) {
		return null !== $this->FKtransaksi2()->where('warung_id', $role)->first();
	}
}
