@extends('layout')
@section('title', 'Comments')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin/dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Comments</li>
  </ol>

  @if(Session::has('success'))
  <p class="text-danger">{{session('success')}}</p>
  @endif

  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Comments
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Comment</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Comment</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($comments as $comment)
              <tr>
                <td>{{$comment->id}}</td>


                @if($comment->user_id == 0)
                  <td>Admin</td>
                @else
                  @if(!empty($comment->user->name))
                    <td>{{$comment->user->email}}</td>
                  @else
                    <td>No user exist.</td>
                  @endif
                @endif

                <td>{{$comment->comment}}</td>
                <td>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/comment/'.$comment->id.'/delete')}}">Delete</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
