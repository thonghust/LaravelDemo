<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		.carousel-control{ background-image: none !important; }
		.item img{ height: 500px !important; }
		.carousel{ margin-bottom: 10px; }
		@media screen and (max-width: 767px)
		{
			.cn{ padding-left: 0px; padding-right: 0px; }
		}
		input, a, button, select, textarea{ border-radius: 0px !important; }
		th{ text-align: center; }
		.container{ text-align: center;}
		.cha, .con{ padding-top: 10px; padding-bottom: 10px; background-color: #f8f8f8; border: 1px solid #e7e7e7; }
		.cha:hover, .con:hover{ background-color: #eeeeee; cursor: pointer; }
		.cha{ font-size: 15px; font-weight: bold }
		.con{ font-size: 13px; }
		.col-sm-3 a{ display: block; text-decoration: none; }
		.home{ font-size: 14px; font-weight: bold; padding-top: 10px; padding-bottom: 10px; background-color: #f8f8f8; border: 1px solid #e7e7e7; }
		.home:hover{ background-color: #eeeeee; }
		a.cha span{ transition: transform 0.5s; }
		a.cha:hover span, a.cha:visited span{ transform: translate(8px,0px); }
		.con div{ transition: transform 0.5s; }
		.con:hover div{ transform: translate(5px,0px); }
		.navbar{ position: sticky; top: 0px; z-index: 100 !important}
		.col-sm-3{ position: sticky; top: 60px; }
		a.home{ background-color: #C9302C; color: white; }
		a.cha{ background-color: #337AB7; color: white; }
		a.cha:hover{ background-color: #337AB7; }
		.navbar{ margin-bottom: 10px; }
		.col-sm-3 a{ border-right: 1px solid #337AB7; border-left: 1px solid #337AB7; border-bottom: 1px solid #337AB7 }
		a.cha{ border-top: 0px; }
		.carousel img{ cursor: pointer; }
		.footer{ background-color: #337AB7; color: white; padding-top: 20px; padding-bottom: 10px; margin-top: 10px; font-weight: bold }
		.col-sm-9{ padding-left: 0px; }
		a:hover.con{ background-color: white !important; }
		a.con{ background-color: white !important; }
		.navbar{ border: 0px; background-color: #337AB7 !important; }
		.navbar-brand{ color: white !important; }
		.navbar-nav li a{ color: white !important; }
		.open .dropdown-toggle{ background-color: #337AB7 !important; color: white !important; }
		.dropdown-menu li a{ color: white !important; background-color: #337AB7 !important; }
		.dropdown-menu{ padding: 0px; border: 0px; }
		.navbar-header a{ transition: transform 0.5s }
		.navbar-header a:hover{ transform: scale(1.2); }
		@media screen and ( max-width: 767px)
		{
			.navbar{ position: static; }
			.col-sm-3{ position: static; margin-bottom: 20px; }
			.item img{ height: auto !important; }
			a.cha{ border-top: 1px solid white; }
			.icon-bar{ background-color: white !important; }
			.navbar-header button{ background-color: #337AB7 !important; }
			.navbar-header button:hover{ background-color: white !important; color: #337AB7 !important; border: 0px; }
			.navbar-header button:hover .icon-bar{ background-color:  #337AB7 !important; }
		}
	</style>
	@yield('style')
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle but-ton" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('Trangchu') }}">Trang Chủ</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#"><span class="glyphicon glyphicon-camera"></span> Trang cá nhân</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-comment"></span> Tin nhắn</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-globe"></span> Thông báo</a></li>
					<li><a href="{{ route('Lienhe') }}"><span class="glyphicon glyphicon-envelope"></span> Liên hệ</a></li>
				</ul>
				<form method="post" action="/Timkiem" class="navbar-form navbar-left" role="search">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Tìm kiếm..." name="tukhoa">
					</div>
					<button type="submit" class="btn btn-info">Tìm kiếm</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					@guest
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Xin chào, <font style="font-weight: bold"> Khách</font></a></li>
					<li><a href="{{ route('getLogin') }}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
					<li><a href="{{ route('getRegister') }}"><span class="glyphicon glyphicon-edit"></span> Đăng ký tài khoản</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Tùy chọn khác <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Nhóm</a></li>
							<li><a href="#">Trang FanPages</a></li>
							<li><a href="#">Cộng đồng</a></li>
							<li><a href="#">Liên hệ</a></li>
						</ul>
					</li>
					@else
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Xin chào, @if(Auth::user()->quyen == 1)<font style="color: yellow; font-weight: bold;">Admin</font>@endif<font style="font-weight: bold"> {{ Auth::user()->name }}</font></a></li>
					<li><a href="{{ route('Trangchu') }}"><span class="glyphicon glyphicon-home"></span> Trang Chủ</a></li>
					@if(Auth::user()->quyen == 1)
					<li><a href="{{ route('admin.theloai.hienthi') }}"><span class="glyphicon glyphicon-th"></span> Trang Quản trị</a></li>
					@endif
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Tùy chọn <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Nhóm</a></li>
							<li><a href="#">Trang FanPages</a></li>
							<li><a href="#">Cộng đồng</a></li>
							<li><a href="#">Liên hệ</a></li>
							<li><a href="{{ route('getLogout') }}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
						</ul>
					</li>
					@endguest
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container cn">
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class=""></li>
				<li data-target="#carousel-id" data-slide-to="1" class=""></li>
				<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item">
					<img src="/upload/tintuc/1.jpg" width="100%">
					<div class="container">
						<div class="carousel-caption">
							<h1>Example headline.</h1>
							<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
							<p><a href="{{ route('Trangchu') }}" class="btn btn-lg btn-info" role="button" data-toggle="modal" href='#modal-id'>Sign up today</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="/upload/tintuc/2.jpg" width="100%">
					<div class="container">
						<div class="carousel-caption">
							<h1>Another example headline.</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a href="{{ route('Trangchu') }}" class="btn btn-lg btn-info" role="button" data-toggle="modal" href='#modal-id'>Learn more</a></p>
						</div>
					</div>
				</div>
				<div class="item active">
					<img src="/upload/tintuc/3.jpg" width="100%">
					<div class="container">
						<div class="carousel-caption">
							<h1>One more for good measure.</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a href="{{ route('Trangchu') }}" class="btn btn-lg btn-info" role="button" data-toggle="modal" href='#modal-id'>Browse gallery</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>
@yield('news')
<div class="container text-center" id="napba">
	<div class="row">
		<div class="col-sm-3">
			@foreach($theloai as $x)
			<a class="cha">{{ $x->Ten }} <span class="glyphicon glyphicon glyphicon-forward"></span></a>
			<div class="bao">
				@foreach($x->loaitin as $y)
				<a href="{{ route('Loaitin', $y->id) }}" class="con"><div> {{ $y->Ten }}</div></a>
				@endforeach
			</div>
			@endforeach
		</div>
		<div class="col-sm-9">@yield('content')</div>
	</div>
</div>
<div class="container text-center footer">
	<p>Copyright @ Facebook.Google.Youtube All right serverd.</p>
</div>
<script>
	$(document).ready(function(){
		//Đây là phần xử lý hiệu ứng Slide cho thanh Slide điều hướng mượt mà hơn
		$('.cha').click(function(){
			$(this).next().slideToggle();
			$('a.cha').css('border-top', '1px solid white');
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