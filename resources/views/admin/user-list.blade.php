@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý người dùng </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <h4 class="card-title msg text-success">{{ Session::get('success') }}</h4>
                    @elseif (Session::has('fail'))
                        <h4 class="card-title msg text-danger">{{ Session::get('fail') }}</h4>
                    @endif
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <a id="" href="{{ route('addCourse') }}"
                                class="btn  me-3 btn-block btn-lg btn-gradient-primary ">+ Thêm khóa học</a>
                            <div class="btn-group">
                                <button id="sortUserByRole"
                                    class="btn dropdown-toggle   me-3 btn-block btn-lg btn-gradient-primary "
                                    data-bs-toggle="dropdown"> Vai trò </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item">Tất cả</a>
                                    <a class="dropdown-item">Quản lý</a>
                                    <a class="dropdown-item">Thu ngân</a>
                                    <a class="dropdown-item">Bồi bàn</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="input-group">
                                <input type="text" class="form-control search-input" id="searchUserInput" placeholder="Nhập gì đó..."
                                    aria-label="Nhập gì đó..." aria-describedby="basic-addon2">
                                <button class="btn btn-sm btn-gradient-primary" type="button"> Tìm Kiếm </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">

                        <table class="table  table-striped ">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Tên </th>
                                    <th> Vai trò </th>
                                    <th> Email </th>
                                    <th> Trạng thái </th>
                                    <th> Ngày tham gia </th>
                                    <th> Thao tác </th>
                                </tr>
                            </thead>
                            <tbody class="search-table">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td> {{ $user->name }} </td>
                                        <td>{{ $user->hasRole ? $user->hasRole->role : '' }}</td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->hasStatus ? $user->hasStatus->name : '' }} </td>
                                        <td> {{ $user->created_at->format('d-M-Y') }} </td>
                                        <td>
                                            @if ($user->hasStatus->name == 'Online' || $user->hasRole->role != 'admin')
                                            <button type="button" title="Khóa người dùng" id=""

                                                data-toggle="tooltip" data-placement="top"
                                                class="btn tooltip-r btn-gradient-danger btn-rounded btn-icon">
                                                <a href="{{route('lockUser',['id'=> $user->id])}}"
                                                    style="color: inherit;"><i class="mdi mdi-lock-outline"></i></a>
                                            </button>
                                            @elseif($user->hasStatus->name == 'Khóa' || $user->hasRole->role != 'admin')

                                            <button type="button" title="Mở khóa người dùng" id=""

                                                data-toggle="tooltip" data-placement="top"
                                                class="btn  tooltip-r btn-gradient-success btn-rounded btn-icon">
                                                <a href="{{route('unlockUser',['id'=> $user->id])}}"
                                                    style="color: inherit;"><i class="mdi mdi-lock-open-outline"></i></a>
                                            </button>
                                            @endif
                                            <button type="button" title="Reset mật khẩu người dùng" id=""

                                                data-toggle="tooltip" data-placement="top"
                                                class="btn  tooltip-r btn-gradient-success btn-rounded btn-icon">
                                                <a href="{{route('resetPassword',['id'=> $user->id])}}"
                                                    style="color: inherit;"><i class="mdi mdi-redo"></i></a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-js')
