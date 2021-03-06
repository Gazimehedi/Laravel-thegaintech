@extends('layouts.layout')
@section('content')
    <div class="e-tabs mb-3 px-3">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" href="#">Users</a></li>
        </ul>
    </div>

    <div class="row flex-lg-nowrap">
        <div class="col mb-3">
            <div class="e-panel card">
                @include('partials.message')
                <div class="card-body">
                    <div class="card-title">
                        <h6 class="mr-2"><span>Users</span><small class="px-1">Be a wise
                                leader</small></h6>
                    </div>
                    <div class="e-table">
                        <div class="table-responsive table-lg mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-top">
                                            <div
                                                class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                                                <input type="checkbox" class="custom-control-input" id="all-items">
                                                <label class="custom-control-label" for="all-items"></label>
                                            </div>
                                        </th>
                                        <th>Photo</th>
                                        <th class="max-width">Name</th>
                                        <th class="sortable">Date</th>
                                        <th> </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="align-middle">
                                            <div
                                                class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                <input type="checkbox" class="custom-control-input" id="item-1">
                                                <label class="custom-control-label" for="item-1"></label>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($user->profile_photo_path != null)
                                                <img src="{{asset($user->profile_photo_path)}}" class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 45px; height: 45px; border-radius: 3px;" >
                                                @else
                                                <div class="bg-light d-inline-flex justify-content-center align-items-center align-top"
                                                style="width: 45px; height: 45px; border-radius: 3px;"><i
                                                    class="fa fa-fw fa-photo" style="opacity: 0.8;"></i>
                                            </div>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-nowrap align-middle">{{$user->name}}</td>
                                        <td class="text-nowrap align-middle"><span>{{\Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</span></td>
                                        <td class="text-center align-middle">
                                            {!!$user->status == 1? '<a href="'.route('user.updatestatus',[0,$user->id]).'"><i
                                            class="fa fa-fw text-secondary cursor-pointer fa-toggle-on"></i></a>' : '<a href="'.route('user.updatestatus',[1,$user->id]).'"><i
                                                class="fa fa-fw text-secondary cursor-pointer fa-toggle-off"></i></a>'!!}
                                        </td>
                                        <td class="text-center align-middle">
                                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <div class="btn-group align-top">
                                                <a href="{{route('user.show',$user->id)}}" class="btn btn-sm btn-outline-secondary badge"
                                                    type="button">View</a>
                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-outline-secondary badge" type="button">Edit</a>
                                                    <button class="btn btn-sm btn-outline-secondary badge" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                                    </div>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{$users->links()}}
                            {{-- <ul class="pagination mt-3 mb-0">
                                <li class="disabled page-item"><a href="#" class="page-link">???</a>
                                </li>
                                <li class="active page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">???</a></li>
                                <li class="page-item"><a href="#" class="page-link">??</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center px-xl-3">
                        <button class="btn btn-success btn-block" type="button" data-toggle="modal"
                            data-target="#user-form-modal">New User</button>
                    </div>
                    <hr class="my-3">
                    <div class="e-navlist e-navlist--active-bold">
                        <ul class="nav">
                            <li class="nav-item active"><a href=""
                                    class="nav-link"><span>All</span>&nbsp;<small>/&nbsp;{{$allUser}}</small></a>
                            </li>
                            <li class="nav-item"><a href=""
                                    class="nav-link"><span>Active</span>&nbsp;<small>/&nbsp;{{$activeUser}}</small></a>
                            </li>
                            {{-- <li class="nav-item"><a href=""
                                    class="nav-link"><span>Selected</span>&nbsp;<small>/&nbsp;0</small></a>
                            </li> --}}
                        </ul>
                    </div>
                    <hr class="my-3">
                    <form action="{{route('user.dashboard')}}" method="get">
                    <div>
                        <div class="form-group">
                            <label>Date from:</label>
                            <div>
                                <input id="dates-range" name="form" class="form-control flatpickr-input"
                                    placeholder="01 Dec 17" type="date">
                            </div>
                            <label>to:</label>
                            <div>
                                <input id="dates-range" name="to" class="form-control flatpickr-input"
                                    placeholder="27 Jan 18" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Search by Name:</label>
                            <div><input class="form-control w-100" type="text" placeholder="Name" name="name">
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="">
                        <label>Status:</label>
                        <div class="px-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="user_status"
                                    id="users-status-disabled" value="disabled">
                                <label class="custom-control-label" for="users-status-disabled">Disabled</label>
                            </div>
                        </div>
                        <div class="px-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="user_status"
                                    id="users-status-active" value="active">
                                <label class="custom-control-label" for="users-status-active">Active</label>
                            </div>
                        </div>
                        <div class="px-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="user_status" id="users-status-any" value="any">
                                <label class="custom-control-label" for="users-status-any">Any</label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="text-center px-xl-3">
                        <button class="btn btn-primary btn-block" type="submit">Search</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- User Form Modal -->
    @include('partials.createmodal')
@endsection
