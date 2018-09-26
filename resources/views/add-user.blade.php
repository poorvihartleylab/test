<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Add User')

@section('content')

<div class="container-fluid"><!-- open container -->
   <div class="panel panel-default">
      <div class="panel-heading">Register</div>
      <div class="panel-body">
         <div class=" div-form">
         
            @if (session('status'))
               <div class="alert alert-success">
                  <a href="{{ route('registeration') }}" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
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
            <form action="{{ route('save-user') }}" method="post">
            <table class="" width="650px">
               {{ csrf_field() }}
               <tr>
                  <td><label>First Name:</label></td>
                  <td>
                     <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"><br>
                  </td>
               </tr>
               <tr>
                  <td><label>Last Name:</label></td>
                  <td>
                     <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"><br>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Email:</label>
                  </td>
                  <td>
                     <input type="email" name="email" class="form-control" ><br>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Password:</label>
                  </td>
                  <td>
                     <input type="password" name="password" class="form-control"><br>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Confirm Password:</label>
                  </td>
                  <td>
                     <input type="password" name="password_confirmation" class="form-control"><br>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Mobile:</label>
                  </td>
                  <td>
                     <div class="input_fields_wrap">
                        <button class="add_field_button">(+)</button>
                        <div><input type="text" name="mobile_no[]" class="form-control"></div>
                     </div>
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
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
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
                     <textarea rows="4" cols="20" name="message" class="form-control"></textarea><br>
                  </td>
               </tr>
               <tr><td>
                  <input type="submit" name="submit" value="Add User" class="btn btn-primary">
                  </td>
               </tr>
            </table>
         </form>
      </div><!-- jumbotron close -->
   </div><!-- panel-body -->
</div><!-- panel default -->
</div><!-- close container -->
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
            $(wrapper).append('<div><input type="text" class="form-control" name="mobile_no[]"/><a href="#" class="remove_field">Remove</a></div>'); 
         }
      })

   $(wrapper).on("click",".remove_field", function(e){ 
      e.preventDefault(); 
      $(this).parent('div').remove(); 
      x--;
   })

});
</script>
@endsection