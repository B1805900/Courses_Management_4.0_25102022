@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý tài khoản </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin cá nhân</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cập nhật thông tin cá nhân</h4>
                    <p class="card-description"> Nhập thông tin cá nhân bên dưới </p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('EditProfile') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="nav-prifile-image col-sm-3 col-form-label">
                                <img src="{{asset('dashboard-template/assets/images/faces/face1.jpg')}}" id="avatar-edit" style="height: 4rem !important;width:4rem !important;" alt="profile" srcset="">
                            </div>
                            {{-- <label  class="col-sm-3 col-form-label">Ảnh đại diện</label> --}}
                            <div class="col-sm-9">

                        <input type="file" name="avatar" accept="image/*" id="avatar-edit-input"  class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Họ và tên</label>
                            <div class="col-sm-9">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid  @enderror"
                                    value="{{ Auth::user()->name }}" id="exampleInputUsername2" placeholder="Họ và tên">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                    class="form-control @error('email') is-invalid  @enderror" id="exampleInputEmail2"
                                    placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Số điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid  @enderror"
                                    value="{{ Auth::user()->phone }}" id="exampleInputMobile" placeholder="Số điện thoại">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Xác nhận</button>
                        <button class="btn btn-light">Hủy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
