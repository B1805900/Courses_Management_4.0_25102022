@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý tài khoản </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <h4 class="card-title msg text-success">{{ Session::get('success') }}</h4>
                    @elseif (Session::has('error'))
                        <h4 class="card-title msg text-danger">{{ Session::get('error') }}</h4>
                    @endif
                    <h4 class="card-title">Thay đổi mật khẩu</h4>
                    <p class="card-description"> Nhập mật khẩu cũ và mật khẩu mới để thay đổi mật khẩu </p>
                    <form class="forms-sample" method="POST" action="{{route('storeChangePassword')}}">
                        @csrf
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                          <div class="col-sm-9">
                            <input type="password" name="current_password" class="form-control @if(Session::has('error_old_pass')) is-invalid @endif @error('current_password') is-invalid  @enderror" id="exampleInputPassword2" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                            @if (Session::has('error_old_pass'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ Session::get('error_old_pass') }}</strong>
                            </span>
                        @endif
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                          <div class="col-sm-9">
                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid  @enderror" id="exampleInputPassword2" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Nhập lại mật khẩu</label>
                          <div class="col-sm-9">
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputConfirmPassword2" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
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
