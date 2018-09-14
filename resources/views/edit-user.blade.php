<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid"><!-- open container -->
<div class="jumbotron div-form">
   @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @endif
      <h3>Edit User</h3>
<form action="{{ url('update',[$user->id]) }}" method="post">
   <table class="" width="650px">
      {{ csrf_field() }}
      <tr>
         <td><label>First Name:</label></td>
         <td>
            <input type="text" name="first_name" value="{{ $user->firstname }}" class="form-control"><br>
         </td>
      </tr>
      <tr>
         <td><label>Last Name:</label></td>
         <td>
            <input type="text" name="last_name" value="{{ $user->lastname }}" class="form-control"><br>
         </td>
      </tr>
      <tr>
         <td>
            <label>Email:</label>
         </td>
         <td>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control"><br>
         </td>
      </tr>
      <tr>
         <td>
            <label>Password:</label>
         </td>
         <td>
            <input type="password" name="password" value="{{ $user->password }}" class="form-control"><br>
         </td>
      </tr>
      <tr>
         <td>
            <label>Mobile:</label>
         </td>
         <td>
            <div class="input_fields_wrap">
               <button class="add_field_button">(+)</button>
               @foreach($mobile as $mobileinfo)
                  <div><input type="text" name="mobile_no[]" value="{{ $mobileinfo->mobile}}" class="form-control"></div>
               @endforeach
            </div>
            <input type="hidden" name="mobile_count"id="mobile_count" value="{{ count($mobile) }}" class="form-control">
         </td>
      </tr>
      <br>
     
      <tr>
         <td>
            <label>Roles:</label>
         </td>
         <td>
            <select name="role" class="form-control">
               <option>Select Role</option>
               @foreach ($roles as $role)
                  <option value="{{ $role->id }}" {{ ( $role->id == $user->role_id) ? 'selected' : '' }}>{{ $role->role_name }}</option>
               @endforeach
            </select>
            <br>
         </td>
      </tr>
      <tr>
         <td>
            <label>Message:</label>
         </td>
         <td>
            <textarea rows="4" cols="20" name="message" class="form-control">{{ $user->message }}</textarea><br>
         </td>
      </tr>
      <tr><td>
         <input type="submit" name="submit" value="Update User" class="btn btn-primary">
         </td>
      </tr>
</table>
</form>
</div><!-- jumbotron close -->
</div><!-- close container -->
<script>
   $(document).ready(function(){

   var mobile_count = $("#mobile_count").val();
   var max_fields      = 3; 
   var wrapper         = $(".input_fields_wrap"); //Fields wrapper
   var add_button      = $(".add_field_button"); //Add button ID
   var x               = 1; //initlal text box count
    	$(add_button).click(function(e){ //on add input button click
   	 	 e.preventDefault();
   		if(mobile_count < max_fields && x != 0){
   			mobile_count++; 
   			$(wrapper).append('<div><input type="text" name="mobile_no[]"/><a href="#" class="remove_field">Remove</a></div>'); 
   		}
     	})
   
   $(wrapper).on("click",".remove_field", function(e){ 
      e.preventDefault(); 
      $(this).parent('div').remove(); 
      mobile_count--;
   })
   });
</script>


@endsection
