<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form action="{{ route('save-user') }}" method="post">
	{{ csrf_field() }}
	<label>First Name:</label>
	<input type="text" name="first_name"><br>
	<label>Last Name:</label>
	<input type="text" name="last_name"><br>
	<label>Email:</label>
	<input type="email" name="email"><br>
	<label>Password:</label>
	<input type="password" name="password"><br>
	<label>Mobile:</label>
	<div class="input_fields_wrap">
		<button class="add_field_button">(+)</button>
		<div><input type="text" name="mobile_no[]"></div>
	</div>
	<br>
	<label>Roles:</label>
	<select name="role">
		<option>Select Role</option>
		@foreach ($roles as $role)
		<option value="{{ $role->id }}">{{ $role->role_name }}</option>
		@endforeach
	</select><br>
	<input type="submit" name="submit" value="Add User">
</form>


<script>
$(document).ready(function(){
	
  	
  	var max_fields      = 3; 
  	var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
 	var x               = 1; //initlal text box count
 	$(add_button).click(function(e){ //on add input button click
	 	 e.preventDefault();
		if(x < max_fields && x != 0){
			x++; 
			$(wrapper).append('<div><input type="text" name="mobile_no[]"/><a href="#" class="remove_field">Remove</a></div>'); 
		}
  	})

  	$(wrapper).on("click",".remove_field", function(e){ 
		        e.preventDefault(); 
		        $(this).parent('div').remove(); 
		        x--;
		    })
});
</script>
