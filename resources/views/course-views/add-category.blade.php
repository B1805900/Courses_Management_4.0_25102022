@extends('layouts.main')
@section('content')

<div class="page-header">
    <h3 class="page-title"> Quản lý khóa học </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý khóa học</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm danh mục khóa học </li>
      </ol>
    </nav>
  </div>
  <div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" method="POST" action="{{route('storeCategory')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Tên danh mục</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Tên danh mục">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Mô tả danh mục</label>
            <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="" placeholder="Mô tả danh mục">
            @error('desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Ảnh minh họa</label>
            <input type="file"  name="img" accept="image/*" class="file-upload-default @error('img') is-invalid @enderror">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
            @error('img')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Lưu</button>
          <a class="btn btn-light" href="{{route('showAllCategory')}}">Hủy</a>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
