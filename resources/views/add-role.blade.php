<form action="{{ route('save-role') }}" method="POST">
	{{ csrf_field() }}
	<label>Role Name:</label>
	<input type="text" name="role_name"><br>
	<input type="submit" name="submit" value="Add Role">
</form>




