@extends('layouts.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý khóa học </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Quản lý khóa học</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm chương cho khóa học</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-magrin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Khóa học: {{ $course->name }}</h4>
                <p class="card-description"></p>
                <form class="forms-sample" method="POST" action="{{route('storeLesson',['idCourse' => $course->id])}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Tên chương</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName1" placeholder="Tên chương">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Mô tả ngắn</label>
                      <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" rows="2" id="" placeholder="Mô tả ngắn chương"></textarea>
                      @error('desc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Nội dung chương</label>
                      <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="ckeditor" rows="4"></textarea>
                      @error('content')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                    </div>
                    <button type="submit"  class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
            </div>
        </div>
    </div>
</div>
@stop
