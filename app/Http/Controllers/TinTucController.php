<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
use App\Theloai;
use App\Loaitin;
use App\Comment;

class TinTucController extends Controller
{
    public function hienthi()
    {
    	$bien = Tintuc::orderBy('id', 'desc')->paginate(13);
    	return view('admin.tintuc.hienthi', compact('bien'));
    }
    public function getThem()
    {
    	$theloai = Theloai::get();
    	$loaitin = Loaitin::get();
    	return view('admin.tintuc.them', compact('theloai', 'loaitin'));
    }
    public function postThem(Request $request)
    {
        $request->validate(
            [
                'idTheloai' => 'required',
                'idLoaitin' => 'required',
                'tieude' => 'required|min:3|unique:Tintuc,TieuDe',
                'mota' => 'required|min:4',
                'tomtat' => 'required|min:5',
                'noidung' => 'required|min:6',
            ],
            [
                'idTheloai.required' => 'Bạn chưa chọn thể loại',
                'idLoaitin.required' => 'Bạn chưa chọn loại tin',
                'tieude.required' => 'Tiêu đề không được để trống',
                'tieude.required' => 'Tiêu đề quá ngắn, phải ít nhất 3 ký tự',
                'tieude.unique' => 'Tiêu đề này đã tồn tại, hãy nhập một tiêu đề khác',
                'mota.required' => 'Mô tả không được để trống',
                'mota.min' => 'Mô tả quá ngắn, phải ít nhất 4 ký tự',
                'tomtat.required' => 'Tóm tắt không được để trống',
                'tomtat.min' => 'Tóm tắt quá ngắn, phải ít nhất 5 ký tự',
                'noidung.required' => 'Nội dung không được để trống',
                'noidung.min' => 'Nội dung quá ngắn, phải ít nhất 6 ký tự'
            ]);
        $tintuc = new Tintuc();
        $tintuc->create([
            'TieuDe' => $request->tieude,
            'MoTa' => $request->mota,
            'TomTat' => $request->tomtat,
            'NoiDung' => $request->noidung,
            'NoiBat' => $request->noibat,
            'idLoaiTin' => $request->idLoaitin,
            'Hinh' => $request->anh->getClientOriginalName()
        ]);
        
        $file = $request->anh;
        $name = $file->getClientOriginalName();
        $file->move('upload/tintuc', $name);
        return redirect()->route('admin.tintuc.getThem')->with('thongbao', 'Thêm tin tức thành công, bấm quay lại để trở về trang tin tức');
    }
    public function getSua($id)
    {
        $theloai = Theloai::get();
        $loaitin = Loaitin::get();
        $tintuc = Tintuc::find($id);
        $comment = Comment::where('idTinTuc', $id )->get();
        return view('admin.tintuc.sua', compact('theloai', 'loaitin', 'tintuc', 'comment'));
    }
    public function postSua($id, Request $request)
    {
        $request->validate(
            [
                'idTheloai' => 'required',
                'idLoaitin' => 'required',
                'tieude' => 'required|min:3',
                'mota' => 'required|min:4',
                'tomtat' => 'required|min:5',
                'noidung' => 'required|min:6',
            ],
            [
                'idTheloai.required' => 'Bạn chưa chọn thể loại',
                'idLoaitin.required' => 'Bạn chưa chọn loại tin',
                'tieude.required' => 'Tiêu đề không được để trống',
                'tieude.required' => 'Tiêu đề quá ngắn, phải ít nhất 3 ký tự',
                'mota.required' => 'Mô tả không được để trống',
                'mota.min' => 'Mô tả quá ngắn, phải ít nhất 4 ký tự',
                'tomtat.required' => 'Tóm tắt không được để trống',
                'tomtat.min' => 'Tóm tắt quá ngắn, phải ít nhất 5 ký tự',
                'noidung.required' => 'Nội dung không được để trống',
                'noidung.min' => 'Nội dung quá ngắn, phải ít nhất 6 ký tự'
            ]);
        $tintuc = Tintuc::find($id);
        $tintuc->update([
            'TieuDe' => $request->tieude,
            'MoTa' => $request->mota,
            'TomTat' => $request->tomtat,
            'NoiDung' => $request->noidung,
            'NoiBat' => $request->noibat,
            'idLoaiTin' => $request->idLoaitin,
            'Hinh' => $request->anh->getClientOriginalName()
        ]);

        $name = $request->anh->getClientOriginalName();
        $request->anh->move('upload/tintuc', $name);
        return redirect()->route('admin.tintuc.getSua', $id)->with('thongbao', 'Sửa tin tức thành công, bấm quay lại để trở về trang tin tức');
    }
    public function xoa($id)
    {
        $tintuc = new Tintuc();
        $tintuc->find($id)->delete();
        return redirect()->route('admin.tintuc.hienthi')->with('thongbao', 'Xóa bài viết thành công, bấm quay lại để trở về Trang chủ');
    }
}
