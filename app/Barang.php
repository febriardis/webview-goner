<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tb_barang';
	protected $fillable = [
		'warung_id', 
		'kategori_id',
		'nm_barang',
		'desk_barang',
		'harga',
	];
	function PKbarang() {
		return $this->hasMany(Transaksi::class);
	}
	function FKbarang() {
		return $this->belongsTo(Warung::class);
	}
	function FKbarangs() {
		return $this->belongsTo(Kategori::class);
	}
}
