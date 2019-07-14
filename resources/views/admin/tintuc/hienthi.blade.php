@extends('admin.layout.master')
@section('title', 'Admin - Danh sách tin tức')
@section('style')
<style>
	.tb{ text-align: left; }
	@media screen and ( max-width: 1200px )
	{
		.container-fluid{ padding-left: 30px; padding-right: 10px; }
		.navbar{ margin-left: 5px; margin-right: 5px; }
		.row{ margin: auto; }
	}
</style>
@endsection
@section('content')
<h2 align="left" style="margin-top: 0px;">Danh sách tin tức</h2>
<p align="left"><a href="{{ route('admin.tintuc.getThem') }}"><span class="glyphicon glyphicon-plus-sign"></span> Thêm tin tức mới</a></p>
<p align="left"><a href="{{ route('admin.loaitin.hienthi') }}"><span class="glyphicon glyphicon-eye-open"></span> Trở về DS loại tin</a></p>
<p align="left"><a href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-book"></span> Trở về DS thể loại</a></p>
<p align="left"><a href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-home"></span> Trở về Trang chủ</a></p>
<div class="tb">
	@if(session('thongbao'))
	<div class="alert alert-success">
		<strong><big>Xóa thành công !!</big></strong><br>
		{{ session('thongbao') }}
	</div>
	@endif
</div>
<div class="row table-responsive">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th width="120px">Tiêu đề</th>
				<th>Mô tả</th>
				<th>Tóm tắt</th>
				<th>Nội dung</th>
				<th width="80px">Thể loại</th>
				<th width="80px">Loại tin</th>
				<th>Xem</th>
				<th width="65px">Nổi bật</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bien as $x)
			<tr>
				<td>{{ $x->id }}</td>
				<td><p>{{ $x->TieuDe }}</p>
					<img src="/upload/tintuc/{{ $x->Hinh }}" width="100px" height="80px">
				</td>
				<td>{{ $x->MoTa }}</td>
				<td>{{ $x->TomTat }}</td>
				<td>{{ $x->NoiDung }}</td>
				<td>{{ $x->loaitin->theloai->Ten }}</td>
				<td>{{ $x->loaitin->Ten }}</td>
				<td>{{ $x->SoLuotXem }}</td>
				<td>{{ $x->NoiBat }}</td>
				<td align="center"><a href="{{ route('admin.tintuc.getSua', $x->id) }}"><span class="glyphicon glyphicon-pencil"></span><br>Edit</a></td>
				<td align="center"><a href="{{ route('admin.tintuc.getXoa', $x->id) }}"><span class="glyphicon glyphicon-trash"></span><br>Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div style="text-align: center">
	{{ $bien->links() }}
</div>
@endsection