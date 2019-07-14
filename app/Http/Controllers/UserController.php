<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function hienthi()
    {
    	$bien = User::get();
    	return view('admin.user.hienthi', compact('bien'));
    }
    public function getThem()
    {
    	return view('admin.user.them');
    }
    public function postThem(Request $request)
    {
    	$request->validate(
    		[
    			'hoten' => 'required|min:3|',
    			'email' => 'required|min:3|email|unique:users,email',
    			'mk' => 'required|min:3|',
    			'nlmk' => 'required|min:3|same:mk'
    		],
    		[
    			'hoten.required' => 'Bạn chưa nhập họ tên',
    			'hoten.min' => 'Họ tên quá ngắn, phải ít nhất 3 ký tự',
    			'email.required' => 'Bạn chưa nhập Email',
    			'email.min' => 'Email quá ngắn, phải ít nhất 4 ký tự',
    			'email.email' => 'Email chưa đúng, phải có ký tự @',
    			'email.unique' => 'Email này đã tồn tại',
    			'mk.required' => 'Bạn chưa nhập mật khẩu',
    			'mk.min' => 'Mật khẩu quá ngắn, phải ít nhất 5 ký tự',
    			'nlmk.required' => 'Bạn chưa nhập lại mật khẩu',
    			'nlmk.min' => 'Nhập lại mật khẩu quá ngắn, phải ít nhất 6 ký tự',
    			'nlmk.same' => 'Mật khẩu không trùng khớp'
    		]);
    	$user = new User();
    	$user->create([
    		'name' => $request->hoten,
    		'email' => $request->email,
    		'quyen' => $request->quyen,
    		'password' => bcrypt($request->mk)
    	]);
    	return redirect()->route('admin.user.getThem')->with('thongbao', 'Thêm User thành công, bấm quay lại để về trang chủ');
    }
    public function getSua($id)
    {
    	$bien = User::find($id);
    	return view('admin.user.sua', compact('bien'));
    }
    public function postSua($id, Request $request)
    {
    	$request->validate(
    		[
    			'hoten' => 'required|min:3|',
    			'mk' => 'required|min:3|',
    			'nlmk' => 'required|min:3|same:mk'
    		],
    		[
    			'hoten.required' => 'Bạn chưa nhập họ tên',
    			'hoten.min' => 'Họ tên quá ngắn, phải ít nhất 3 ký tự',
    			'mk.required' => 'Bạn chưa nhập mật khẩu',
    			'mk.min' => 'Mật khẩu quá ngắn, phải ít nhất 5 ký tự',
    			'nlmk.required' => 'Bạn chưa nhập lại mật khẩu',
    			'nlmk.min' => 'Nhập lại mật khẩu quá ngắn, phải ít nhất 6 ký tự',
    			'nlmk.same' => 'Mật khẩu không trùng khớp'
    		]);
    	$user = User::find($id);
    	$user->update([
    		'name' => $request->hoten,
    		'quyen' => $request->quyen,
    		'password' => bcrypt($request->mk)
    	]);
    	return redirect()->route('admin.user.getSua', $id)->with('thongbao', 'Sửa User thành công, bấm quay lại để về trang danh sách User');
    }
    public function getXoa($id)
    {
    	User::find($id)->delete();
    	return redirect()->route('admin.user.hienthi')->with('thongbao', 'Đã xóa User thành công, bấm quay lại để về Trang chủ');
    }
    public function getDangnhapAdmin()
    {
    	return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
    	$request->validate(
    		[
    			'email' => 'required|min:3|email',
    			'mk' => 'required|min:3'
    		],
    		[
    			'email.required' => 'Bạn chưa nhập Email',
    			'email.min' => 'Email quá ngắn, phải ít nhất 3 ký tự',
    			'email.email' => 'Email bạn nhập không chính xác, phải có ký tự @',
    			'mk.required' => 'Bạn chưa nhập mật khẩu',
    			'mk.min' => 'Mật khẩu quá ngắn, phải ít nhất 4 ký tự'
    		]);
    	if(Auth::attempt(['email' => $request->email, 'password' => $request->mk]))
    	{
    		return redirect()->route('admin.theloai.hienthi')->with('dn', 'Đăng nhập vào trang Quản Trị thành công, bây giờ bạn có thể tùy chỉnh các phần như Thể loại, Loại tin, Tin tức, Tài khoản người dùng với các tùy chọn như Thêm, Sửa, Xóa, Cập nhật');
    	}
    	else
    	{
    		return redirect()->route('getLogin')->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác');
    	}
    }
    public function getDangxuatAdmin()
    {
    	Auth::logout();
    	return redirect()->route('admin.theloai.hienthi');
    }
    public function getDangky()
    {
    	return view('admin.register');
    }
    public function postDangky(Request $request)
    {
    	$request->validate(
    		[
    			'hoten' => 'required|min:3|',
    			'email' => 'required|min:3|email|unique:users,email',
    			'mk' => 'required|min:3|',
    			'nlmk' => 'required|min:3|same:mk'
    		],
    		[
    			'hoten.required' => 'Bạn chưa nhập họ tên',
    			'hoten.min' => 'Họ tên quá ngắn, phải ít nhất 3 ký tự',
    			'email.required' => 'Bạn chưa nhập Email',
    			'email.min' => 'Email quá ngắn, phải ít nhất 4 ký tự',
    			'email.email' => 'Email chưa đúng, phải có ký tự @',
    			'email.unique' => 'Email này đã tồn tại',
    			'mk.required' => 'Bạn chưa nhập mật khẩu',
    			'mk.min' => 'Mật khẩu quá ngắn, phải ít nhất 5 ký tự',
    			'nlmk.required' => 'Bạn chưa nhập lại mật khẩu',
    			'nlmk.min' => 'Nhập lại mật khẩu quá ngắn, phải ít nhất 6 ký tự',
    			'nlmk.same' => 'Mật khẩu không trùng khớp'
    		]);
    	$user = new User();
    	$user->create([
    		'name' => $request->hoten,
    		'email' => $request->email,
    		'password' => bcrypt($request->mk)
    	]);
    	return redirect()->route('getLogin')->with('thongbao1', 'Chúc mừng bạn đã đăng ký tài khoản thành công, hãy đăng nhập vào Trang chủ ngay bây giờ để có thể xem tin tức');
    }
}
