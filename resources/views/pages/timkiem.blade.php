@extends('pages.layout.master')
@section('title', 'Tìm kiếm Tin tức')
@section('style')
<style>
	.panel{ text-align: left; }
	.panel-heading{ background-color: #337AB7 !important; color: white !important; padding-top: 2px !important; cursor: pointer; }
	@media screen and ( max-width: 767px )
	{
		.panel{ margin-left: 10px; }
	}
</style>
@endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Kết quả tìm kiếm cho từ khóa: "{{ $tukhoa }}"</h2>
	</div>
	<div class="panel-body">
		@foreach($tintuc as $x)
		<div class="row">
			<div class="col-sm-4">
				<a href="{{ route('Tintuc', $x->id) }}"><img src="/upload/tintuc/{{ $x->Hinh }}" width="100%" height="200px;"></a>
			</div>
			<div class="col-sm-8">
				<h3><a href="{{ route('Tintuc', $x->id) }}">{{ $x->TieuDe }}</a></h3>
				<p>{{ $x->TomTat }}</p>
				<p><a href="{{ route('Tintuc', $x->id) }}" class="btn btn-primary">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
		<hr>
		@endforeach
		<div class="text-center">
			
		</div>
	</div>
</div>
@endsection