@extends('admin.layout.master')
@section('title', 'Admin - Danh sách loại tin')
@section('style')
<style>
	.tb{ text-align: left; }
	.tc{ margin-bottom: 0px !important; }
	.pagi .pagination{ margin-bottom: 0px; }
</style>
@endsection
@section('content')
<h2 align="left" style="margin-top: 0px;">Danh sách loại tin</h2>
<p align="left"><a href="{{ route('admin.loaitin.getThem') }}"><span class="glyphicon glyphicon-plus-sign"></span> Thêm loại tin mới</a></p>
<p align="left"><a href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-backward"></span> Trở về DS thể loại</a></p>
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
			<th>Tên loại tin</th>
			<th>Mô Tả</th>
			<th>Thể loại</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach($bien as $x)
		<tr>
			<td>{{ $x->id }}</td>
			<td>{{ $x->Ten }}</td>
			<td>{{ $x->MoTa }}</td>
			<td>{{ $x->theloai->Ten }}</td>
			<td><p class="tc"><span class="glyphicon glyphicon-pencil"></span> <a href="{{ route('admin.loaitin.getSua', $x->id) }}">Edit</a></p></td>
			<td><p class="tc"><span class="glyphicon glyphicon-trash"></span>
				

				<a data-toggle="modal" href='#modal-id'>Delete</a>
				<div class="modal fade" id="modal-id">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 style="color: brown" class="modal-title"><center><b><span class="glyphicon glyphicon-star-empty"></span> Bạn đang xóa một loại tin <span class="glyphicon glyphicon-star-empty"></span></b></center></h4>
							</div>
							<div class="modal-body">
								<div class="alert alert-success">
									<p style="font-size: 15px"><strong><span style="color: red; font-weight: bold" class="glyphicon glyphicon-exclamation-sign"><big>Warning:</big></span> Bạn đang xóa một loại tin</strong>, hãy chắc chắn rằng loại tin này bạn muốn xóa.</p>
									<p style="font-size: 15px; text-align: left"><span class="glyphicon glyphicon-log-in"></span> Tìm hiểu thêm về xóa loại tin này tại đây: <a class="btn btn-info" href="#">Tìm hiểu thêm</a></p>
								</div>
								<div class="alert alert-info">
									<p style="font-size: 15px"><strong style="color: red"><span class="glyphicon glyphicon-warning-sign"></span> Thận trọng: </strong> Khi xóa loại tin này, bạn sẽ xóa hoàn toàn loại tin khỏi cơ sở dữ liệu, điều này là không thể hoàn tác lại.</p>
									<p style="font-size: 15px; text-align: left; font-weight: bold"><span class="glyphicon glyphicon-trash"></span> Tôi vẫn muốn xóa vĩnh viễn loại tin này: <a class="btn btn-primary" href="{{ route('admin.loaitin.getXoa', $x->id) }}">Xóa loại tin</a></p>
								</div>
							</div>
							<div class="modal-footer">
								<a href="{{ route('Trangchu') }}" type="button" class="btn btn-primary" >Đến trang chủ</a>
								<a type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
							</div>
						</div>
					</div>
				</div>
			</p></td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="pagi"> 
	{{ $bien->links() }}
</div>
@endsection