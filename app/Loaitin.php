<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    protected $table = 'loaitin';
    protected $fillable = [
    	'idTheLoai',
    	'Ten',
    	'MoTa'
    ];
    public function tintuc()
    {
    	return $this->hasMany('App\Tintuc', 'idLoaiTin', 'id');
    }
    public function theloai()
    {
    	return $this->belongsTo('App\Theloai', 'idTheLoai', 'id');
    }
}
