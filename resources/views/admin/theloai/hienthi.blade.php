@extends('admin.layout.master')
@section('title', 'Admin - Danh sách thể loại')
@section('style')
<style>
	.tb{ text-align: left; }
	.tc{ margin-bottom: 0px !important; }
</style>
@endsection
@section('content')
<h2 align="left" style="margin-top: 0px;">Danh sách thể loại</h2>
<p align="left"><a href="{{ route('admin.theloai.getThem') }}"><span class="glyphicon glyphicon-plus-sign"></span> Thêm thể loại mới</a></p>
<p align="left"><a href="{{ route('admin.loaitin.hienthi') }}"><span class="glyphicon glyphicon-book"></span> Xem danh sách loại tin</a></p>
<p align="left"><a href="{{ route('admin.tintuc.hienthi') }}"><span class="glyphicon glyphicon-eye-open"></span> Xem danh sách tin tức</a></p>
<p align="left"><a href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-home"></span> Trở về Trang chủ</a></p>
<div class="tb">
	@if(session('thongbao'))
	<div class="alert alert-success">
		<strong><big>Xóa thành công !!</big></strong><br>
		{{ session('thongbao') }}
	</div>
	@endif
	@if(session('dn'))
	<div class="alert alert-success">
		<strong><big>Đăng nhập thành công !!</big></strong><br>
		{{ session('dn') }}
	</div>
	@endif
</div>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên thể loại</th>
			<th>Mô Tả</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($bien as $x)
		<tr>
			<td>{{ $x->id }}</td>
			<td>{{ $x->Ten }}</td>
			<td>{{ $x->MoTa }}</td>
			<td><p class="tc"><span class="glyphicon glyphicon-pencil"></span> <a href="{{ route('admin.theloai.getSua', $x->id) }}">Edit</a></p></td>
			<td><p class="tc"><span class="glyphicon glyphicon-trash"></span> <a href="{{ route('admin.theloai.getXoa', $x->id) }}">Delete</a></p></td>
		</tr>
		@endforeach
	</tbody>
</table>
<div id="myAjax"></div>
<button class="btn btn-default" id="btn">Lấy Nội Dung Ajax</button>
<a class="btn btn-default" href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-refresh"></span></a>
@endsection
