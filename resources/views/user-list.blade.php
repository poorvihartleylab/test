<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'User List')

@section('content')
<div class=" div-table">
	  @if (session('status'))
         <div class="alert alert-success">
            <a href="{{ route('list') }}" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
         </div>
      @endif

	<h3>User List</h3><br>
	<table border="0px" class="table">
		<tr>
			<th style="width: 5%;">S No.</th>
			<th style="width: 10%;">First Name</th>
			<th style="width: 10%;">Last Name</th>
			<th style="width: 20%;">Email</th>
			<th style="width: 10%">Role</th>
			<th style="width: 10%">Mobile</th>
			<th style="width: 20%">Message</th>
			@if(Auth::user()->email == "mike111taylor@gmail.com")
			<th style="width: 15%">Action</th>
			@endif
		</tr>

		@if($users)
			@foreach($users as $key => $user_data)
				<tr>
					<td>{{ ++$key }}</td>
					<td>{{ $user_data->firstname }}</td>
					<td>{{ $user_data->lastname }}</td>
					<td>{{ $user_data->email }}</td>
					<td>{{ $user_data->role->role_name }}</td>
					<!-- role is  function define into the model -->
					<td>
						@foreach($user_data->mobile as $mobileinfo)
						{{ $mobileinfo->mobile }}
						@endforeach
						<!-- calling mobile function define in the model-->
					</td>
					<td>{{ $user_data->message }}</td>
					@if(Auth::user()->email == "mike111taylor@gmail.com")
					<td><a href="{{ route('edit-user', ['user_id' => $user_data->id]) }}" class="btn btn-success">Edit</a> / <a href="{{ route('destroy-user', ['user_id' => $user_data->id]) }}" class="btn btn-danger">Delete</a></td>
					@endif
				</tr>
			@endforeach
		@else
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
		@endif	
	</table>

	<div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
		{{ $users->links() }}
    </div>
</div>

@endsection