@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="panel-heading">All User List</div>
                <table border="1">
                <tr>
                    <th style="width: 5%;">Id</th>
                    <th style="width: 10%;">First Name</th>
                    <th style="width: 10%;">Last Name</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 10%">Role</th>
                    <th style="width: 10%">Mobile</th>
                    <th style="width: 20%">Message</th>
                    <th style="width: 15%">Action</th>
                </tr>
                @if($user_list)
                @foreach($user_list as $user_data)
                    <tr>
                        <td>{{ $user_data->id }}</td>
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
                        <td><a href="{{ route('edit-user', ['user_id' => $user_data->id]) }}" class="btn btn-success">Edit</a> / <a href="{{ route('destroy-user', ['user_id' => $user_data->id]) }}" class="btn btn-danger">Delete</a></td>
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

            </div>
        </div>
    </div>
</div>
@endsection
