@extends('admin.layout.master')
@section('title', 'Admin - Thêm loại tin')
@section('style')
<style>
	.create{ box-shadow: 2px 2px 20px rgba(0,0,0, 0.2); padding: 40px 50px 50px 50px; }
	.create{ width: 70%; }
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
<div class="container" align="center">
	<div class="row">
		<div class="col-sm-12">
			<div class="create">
				<h2 align="left">Thêm loại tin</h2><br>
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
						<p><strong>Hãy chọn một thể loại:</strong></p>
						<select name="idtheloai" class="form-control">
						//Giải thích: Ta lưu vào DB id của thể loại nhưng vẫn muốn hiển thị tên của thể loại ra màn hình view
							@foreach($theloai as $x)
							<option value="{{ $x->id }}">{{ $x->Ten }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<p><strong>Tên loại tin:</strong></p>
						<input type="text" name="tenloaitin" placeholder="Điền tên loại tin vào đây..." class="form-control">
					</div>
					<div class="form-group">
						<p><strong>Mô tả:</strong></p>
						<input type="text" name="mota" placeholder="Điền mô tả vào đây..." class="form-control">
					</div><br>
					<div class="form-group">
						<button class="btn btn-default">Thêm</button>
						<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Danh sách thể loại</a>
						<a href="{{ route('admin.loaitin.hienthi') }}" class="btn btn-default">Danh sách loại tin</a>
						<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Trang chủ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection