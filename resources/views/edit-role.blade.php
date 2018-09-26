<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div  class="jumbotron">

@if (session('status'))
     <div class="alert alert-success">
        <a href="{{ route('role-list') }}" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
     </div>
  @endif
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif
<form action="{{ url('update-role', $roles->id) }}" method="POST">
	{{ csrf_field() }}
	<table class="" width="600px;">
	<tr>
		<td><label>Role Name:</label></td><td>
			<input type="text" name="role_name" value="{{ $roles->role_name }}" class="form-control"><br>
		</td>
	</tr><tr>
		<td>
			<input type="submit" name="submit" value="Edit Role" class="btn btn-warning">
		</td>
	</tr>
	</table>
</form>
</div>
@endsection


