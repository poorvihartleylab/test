<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Add Role')

@section('content')
<div  class="">
@if (session('status'))
     <div class="alert alert-success">
        <a href="{{ route('add-role') }}" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
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
<div class="panel panel-default">
	<div class="panel-heading">User Role</div>
		<div class="panel-body">
			<form action="{{ route('save-role') }}" method="POST">
				{{ csrf_field() }}
				<table class="" width="600px;">
				<tr>
					<td><label>Role Name:</label></td><td>
						<input type="text" name="role_name" class="form-control"><br>
					</td>
				</tr><tr>
					<td>
						<input type="submit" name="submit" value="Add Role" class="btn btn-warning">
					</td>
				</tr>
				</table>
			</form>
		</div><!-- panel-body -->
	</div><!-- panel-default -->
</div>
@endsection


