<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Loaitin;
use App\Tintuc;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
	public function __construct()
	{
		$theloai = Theloai::get();
		View::share('theloai', $theloai);
	}
    public function trangchu()
    {
    	return view('pages.home');
    }
    public function lienhe()
    {
    	return view('pages.contact');
    }
    public function loaitin($id)
    {
        $loaitin = Loaitin::find($id);
        $bien = Tintuc::where('idLoaiTin', $id)->paginate(8);
        return view('pages.loaitin', compact('bien', 'loaitin'));
    }
    public function tintuc($id)
    {
        $tintuc = Tintuc::find($id);
        $tinnoibat = Tintuc::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = Tintuc::where('idLoaiTin', $tintuc->id)->take(5)->get();
        return view('pages.tintuc', compact('tintuc', 'tinnoibat', 'tinlienquan'));
    }
    public function postTimkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $tintuc = Tintuc::where('TieuDe', 'like', "%$tukhoa%")->orWhere('TomTat', 'like', "%$tukhoa%")->orWhere('NoiDung', 'like', "%$tukhoa%")->take(50)->get();
        return view('pages.timkiem', compact('tintuc', 'tukhoa'));
    }
}
