@extends('layouts.layout')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="modal-title">User Info</h5>
    </div>
    <div class="card-body">
        <div class="py-1">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td> : {{$user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td> : {{$user->email}}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td> : {{$user->username}}</td>
                </tr>
                <tr>
                    <th>Bio</th>
                    <td> : {{$user->bio}}</td>
                </tr>
                <tr>
                    <th>Joined on</th>
                    <td> : {{\Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</td>
                </tr>
            </table>

        </div>
    </div>
</div>
@endsection
