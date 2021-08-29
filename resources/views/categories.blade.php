@extends('frontlayout')
@section('title','All Categories')
@section('content')
		<div class="row">
			<div class="col-md-8">
				<div class="row mb-5">
          @if(count($categories)>0)
						@foreach($categories as $category)
  						<div class="col-md-4 mb-4">
  							<div class="card">
  							  <a href="{{ url('category/'.Str::slug($category->title).'/'.$category->id) }}"><img src="{{asset('imgs/'.$category->image)}}" class="card-img-top" alt="{{$category->title}}" /></a>
  							  <div class="card-body">
  							    <h5 class="card-title"><a href="{{ url('category/'.Str::slug($category->title).'/'.$category->id) }}">{{$category->title}}</a></h5>
  							  </div>
  							</div>
  						</div>
            @endforeach
					@else
            <p class="alert alert-danger">No Category Found</p>
					@endif


				</div>
				<!-- Pagination -->
				{{$categories->links()}}
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				@include('sidebar')
			</div>
		</div>
@endsection('content')
