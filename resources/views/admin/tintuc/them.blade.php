@extends('admin.layout.master')
@section('title', 'Admin - Thêm tin tức')
@section('style')
<style>
	.create{ box-shadow: 2px 2px 20px rgba(0,0,0, 0.2); padding: 40px 50px 50px 50px; }
	.create{ width: 80%; }
	.form-group{ text-align: left; }
	.error{ text-align: left }
	.confirm{ text-align: left }
	.gr{ margin-top: 25px; }
	@media screen and ( max-width: 767px )
	{
		.create{ width: 100%; }
	}
</style>
@endsection
@section('content')
<div class="create">
	<h2 align="left">Thêm tin tức</h2><br>
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
	<form method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<p><strong>Thể loại</strong></p>
			<select name="idTheloai" class="form-control" id="TheLoai">
				<option>Chọn một Thể loại</option>
				@foreach($theloai as $tl)
				<option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<p><strong>Loại tin</strong></p>
			<select name="idLoaitin" class="form-control" id="LoaiTin">
				<option>Chọn một Loại tin</option>
				@foreach($loaitin as $lt)
				<option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<p><strong>Tiêu đề</strong></p>
			<input type="text" name="tieude" class="form-control" placeholder="Nhập tiêu đề...">
		</div>
		<div class="form-group">
			<p><strong>Chọn ảnh</strong></p>
			<input type="file" name="anh" class="form-control">
		</div>
		<div class="form-group">
			<p><strong>Mô tả</strong></p>
			<input type="text" name="mota" class="form-control" placeholder="Nhập mô tả...">
		</div>
		<div class="form-group">
			<p><strong>Tóm tắt</strong></p>
			<textarea name="tomtat" class="form-control" placeholder="Nhập tóm tắt..."></textarea>
		</div>
		<div class="form-group">
			<p><strong>Nội dung</strong></p>
			<textarea id="demo" name="noidung" class="form-control ckeditor" placeholder="Nhập nội dung..."></textarea>
		</div>
		<div class="form-group">
			<p><strong>Nổi bật</strong></p>
			<label class="radio-inline"><input value="1" type="radio" name="noibat" checked>Có</label>
			<label class="radio-inline"><input value="0" type="radio" name="noibat">Không</label>
		</div>
		<div class="form-group">
			<strong>Reset lại </strong>
			<button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></button>
		</div>
		<div class="form-group gr">
			<button class="btn btn-default">Thêm</button>
			<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Danh sách thể loại</a>
			<a href="{{ route('admin.loaitin.hienthi') }}" class="btn btn-default">Danh sách loại tin</a>
			<a href="{{ route('admin.tintuc.hienthi') }}" class="btn btn-default">Xem tin tức</a>
			<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Trang chủ</a>
		</div>
	</form>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('#TheLoai').change(function(){
			var idTheloai = $(this).val();
			$.get("/admin/ajax/loaitin/" + idTheloai, function(data){
				$("#LoaiTin").html(data);
			});
		});
	});
</script>
@endsection