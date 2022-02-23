@extends('layouts.layout')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="modal-title">Edit User</h5>
    </div>
    <div class="card-body">
        <div class="py-1">
            <form class="form" novalidate="" action="{{route('user.update',$user->id)}}" method="post">@csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" name="name"
                                        placeholder="John Smith" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username"
                                        placeholder="johnny.s" value="{{$user->username}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" value="{{$user->email}}" placeholder="user@example.com" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label>About</label>
                                    <textarea class="form-control" rows="5" placeholder="My Bio" name="bio">{{$user->bio}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="••••••">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="••••••">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
