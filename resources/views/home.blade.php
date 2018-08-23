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
                <th style="width: 20%;">First Name</th>
                <th style="width: 20%;">Last Name</th>
                <th style="width: 30%;">Email</th>
                <th style="width: 20%">Contact</th>
                <th style="width: 30%">Message</th>
                </tr>
                @if($user_list)
                @foreach($user_list as $user_data)
                    <tr>
                        <td>{{ $user_data->firstname }}</td>
                        <td>{{ $user_data->lastname }}</td>
                        <td>{{ $user_data->email }}</td>
                        <td>{{ $user_data->contact }}</td>
                        <td>{{ $user_data->message }}</td>
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
