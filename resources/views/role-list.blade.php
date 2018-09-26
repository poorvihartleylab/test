<!-- Stored in resources/views/child.blade.php -->


@extends('layouts.app')

@section('title', 'Role List')

@section('content')
<div class=" div-table">
	  @if (session('status'))
         <div class="alert alert-success">
            <a href="{{ route('role-list') }}" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
         </div>
      @endif

	<h3>Role List</h3><br>
	<table border="0px" class="table" width="700px">
		<tr>
			<th style="width: 20%;">S No.</th>
			<th style="width: 20%;">Role</th>
			<th style="width: 30%;">Action</th>
		</tr>
		@if($roles)
			@foreach($roles as $key=>$role)
				<tr>
					<td>{{ ++$key }}</td>
					<td>{{ $role->role_name }}</td>
					<td><a href="{{ route('add-role') }}" class="btn btn-primary">Add</a>&nbsp;<a href="{{ route('edit-role', ['role_id' => $role->id]) }}" class="btn btn-success">Edit</a> <a href="{{ route('destroy-role', ['role_id' => $role->id]) }}" class="deleteGroup btn btn-danger">Delete</a></td> 
				</tr>
			@endforeach
		@else
			<tr>
				<td>-</td>
				<td>-</td>
			</tr>
		@endif	
	</table>

	<div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
		{{ $roles->links() }}
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function($){
     $('.deleteGroup').on('click',function(e){
        if(!confirm('Do you want to delete user role?')){
              e.preventDefault();
        }
      });
});
</script>

@endsection