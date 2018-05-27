<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    protected $table = 'tb_users';

    protected $fillable = [
        'nama', 'email', 'no_hp', 'alamat', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function PKusers() {
        return $this->hasMany(Warung::class);//punya primary
    } 
    public function PKuser() {
        return $this->hasMany(Transaksi::class);
    }}
