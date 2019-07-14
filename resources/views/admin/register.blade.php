<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký tài khoản</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		.container{ margin-top: 100px; width: 25%; }
		.panel-heading, .panel-body{ padding-left: 30px; padding-right: 30px; }
		button{ width: 100% }
		a.btn{ width: 48%; }
		.error{ text-align: left; }
		.panel{ border-radius: 0px !important; box-shadow: 2px 2px 20px rgba(0,0,0, .2); border: 0px; }
		button, a, input{ border-radius: 0px !important; }
		.panel-heading{ background-color: #337AB7 !important; color: white !important; }
		input{ border: 1px solid #eeeeee !important; border-top: 0px !important; }
		.alert{ border-radius: 0px; }
		@media screen and ( max-width: 1500px )
		{
			.container{ width: 40%; }
		}
		@media screen and ( max-width: 767px )
		{
			.container{ width: 90%; }
		}
	</style>
</head>
<body>
	<div class="container text-center">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><span class="glyphicon glyphicon-user"></span> Đăng ký tài khoản</h3>
			</div>
			<form method="post">
				@csrf
				<div class="panel-body">
					<div class="error">
						@if(session('thongbao'))
						<div class="alert alert-success">
							<strong><big>Đã xảy ra lỗi !!</big></strong>
							<ul>
								<li>{{ session('thongbao') }}</li>
							</ul>
						</div>
						@endif
					</div>
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
					<div class="form-group">
						<input type="text" name="hoten" class="form-control" placeholder="Họ tên">
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="E-mail">
					</div>
					<div class="form-group">
						<input type="password" name="mk" class="form-control" placeholder="Mật khẩu">
					</div>
					<div class="form-group">
						<input type="password" name="nlmk" class="form-control" placeholder="Nhập lại mật khẩu">
					</div>
					<div class="form-group">
						<button class="btn btn-lg btn-success">Đăng ký</button>
					</div>
					<div class="form-group">
						<a href="{{ route('getLogin') }}" class="btn btn-lg btn-info">Đăng nhập</a>
						<a href="{{ route('Trangchu') }}" class="btn btn-lg btn-danger">Trang chủ</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>