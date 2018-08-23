<h2>All User List</h2>
<table border="1">
	<tr>
		<th style="width: 5%;">Id</th>
		<th style="width: 20%;">First Name</th>
		<th style="width: 20%;">Last Name</th>
		<th style="width: 20%;">Email</th>
		<th style="width: 20%">Role</th>
		<th style="width: 20%">Mobile</th>
	</tr>

	@if($users)
		@foreach($users as $user_data)
			<tr>
				<td>{{ $user_data->id }}</td>
				<td>{{ $user_data->first_name }}</td>
				<td>{{ $user_data->last_name }}</td>
				<td>{{ $user_data->email }}</td>
				<td>{{ $user_data->role->role_name }}</td>
				<!-- role is  function define into the model -->
				<td>
					@foreach($user_data->mobile as $mobileinfo)
					{{ $mobileinfo->mobile }}
					@endforeach
					<!-- calling mobile function define in the model-->
				<td>
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
