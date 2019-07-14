<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;

class TheLoaiController extends Controller
{
    public function hienthi()
    {
    	$bien = Theloai::get();
    	return view('admin.theloai.hienthi', compact('bien'));
    }
    public function getThem()
    {
    	return view('admin.theloai.them');
    }
    public function postThem(Request $request)
    {
    	$request->validate(
    		[
    			'ten' => 'required|min:3|unique:Theloai,Ten',
    			'mota' => 'required|min:4'
    		],
    		[
    			'ten.required' => 'Tên thể loại ko được để trống',
    			'ten.min' => 'Tên thể loại quá ngắn, phải ít nhất 3 ký tự',
    			'ten.unique' => 'Thể loại này đã tồn tại, hãy tạo một cái tên khác',
    			'mota.required' => 'Mô tả không được để trống',
    			'mota.min' => 'Mô tả quá ngắn, phải ít nhất 4 ký tự'
    		]);
    	$theloai = new Theloai();
    	$theloai->create([
    		'Ten' => $request->ten,
    		'MoTa' => $request->mota
    	]);
    	return redirect()->route('admin.theloai.getThem')->with('thongbao', 'Thêm thể loại thành công, bấm quay lại để về trang thể loại');
    }
    public function getSua($id)
    {
    	$bien = Theloai::find($id);
    	return view('admin.theloai.sua', compact('bien'));
    }
    public function postSua($id, Request $request)
    {
    	$request->validate(
    		[
    			'ten' => 'required|min:3',
    			'mota' => 'required|min:4'
    		],
    		[
    			'ten.required' => 'Tên thể loại không được để trống',
    			'ten.min' => 'Tên thể loại quá ngắn, phải ít nhất 3 ký tự',
    			'mota.required' => 'Mô tả không được để trống',
    			'mota.min' => 'Mô tả quá ngắn, phải ít nhất 4 ký tự' 
    		]);
    	$theloai = new Theloai();
    	$theloai->find($id)->update([
    		'Ten' => $request->ten,
    		'MoTa' => $request->mota
    	]);
    	return redirect()->route('admin.theloai.getSua', $id)->with('thongbao', 'Đã sửa thành công, bấm quay lại để về Trang chủ');
    }
    public function xoa($id)
    {
    	Theloai::find($id)->delete();
    	return redirect()->route('admin.theloai.hienthi')->with('thongbao', 'Đã xóa thành công, bạn đã được chuyển hướng đến Trang Chủ');
    }
}
