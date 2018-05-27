<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warung extends Model
{
    protected $table = 'tb_warung';
	protected $fillable = [
		'user_id',
		'nm_warung', 
		'hp_warung',
		'almt_warung',
		'deskripsi',
	];
	public function FKwarung() {
    	return $this->belongsTo(User::class);//punya foreign dari user
    }
    public function PKwarung() {
        return $this->hasMany(Barang::class);//punya primary
    } 
}
