
@extends('layout')
@section('content')
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{url('admin/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{url('admin/post')}}">Post</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Add Post
              <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-primary">All Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if($errors)
                  @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                  @endforeach
                @endif

                @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
                @endif

                <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                    <tr>
                        <th>Category<span class="text-danger">*</span></th>
                        <td>
                          <select class="form-control" name="category">
                            @foreach($cats as $cat)
                              <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                          </select>
                        </td>
                    </tr>
                      <tr>
                          <th>Title<span class="text-danger">*</span></th>
                          <td><input type="text" name="title" class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Thumbnail</th>
                          <td><input type="file" name="post_thumb" /></td>
                      </tr>
                      <tr>
                          <th>Full image</th>
                          <td><input type="file" name="post_image" /></td>
                      </tr>
                      <tr>
                          <th>Detail<span class="text-danger">*</span></th>
                          <td>
                            <textarea class="form-control" name="detail" rows="5" cols="80"></textarea>
                          </td>
                      </tr>
                      <tr>
                          <th>Tags</th>
                          <td>
                            <textarea class="form-control" name="tags"></textarea>
                          </td>
                      </tr>

                      <tr>
                          <td colspan="2">
                              <input type="submit" class="btn btn-primary" value="Post" />
                          </td>
                      </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
