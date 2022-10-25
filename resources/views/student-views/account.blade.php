@extends('student-layouts.details')
@section('page-content')
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="{{asset('mainpage-template/img/page-bg/1.jpg')}}">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Tài khoản</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

    <section class="elements-page spad pb-0">
		<div class="container">
            <div class="element">
				<h2 class="e-title">Thông tin tài khoản</h2>
				<div class="row">
					<div class="col-lg-12 mb-4 mb-lg-0">
						<!-- Accordions -->
						<div id="accordion" class="accordion-area">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Danh sách khóa học trong wish list</button>
								</div>
								<div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body p-1 m-3">
										<table class="table  table-striped">

                                            <thead>
                                              <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên khóa học</th>
                                                <th scope="col">Thao tác</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wishListItems as $wli)

                                              <tr>
                                                <th scope="row">{{$wli->id}}</th>
                                                <td>{{$wli->ofCourse->name}}</td>
                                                <td >
                                                    <button type="button" class="btn btn-success mr-1 rounded-circle" data-toggle="tooltip" data-placement="top" title="Xem khóa học">
                                                        <a style="color:inherit" href="{{route('showSingleCourse',['idCourse' => $wli->course_id])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                      </button>
                                                    <button type="button" class="btn btn-danger mr-1 rounded-circle" data-toggle="tooltip" data-placement="top" title="Xóa">
                                                        <a style="color:inherit"  href="{{route('deleteWishItem',['id' =>$wli->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                      </button>

                                                </td>
                                              </tr>


                                              @endforeach
                                            </tbody>
                                          </table>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Danh sách khóa học đã đăng ký</button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body p-1 m-3">
										<table class="table p-1 m-3 table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                              </tr>
                                            </tbody>
                                          </table>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header " id="headingThree">
									<button class="panel-link " data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">Cập nhật tài khoản</button>
								</div>
								<div id="collapse3" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body p-1 m-3">
                                        <form>
                                            <div class="form-group">
                                              <label for="exampleFormControlInput1">Email address</label>
                                              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleFormControlSelect1">Example select</label>
                                              <select class="form-control" id="exampleFormControlSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleFormControlSelect2">Example multiple select</label>
                                              <select multiple class="form-control" id="exampleFormControlSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Example textarea</label>
                                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <button  style="    display: inline-block;
                                            min-width: 196px;
                                            text-align: center;
                                            border: none;
                                            padding: 15px 10px;
                                            font-weight: 600;
                                            font-size: 16px;
                                            position: relative;
                                            color: #fff;
                                            cursor: pointer;
                                            background: #d82a4e;" type="submit"> Cập nhật </button>
                                            <button class="ml-3" style="    background: #e4edef;
                                            color: #1f1f1f;
                                            display: inline-block;
    min-width: 196px;
    text-align: center;
    border: none;
    padding: 15px 10px;
    font-weight: 600;
    font-size: 16px;
    position: relative;
    cursor: pointer;
   ">Nhập lại</button>
                                          </form>
                                        </div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        </div>
    </section>

@stop
@section('page-js')
<script>
    $(document).ready(function () {
    $('table.table').DataTable();
    $('[data-toggle="tooltip"]').tooltip()

});
</script>

@stop
