@extends('pages.layout.master')
@section('title', 'Trang Contact Của Thông')
@section('style')
<style>
	.panel{ text-align: left; cursor: pointer; }
	.panel h5{ margin-bottom: 25px !important; }
	.panel-heading{ background-color: #337AB7 !important; color: white !important; padding-top: 2px !important; }
</style>
@endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Liên Hệ</h2>
	</div>
	<div class="panel-body">
		<h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3><hr>
		<h4><span class="glyphicon glyphicon-home"></span> Địa chỉ:</h4>
		<h5>90-92 Lê Thị Riêng, Quận 1, Bến Thành, HCM</h5>
		<h4><span class="glyphicon glyphicon-envelope"></span> Email:</h4>
		<h5>90-92 Lê Thị Riêng, Quận 1, Bến Thành, HCM</h5>
		<h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại</h4>
		<h5>90-92 Lê Thị Riêng, Quận 1, Bến Thành, HCM</h5>
		<br><br>
		<h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3><hr>
		<center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5201952559787!2d106.68891131458902!3d10.771412992324944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3c586421ef%3A0xb606461dc7627921!2zVHJ1bmcgVMOibSDEkMOgbyBU4bqhbyBUaW4gSOG7jWMgS2hvYSBQaOG6oW0!5e0!3m2!1svi!2s!4v1465285414810" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></center>
	</div>
</div>
@endsection