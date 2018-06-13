@extends('backend.master')
@section('main_title')
	<h2>Trang chủ</h2>
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-fw fa-home"></i> Trang chủ</a></li>
	</ol>
@stop
@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
        	<i class="fa fa-plus-circle" aria-hidden="true"></i> Trang chủ
    	</h4>
        <span class="pull-right">
            <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
            <i class="glyphicon glyphicon-remove removepanel"></i>
        </span>
    </div>
	<div class="panel-body table-responsive">
		<p>Chào mừng <strong><?php if (Auth::check()) echo Auth::user()->name; ?></strong> đến với hệ thống quản lý.</p>
	</div>
</div>


	
@stop

@section('header_import')

@stop