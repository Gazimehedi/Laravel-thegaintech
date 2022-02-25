@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col mb-3">
            <div class="card">
                @include('partials.message')
                <form action="{{route('user.profile.update',$user->id)}}"novalidate="" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto" style="width: 140px;">
                                    @if ($user->profile_photo_path != null)
                                        <img src="{{asset($user->profile_photo_path)}}" class="d-flex justify-content-center align-items-center rounded" style="height: 140px;width:140px" >
                                        @else
                                        <div class="d-flex justify-content-center align-items-center rounded"
                                        style="height: 140px; background-color: rgb(233, 236, 239);">
                                        <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                                    <p class="mb-0">{{$user->username}}</p>
                                    <div class="text-muted"><small>
                                        @if(Cache::has('user-is-online-' . $user->id))
                                            <span class="text-success">Online</span>
                                        @else
                                            <span class="text-secondary">Offline</span>
                                        @endif
                                        {{$user->last_seen != null? '- Last seen '.\Carbon\Carbon::parse($user->last_seen)->diffForHumans() : ''}}</small></div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span><input type="file" name="image"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center text-sm-right">
                                    <span class="badge badge-secondary">{{$user->is_admin == 1? 'administrator' : 'user'}}</span>
                                    <div class="text-muted"><small>Joined {{\Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</small></div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="" class="active nav-link">Profile</a></li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane active">
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
                                                        <input class="form-control" type="text" name="email"
                                                            placeholder="user@example.com" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label>About</label>
                                                        <textarea class="form-control" name="bio" rows="5"
                                                            placeholder="My Bio">{{$user->bio}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="mb-2"><b>Change Password</b></div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Current Password</label>
                                                        <input class="form-control" name="current_password" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input class="form-control" name="password" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Confirm <span
                                                                class="d-none d-xl-inline">Password</span></label>
                                                        <input class="form-control" name="password_confirmation" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>

        <div class="col-12 col-md-3 mb-3">

        </div>
    </div>
@endsection
