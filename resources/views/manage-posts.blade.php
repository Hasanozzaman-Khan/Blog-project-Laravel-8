@extends('frontlayout')
@section('title','Manage Posts')
@section('content')
		<div class="row">
			<div class="col-md-8 mb-5">
        <h3 class="mb-4">Manage Posts</h3>

        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Full Image</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Full Image</th>
              </tr>
            </tfoot>
            <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->category->title}}</td>
                  <td>{{$post->title}}</td>
                  <td><img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width="100" /></td>
                  <td><img src="{{ asset('imgs/full').'/'.$post->full_img }}" width="100" /></td>
                </tr>
                @endforeach
            </tbody>
          </table>

        </div>

			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				@include('sidebar')
			</div>
		</div>


    <!-- Page level plugin CSS-->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>
@endsection('content')
