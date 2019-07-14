<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    protected $table = 'theloai';
    protected $fillable = [
    	'Ten',
    	'MoTa'
    ];
    public function loaitin()
    {
    	return $this->hasMany('App\Loaitin', 'idTheLoai', 'id');
    }
    public function tintuc()
    {
    	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
