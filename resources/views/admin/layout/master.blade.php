<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js" ></script>
	<style>
		input, a, button, select, textarea{ border-radius: 0px !important; }
		th{ text-align: center; }
		.container{ text-align: center;}
		.cha, .con{ padding-top: 10px; padding-bottom: 10px; background-color: #f8f8f8; border: 1px solid #e7e7e7; }
		.cha:hover, .con:hover{ background-color: #eeeeee; cursor: pointer; }
		.cha{ font-size: 15px; font-weight: bold }
		.con{ font-size: 13px; }
		.col-sm-3 a{ display: block; text-decoration: none; }
		.home{ font-size: 14px; font-weight: bold; padding-top: 10px; padding-bottom: 10px; background-color: #f8f8f8; border: 1px solid #e7e7e7; }
		.home:hover{ ackground-color: #eeeeee; }
		a.cha span{ transition: transform 0.5s; }
		a.cha:hover span, a.cha:visited span{ transform: translate(8px,0px); }
		.con div{ transition: transform 0.5s; }
		.con:hover div{ transform: translate(5px,0px); }
		.navbar{ position: sticky; top: 0px; z-index: 1}
		.col-sm-3{ position: sticky; top: 65px; }
		@media screen and ( max-width: 767px)
		{
			.navbar{ position: static; }
			.col-sm-3{ position: static; margin-bottom: 20px; }
		}
	</style>
	@yield('style')
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="navbar-brand" href="{{ route('admin.theloai.hienthi') }}">Trang Quản Trị Admin</a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#">Lịch sử chỉnh sửa</a></li>
					<li><a href="#">Hướng dẫn</a></li>
				</ul>
				<form method="post" action="/Timkiem" class="navbar-form navbar-left" role="search">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Tìm kiếm một tin tức..." name="tukhoa">
					</div>
					<button type="submit" class="btn btn-default">Tìm kiếm</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					@guest
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Xin chào, <font style="font-weight: bold"> Khách</font></a></li>
					<li><a href="{{ route('getLogin') }}">Đăng nhập</a></li>
					<li><a href="{{ route('getRegister') }}">Đăng ký</a></li>
					@else
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Xin chào, <font style="color: red">Admin</font><font style="font-weight: bold"> {{ Auth::user()->name }}</font></a></li>
					<li><a href="{{ route('Trangchu') }}"><span class="glyphicon glyphicon-home"></span> Đến Trang Chủ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Tùy chọn <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="{{ route('getLogout') }}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
						</ul>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
			</li>
			<li>
				<a href="#"><span class="glyphicon glyphicon-envelope"></span> Tin nhắn</a>
			</li>
			<li>
				<a href="#"><span class="glyphicon glyphicon-bell"></span> Thông báo</a>
			</li>
			<li>
				<a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Liên hệ</a>
			</li>
		</ol>
	</div>
	<div class="container text-center">
		<div class="row">
			<div class="col-sm-3">
				<a class="home" href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-home"></span> Đến Trang Chủ Admin</a>
				<a class="home" href="{{ route('Trangchu') }}"><span class="glyphicon glyphicon-home"></span> Đến Trang Chủ User</a>
				<a class="cha">Danh sách thể loại <span class="glyphicon glyphicon-forward"></span></a>
				<div class="bao">
					<a class="con" href="{{ route('admin.theloai.hienthi') }}"><div><span class="glyphicon glyphicon-eye-open"></span> Hiển thị thể loại</div></a>
					<a class="con" href="{{ route('admin.theloai.getThem') }}"><div><span class="glyphicon glyphicon-plus-sign"></span>Thêm thể loại mới</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-cog"></span> Sửa thể loại</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-trash"></span> Xóa thể loại</div></a>
				</div>
				<a class="cha">Danh sách loại tin <span class="glyphicon glyphicon-forward"></span></a>
				<div class="bao">
					<a class="con" href="{{ route('admin.loaitin.hienthi') }}"><div><span class="glyphicon glyphicon-eye-open"></span> Hiển thị loại tin</div></a>
					<a class="con" href="{{ route('admin.loaitin.getThem') }}"><div><span class="glyphicon glyphicon-plus-sign"></span> Thêm loại tin mới</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-cog"></span> Sửa loại tin</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-trash"></span> Xóa loại tin</div></a>
				</div>
				<a class="cha">Danh sách tin tức <span class="glyphicon glyphicon-forward"></span></a>
				<div class="bao">
					<a class="con" href="{{ route('admin.tintuc.hienthi') }}"><div><span class="glyphicon glyphicon-eye-open"></span> Hiển thị tin tức</div></a>
					<a class="con" href="{{ route('admin.tintuc.getThem') }}"><div><span class="glyphicon glyphicon-plus-sign"></span> Thêm tin tức mới</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-cog"></span> Sửa tin tức</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-trash"></span> Xóa tin tức</div></a>
				</div>
				<a class="cha">Danh sách User <span class="glyphicon glyphicon-forward"></span></a>
				<div class="bao">
					<a class="con" href="{{ route('admin.user.hienthi') }}"><div><span class="glyphicon glyphicon-eye-open"></span> Hiển thị User</div></a>
					<a class="con" href="{{ route('admin.user.getThem') }}"><div><span class="glyphicon glyphicon-plus-sign"></span> Thêm User mới</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-cog"></span> Sửa User</div></a>
					<a class="con" href="#"><div><span class="glyphicon glyphicon-trash"></span> Xóa User</div></a>
				</div>
			</div>
			<div class="col-sm-9">@yield('content')</div>
		</div>
	</div>
	<div class="container text-center">
		<hr>
		<p>Copyright @ Facebook.Google.Youtube All right serverd.</p>
	</div>
	@yield('script')
	<script>
		$(document).ready(function(){
			//Đây là phần lấy nội dung Ajax từ trang khác
			$('#btn').click(function(){
				$.get('/admin/ajax/thong/', function(data){
					$('#myAjax').html(data);
				});
			});

			//Đây là phần xử lý hiệu ứng Slide cho thanh Slide điều hướng mượt mà hơn
			$('.cha').click(function(){
				$(this).next().slideToggle();
			});

			/*Đây là phần xử lý khi ta vào một trang bất kỳ có Slide thì các Slide con sẽ
			ẩn đi khi chiều rộng màn hình bé hơn 767px chỉ còn phần Slide cha. Điều này cũng sẽ  
			sẽ xảy ra khi mà ta tải lại trang, Reload lại trang web. Nếu không có phần này xử lý 
			thì khi ta vào trang hoặc tải lại trang, các Slide con sẽ không bị ẩn đi mà vẫn 
			hiển thị ra màn hình, Phần này kết hợp cả phần sử dụng sự kiện resize bên dưới 
			để tạo nên sự Responsive cho trang Web bằng cách sử dụng JavaScript - JQuery
			*/
			var width = $(window).width();
			if (width < 767){
				$('.bao').hide();
			}
			else
			{
				$('.bao').show();
			}

			/*Đây là phần xử lý khi ta thay đổi kích cỡ của màn hình Máy tính như là PC, 
			Laptop, Macbook, đến một kích cỡ màn hình nhỏ hơn 767px thì các Slide con sẽ
			tự động bị ẩn đi chỉ còn Slide cha hiển thị ra màn hình. Phần này và phần trên
			là một phẩn của mảnh ghép tạo nên Responsive cho trang Web sử dụng JavaScript
			và JQuery
			*/
			$(window).resize(function() {
				var width = $(window).width();
				if (width < 767){
					$('.bao').hide();
				}
				else
				{
					$('.bao').show();
				}
			});
		});
	</script>
</body>
</html>