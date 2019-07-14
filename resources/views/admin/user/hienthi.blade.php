@extends('admin.layout.master')
@section('title', 'Admin - Danh sách User')
@section('style')
<style>
	.tb{ text-align: left; }
	.tc{ margin-bottom: 0px !important; }
</style>
@endsection
@section('content')
<h2 align="left" style="margin-top: 0px;">Danh sách User</h2>
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
</div>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên User</th>
			<th>Email</th>
			<th>Quyền</th>
			<th>Cấp độ</th>
			<th>Mật khẩu</th>
			<td>Edit</td>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($bien as $x)
		<tr>
			<td>{{ $x->id }}</td>
			<td>{{ $x->name }}</td>
			<td>{{ $x->email }}</td>
			<td>{{ $x->quyen }}</td>
			<td>
				@if($x->quyen == 1)
				{{ "Admin" }}
				@else
				{{ "Thường" }}
				@endif
			</td>
			<td>{{ $x->password }}</td>
			<td><p class="tc"><span class="glyphicon glyphicon-pencil"></span> <a href="{{ route('admin.user.getSua', $x->id) }}">Edit</a></p></td>
			<td><p class="tc"><span class="glyphicon glyphicon-trash"></span> <a href="{{ route('admin.user.getXoa', $x->id) }}">Delete</a></p></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
