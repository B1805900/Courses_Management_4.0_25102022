@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý khóa học </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý khóa học</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý nội dung khóa học </li>
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
                    <h4 class="card-title">Khóa học: {{ $course->name }}</h4>
                    <p class="card-description"></p>
                    <div class="row">
                        <div class="col-lg-6">
                            <a id="" href="{{ route('addLesson',['id' => $course->id]) }}"
                                class="btn  me-3 btn-block btn-lg btn-gradient-primary ">+ Thêm chương cho khóa học</a>
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
                                <input type="text" class="form-control" id="searchUserInput" placeholder="Nhập gì đó..."
                                    aria-label="Nhập gì đó..." aria-describedby="basic-addon2">
                                <button class="btn btn-sm btn-gradient-primary" type="button"> Tìm Kiếm </button>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Tên chương</th>
                                <th>Mô tả</th>
                                <th>Ngày thêm</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                @foreach ($lessons as $lesson)
                                <tr>
                                    <td>{{$lesson->id}}</td>
                                    <td>{{$lesson->name}}</td>
                                    <td>{{$lesson->desc}}</td>
                                    <td>{{$lesson->upload_date->format('d-M-Y')}}</td>
                                    <td><button type="button" title="Quản lý nội dung" id=""
                                        data-toggle="tooltip" data-placement="top"
                                        class="btn act-user-btn tooltip-r btn-gradient-success btn-rounded btn-icon">
                                        <a href=""
                                            style="color: inherit;"><i class="mdi mdi-library-plus"></i></a>
                                    </button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{$lessons->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
