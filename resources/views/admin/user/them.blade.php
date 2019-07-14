@extends('admin.layout.master')
@section('title', 'Admin - Thêm User')
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
	<h2 align="left">Thêm User</h2><br>
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
			<strong><big>Thêm thành công !!</big></strong><br>
			{{ session('thongbao') }}
		</div>
		@endif
	</div>
	<form method="post">
		@csrf
		<div class="form-group">
			<p><strong>Họ tên:</strong></p>
			<input type="text" name="hoten" placeholder="Điền họ tên vào đây..." class="form-control">
		</div>
		<div class="form-group">
			<p><strong>Email:</strong></p>
			<input type="text" name="email" placeholder="Điền email vào đây..." class="form-control">
		</div>
		<div class="form-group">
			<p><strong>Mật khẩu:</strong></p>
			<input type="password" name="mk" placeholder="Nhập mật khẩu của bạn..." class="form-control">
		</div>
		<div class="form-group">
			<p><strong>Nhập lại mật khẩu:</strong></p>
			<input type="password" name="nlmk" placeholder="Nhập lại mật khẩu..." class="form-control">
		</div>
		<div class="form-group">
			<p><strong>Quyền người dùng: </strong></p>
			<label class="radio-inline"><input value="0" type="radio" name="quyen"  checked> Thường</label>
			<label class="radio-inline"><input value="1" type="radio" name="quyen" > Admin</label>
		</div><br>
		<div class="form-group">
			<button class="btn btn-default">Thêm User</button>
			<button class="btn btn-default" type="reset">Làm mới</button>
			<a href="{{ route('admin.user.hienthi') }}" class="btn btn-default">Danh sách User</a>
			<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Trang chủ</a>
		</div>
	</form>
</div>
@endsection