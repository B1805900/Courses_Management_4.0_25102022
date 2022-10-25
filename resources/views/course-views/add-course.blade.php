@extends('layouts.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý khóa học </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý khóa học</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm khóa học</li>
      </ol>
    </nav>
  </div>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" method="POST" action="{{route('storeCourse')}}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Tên khóa học</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" value="{{old('name')}}" placeholder="Tên khóa học">
              @error('name')
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
            <div class="form-group">
                <label for="selectCategory">Danh mục</label>
                <select name="category" class="form-control @error('category') is-invalid @enderror" id="selectCategory">
                  <option value="" selected disabled>Chọn danh mục khóa học</option>
                  @foreach ($categories as $cat )
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            <div class="form-group">
              <label for="inputPrice">Giá (VND)</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror price" name="price" id="inputPrice" placeholder="Giá">
              @error('price')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

            <div class="form-group">
              <label for="exampleInputPassword4">Mô tả ngắn</label>
              <textarea name="desc" value="{{old('desc')}}" class="form-control @error('desc') is-invalid @enderror" id="exampleTextarea1" rows="4"></textarea>
              @error('desc')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <button type="submit" class="btn btn-gradient-primary me-2">Lưu</button>
            <a href="{{route('showAllCourse')}}" class="btn btn-light">Hủy</a>
          </form>
      </div>
    </div>
  </div>
@stop
