
@extends('layout')
@section('content')
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{url('admin/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Settings</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Manage Settings
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

                <form method="post" action="{{url('admin/setting')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                      <tr>
                          <th>Comment Auto Approve</th>
                          <td><input type="text" name="comment_auto" @if($setting) value="{{$setting->comment_auto}}" @endif class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>User Auto Approve</th>
                          <td><input type="text" name="user_auto" @if($setting) value="{{$setting->user_auto}}" @endif class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Recent Post Limit</th>
                          <td><input type="text" name="recent_limit" @if($setting) value="{{$setting->recent_limit}}" @endif class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Popular Post Limit</th>
                          <td><input type="text" name="popular_limit" @if($setting) value="{{$setting->popular_limit}}" @endif class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Recent Comment Limit</th>
                          <td><input type="text" name="recent_comment_limit" @if($setting) value="{{$setting->recent_comment_limit}}" @endif class="form-control" /></td>
                      </tr>

                      <tr>
                          <td colspan="2">
                              <input type="submit" class="btn btn-primary" value="Submit" />
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
