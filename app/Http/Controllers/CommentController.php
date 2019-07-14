<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function xoa($id, $idTinTuc)
    {
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect()->route('admin.tintuc.getSua', $idTinTuc)->with('notice', 'Xóa Comment thành công !!');
    }
    public function comment($id, Request $request)
    {
    	$request->validate(
    		[
    			'noidung' => 'required'
    		],
    		[
    			'noidung.required' => 'Bình luận không được để trống.'
    		]
    	);
    	$comment = new Comment();
    	$comment->create([
    		'idTinTuc' => $id,
    		'idUser' => Auth::user()->id,
    		'NoiDung' => $request->noidung
    	]);
    	return redirect()->route('Tintuc', $id)->with('thongbao', 'Bình luận thành công !');
    }
}
