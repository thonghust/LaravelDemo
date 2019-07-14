<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;

class AjaxController extends Controller
{
    public function getLoaitin($id)
    {
    	$loaitin = Loaitin::where('idTheLoai', $id)->get();
    	foreach($loaitin as $lt)
    	{
    		echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
    	}
    }
    public function thong()
    {
    	echo "<div class='alert alert-info'>
    			<p><a href='#' class='alert-link'><big><strong>Đã lấy thành công Ajax !!</strong></big></a></p>
    			<p>Đây là nội dung của Ajax nè, hix :></p>
    		  </div>";
    }
}
