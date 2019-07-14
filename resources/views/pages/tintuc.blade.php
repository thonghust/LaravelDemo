@extends('pages.layout.master')
@section('title', 'Trang Tin Tức')
@section('style')
<style>
	.foot{ background-color: #337AB7; color: white; padding-top: 20px; padding-bottom: 10px; margin-top: 10px; font-weight: bold }
	.col-sm-9 h1{ text-align: left; }
	.col-sm-9 h3{ text-align: left; }
	.col-sm-9 img{ text-align: left; }
	.col-sm-9 p{ text-align: left; }
	.jumbotron{ padding-top: 20px !important; padding-bottom: 0px !important; }
	.jumbotron h4{ text-align: left; }
	.dong{ margin-top: 5px; margin-left: 50px; margin-bottom: 20px; }
	.col-sm-10{ text-align: left; padding-top: 0px; }
	.panel-primary{ padding: 0px !important; }
	.panel-body a{ border: 0px !important; }
	.modal-header button{ font-size: 20px !important; color: red; font-weight: bold; opacity: 1}
	.modal-header button:hover{ color: orange; opacity: 1 }
	@media screen and ( max-width: 767px )
	{
		.col-sm-9{ margin-left: 7px; }
	}
</style>
<script>
	$(document).ready(function(){
		$('#napba').remove();
		$('.cn').remove();
		$('.footer').remove();
	});
</script>
@endsection
@section('news')
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<h1>Laravel Tin Tức: {{ $tintuc->TieuDe }}</h1>
			<h3>By <a href="{{ route('admin.tintuc.getSua', $tintuc->id) }}">Start Bootstrap</a></h3>
			<p><img src="/upload/tintuc/{{ $tintuc->Hinh }}" width="220px" height="200px"></p>
			<p><span class="glyphicon glyphicon-time"></span> Posted On: {{ $tintuc->created_at }}</p>
			<p>{!! $tintuc->NoiDung !!}</p>
			<div class="jumbotron">
				<div class="container">
					<form method="post" action="{{ route('postComment', $tintuc->id) }}">
						@csrf
						<h5><p>Viết bình luận... <span class="glyphicon glyphicon-pencil"></span></p></h5>
						<p><textarea name="noidung" class="form-control" placeholder="Nhập bình luận ở đây..." rows="5"></textarea></p>
						@if(session('thongbao'))
						<div class="alert alert-success" style="text-align: left">
							{{ session('thongbao') }}
						</div>
						@endif
						@if($errors->any())
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									<p style="font-size: 14px !important"><b>{{ $error }}</b></p>
								</div>
							@endforeach
						@endif
						@guest
						<p>
							<a class="btn btn-primary nut" data-toggle="modal" href='#modal-id'>Đăng bình luận</a>
							<div class="modal fade" id="modal-id">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><big>&times;</big></button>
											<h4 style="color: brown" class="modal-title"><center><b><span class="glyphicon glyphicon-star-empty"></span> Bạn chưa Đăng nhập <span class="glyphicon glyphicon-star-empty"></span></b></center></h4>
										</div>
										<div class="modal-body">
											<div class="alert alert-success">
												<p style="font-size: 15px"><strong>Bạn chưa đăng nhập</strong>, hãy đăng nhập để có thể bình luận bài viết này.</p>
												<p style="font-size: 15px"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập tại đây: <a class="btn btn-info" href="{{ route('getLogin') }}">Đăng nhập</a></p>
											</div>
											<div class="alert alert-info">
												<p style="font-size: 15px"><strong>Nếu chưa có tài khoản</strong>, hãy đăng ký một tài khoản mới</p>
												<p style="font-size: 15px"><span class="glyphicon glyphicon-log-out"></span> Đăng ký tài khoản tại đây: <a class="btn btn-primary" href="{{ route('getRegister') }}">Đăng ký</a></p>
											</div>
										</div>
										<div class="modal-footer">
											<a href="{{ route('Trangchu') }}" type="button" class="btn btn-success">Trang chủ</a>
											<a type="button" class="btn btn-danger" data-dismiss="modal">Quay lại</a>
										</div>
									</div>
								</div>
							</div>
						</p>
						@else
						<p>
							<button type="post" class="btn btn-primary nut">Đăng bình luận</button>
						</p>
						@endguest
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					@foreach($tintuc->comment as $cmt)
					<div class="row dong">
						<div class="col-sm-2">
							<img src="/upload/tintuc/user.png" width="50px" height="50px;">
						</div>
						<div class="col-sm-10">
							{{ $cmt->user->name }}
							<small style="color: grey">{{ $cmt->user->created_at }}</small>
							<p><small>{{ $cmt->NoiDung }}</small></p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Tin liên quan
				</div>
				<div class="panel-body">
					@foreach($tinlienquan as $lq)
					<div class="row">
						<div class="col-sm-5">
							<a href="{{ route('Tintuc', $lq->id) }}"><img src="/upload/tintuc/{{ $lq->Hinh }}" width="100%" height="100%"></a>
						</div>
						<div class="col-sm-7">
							<a href="{{ route('Tintuc', $lq->id) }}">{{ $lq->TieuDe }}</a>
						</div>
					</div>
					<br>
					@endforeach
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					Tin nổi bật
				</div>
				<div class="panel-body">
					@foreach($tinnoibat as $nb)
					<div class="row">
						<div class="col-sm-5">
							<a href="{{ route('Tintuc', $nb->id) }}"><img src="/upload/tintuc/{{ $nb->Hinh }}" width="100%" height="100%"></a>
						</div>
						<div class="col-sm-7">
							<a href="{{ route('Tintuc', $nb->id) }}">{{ $nb->TieuDe }}</a>
						</div>
					</div>
					<br>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container text-center foot">
	<p>Copyright @ Facebook.Google.Youtube All right serverd.</p>
</div>
@endsection