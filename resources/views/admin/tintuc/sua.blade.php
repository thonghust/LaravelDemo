@extends('admin.layout.master')
@section('title', 'Admin - Sửa tin tức')
@section('style')
<style>
	.create{ box-shadow: 2px 2px 20px rgba(0,0,0, 0.2); padding: 40px 50px 50px 50px; }
	.create{ width: 60%; }
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
<div class="container" align="center">
	<div class="row">
		<div class="col-sm-12">
			<div class="create">
				<h2 align="left">Sửa tin tức</h2><br>
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
				<div class="confirm">
					@if(session('notice'))
					<div class="alert alert-success">
						<strong><big>Đã xóa 1 Comment khỏi cơ sở dữ liệu</big></strong><br>
						{{ session('notice') }}
					</div>
					@endif
				</div>
				<form method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<p><strong>Thể loại</strong></p>
						<select name="idTheloai" class="form-control" id="TheLoai">
							@foreach($theloai as $tl)
							<option 
								@if($tl->id == $tintuc->loaitin->theloai->id)
									{{ "selected" }}
								@endif
							value="{{ $tl->id }}">{{ $tl->Ten }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<p><strong>Loại tin</strong></p>
						<select name="idLoaitin" class="form-control" id="LoaiTin">
							@foreach($loaitin as $lt)
							<option
								@if($lt->id == $tintuc->loaitin->id)
									{{ "selected" }}
								@endif
							 value="{{ $lt->id }}">{{ $lt->Ten }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<p><strong>Tiêu đề</strong></p>
						<input type="text" value="{{ $tintuc->TieuDe }}" name="tieude" class="form-control" placeholder="Nhập tiêu đề...">
					</div>
					<div class="form-group">
						<p><strong>Chọn ảnh</strong></p>
						<p align="center"><img class="img-responsive" src="/upload/tintuc/{{ $tintuc->Hinh }}" width="400px" height="320px"></p>
						<input type="file" name="anh" class="form-control" value="/upload/tintuc/{{ $tintuc->Hinh }}">
					</div>
					<div class="form-group">
						<p><strong>Mô tả</strong></p>
						<input type="text" value="{{ $tintuc->MoTa }}" name="mota" class="form-control" placeholder="Nhập mô tả...">
					</div>
					<div class="form-group">
						<p><strong>Tóm tắt</strong></p>
						<textarea name="tomtat" class="form-control" placeholder="Nhập tóm tắt...">{{ $tintuc->TomTat }}</textarea>
					</div>
					<div class="form-group">
						<p><strong>Nội dung</strong></p>
						<textarea id="demo" name="noidung" class="form-control ckeditor" placeholder="Nhập nội dung...">{{ $tintuc->NoiDung }}</textarea>
					</div>
					<div class="form-group">
						<p><strong>Nổi bật</strong></p>
						<label class="radio-inline"><input value="1" type="radio" name="noibat" @if($tintuc->NoiBat == 1) {{ "checked" }} @endif>Có</label>
						<label class="radio-inline"><input value="0" type="radio" name="noibat" @if($tintuc->NoiBat == 0) {{ "checked" }} @endif>Không</label>
					</div>
					<div class="form-group">
						<strong>Reset lại </strong>
						<button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></button>
					</div>
					<div class="form-group gr">
						<button class="btn btn-default">Sửa</button>
						<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Danh sách thể loại</a>
						<a href="{{ route('admin.loaitin.hienthi') }}" class="btn btn-default">Danh sách loại tin</a>
						<a href="{{ route('admin.tintuc.hienthi') }}" class="btn btn-default">Xem tin tức</a>
						<a href="{{ route('admin.theloai.hienthi') }}" class="btn btn-default">Trang chủ</a>
					</div>
				</form>
				<table class="table table-hover table-striped table-bordered">
					<tr>
						<th>ID</th>
						<th>Người dùng</th>
						<th>Nội dung</th>
						<th>Ngày đăng</th>
						<th>Delete</th>
					</tr>
					@foreach($comment as $cmt)
					<tr>
						<td>{{ $cmt->id }}</td>
						<td>{{ $cmt->user->name }}</td>
						<td>{{ $cmt->NoiDung }}</td>
						<td>{{ $cmt->created_at }}</td>
						<td><a href="{{ route('admin.comment.getXoa', ['id' => $cmt->id, 'idTinTuc' => $tintuc->id] ) }}"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
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