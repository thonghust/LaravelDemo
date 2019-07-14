@extends('pages.layout.master')
@section('title', 'Trang Chủ Của Thông')
@section('style')
<style>
	.panel{ text-align: left; }
	.panel-heading{ background-color: #337AB7 !important; color: white !important; padding-top: 2px !important; cursor: pointer; }
	big{ font-size: 25px ; }
	.panel-body font{ font-size: 17px; font-style: italic; }
	@media screen and ( max-width: 767px )
	{
		.panel{ margin-left: 10px; }
		.nut{ margin-bottom: 10px; }
	}
</style>
@endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Laravel Tin Tức</h2>
	</div>
	<div class="panel-body">
		@foreach($theloai as $x)
		<p><big><a href="{{ route('Loaitin', $x->id) }}"> {{ $x->Ten }}</a> | </big> <font>@foreach($x->loaitin as $y)<a href="{{ route('Loaitin', $y->id) }}"> {{ $y->Ten }}</a>/ @endforeach</font></p>
		<div class="row">
			<?php
				$data = $x->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(5);
				$tin1 = $data->shift();
			?>
			<div class="col-sm-4">
				<a href="Tintuc/{{ $tin1['id'] }}"><img src="/upload/tintuc/{{ $tin1['Hinh'] }}" width="300px" height="300px" class="img img-responsive"></a>
			</div>
			<div class="col-sm-4">
				<h3><a href="Tintuc/{{ $tin1['id'] }}">{{ $tin1['TieuDe'] }}</a></h3>
				<p>{{ $tin1['TomTat'] }}</p>
				<a href="Tintuc/{{ $tin1['id'] }}" class="btn btn-primary nut">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			<div class="col-sm-4">
				@foreach($data->all() as $z)
				<p style="font-size: 17px;"><a href="Tintuc/{{ $z['id'] }}"><span class="glyphicon glyphicon-th-list"></span> {{ $z['TieuDe'] }}</a></p>
				@endforeach
			</div>
		</div>
		<hr>
		@endforeach
	</div>
</div>
@endsection