<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tb_kategori';
	protected $fillable = [
		'nm_kategori',
	];
	function PKkategori(){
		return $this->hasMany(Barang::class);
	}
}
