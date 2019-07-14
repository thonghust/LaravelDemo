@extends('admin.layout.master')
@section('title', 'Admin - Sửa thể loại')
@section('style')
<style>
	.create{ box-shadow: 2px 2px 20px rgba(0,0,0, 0.2); padding: 40px 50px 50px 50px; }
	.create{ width: 100%; }
	.form-group{ text-align: left; }
	.error{ text-align: left }
	.confirm{ text-align: left }
	@media screen and ( max-width: 767px )
	{
		.create{ width: 100%; }
	}
</style>
@endsection
@section('content')
<div class="create">
	<h2 align="left">Sửa thể loại</h2><br>
	<div class="error">
		@if($errors->any())
		<div class="alert alert-danger"><strong><big>Đã xảy ra lỗi !!</big></strong>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
	<div class="confirm">
		@if(session('thongbao'))
		<div class="alert alert-success">
			<strong><big>Sửa thành công !!</big></strong><br>
			{{ session('thongbao') }}
		</div>
		@endif
	</div>
	<form method="post">
		@csrf
		<div class="form-group">
			<p><strong>Tên thể loại:</strong></p>
			<input type="text" name="ten" value="{{ $bien->Ten }}" class="form-control">
		</div>
		<div class="form-group">
			<p><strong>Mô tả:</strong></p>
			<input type="text" name="mota" value="{{ $bien->MoTa }}" class="form-control">
		</div><br>
		<div class="form-group">
			<button class="btn btn-default">Sửa</button>
			<a href="{{ url('admin/theloai/hienthi') }}" class="btn btn-default">Danh sách thể loại</a>
			<a href="{{ url('admin/theloai/hienthi') }}" class="btn btn-default">Trang chủ</a>
		</div>
	</form>
</div>
@endsection