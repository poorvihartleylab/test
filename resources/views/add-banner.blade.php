<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Add Banner')

@section('content')

<div class="container-fluid">
<div class="panel panel-default">
	<div class="panel-heading">Add Banner</div>
	<div class="panel-body">
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
	@endif

	<form action="{{ route('save-banner') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label class="custom-file">
			<input type="file" multiple name="fileToUpload[]"><br>
			<span class="custom-file-control"></span>
		</label><br>
		<input type="submit" name="save" class="btn btn-warning" value="Save">
	</form>
	</div><!-- panel-body -->
</div><!-- panel-default -->

<div class="panel panel-default">
	<div class="panel-heading">Banner List</div>
		<div class="panel-body">
			<table border="0px" class="table">
			<tr>
				<th style="width: 5%;">S No.</th>
				<th style="width: 10%;">File</th>
				<th style="width: 10%">Action</th>
			</tr>
			@foreach($banners as $key=>$banner)
			<tr>
				<td>{{ ++$key }}</td>
				<td><img src="{{ Storage::url($banner->imagepath) }}" width="150" height="100"></td>
				<td><a href="">Edit</a>/<a href="{{ route('destroy_image', ['banner_id' => $banner->id]) }}">Delete</a></td>
			</tr>
			@endforeach
		</div>
	</div>
</div>

</div><!-- container-fluid -->
@endsection