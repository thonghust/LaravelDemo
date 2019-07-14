<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Loaitin;
use App\Theloai;

class LoaiTinController extends Controller
{
    public function hienthi()
    {
    	$bien = Loaitin::paginate(13);
    	return view('admin.loaitin.hienthi', compact('bien'));
    }
    public function getThem()
    {
    	$theloai = Theloai::get();
    	return view('admin.loaitin.them', compact('theloai'));
    }
    public function postThem(Request $request)
    {
    	$request->validate(
    		[
    			'tenloaitin' => 'required|min:3|unique:loaitin,Ten',
    			'mota' => 'required|min:4'
    		],
    		[
    			'tenloaitin.required' => 'Tên loại tin không được để trống',
    			'tenloaitin.min' => 'Tên loại tin quá ngắn, phải ít nhất 3 ký tự',
    			'tenloaitin.unique' => "Loại tin này đã tồn tại, hãy thử một cái tên khác",
    			'mota.required' => 'Mô tả không được để trống',
    			'mota.min' => 'Mô tả quá ngắn, phải ít nhất 4 ký tự'
    		]);
    	$loaitin = new Loaitin();
    	$loaitin->create([
    		'idTheLoai' => $request->idtheloai,
    		'Ten' => $request->tenloaitin,
    		'MoTa' => $request->mota
    	]);
    	return redirect()->route('admin.loaitin.getThem')->with('thongbao', 'Thêm loại tin thành công, bấm quay lại để về Trang loại tin');
    }
    public function getSua($id)
    {
    	$theloai = Theloai::get();
    	$loaitin = Loaitin::find($id);
    	return view('admin.loaitin.sua', compact('theloai', 'loaitin'));
    }
    public function postSua($id, Request $request)
    {
    	$request->validate(
    		[
    			'tenloaitin' => 'required|min:3',
    			'mota' => 'required|min:4'
    		],
    		[
    			'tenloaitin.required' => 'Tên loại tin không được để trống',
    			'tenloaitin.min' => 'Tên loại tin quá ngắn, phải ít nhất 3 ký tự',
    			'mota.required' => 'Mô tả không được để trống',
    			'mota.min' => 'Mô tả quá ngắn, phải ít nhất 4 ký tự'
    		]);
    	$loaitin = new Loaitin();
    	$loaitin->find($id)->update([
    		'idTheLoai' => $request->idtheloai,
    		'Ten' => $request->tenloaitin,
    		'MoTa' => $request->mota
    	]);
    	return redirect()->route('admin.loaitin.getSua', $id)->with('thongbao', 'Sửa thành công, bấm quay lại để về Trang Loại tin');
    }
    public function xoa($id)
    {
    	Loaitin::find($id)->delete();
    	return redirect()->route('admin.loaitin.hienthi')->with('thongbao', 'Xóa thành công, bạn được chuyển hướng đến trang Loại tin, bấm quay lại để về Trang chủ');
    }
}
