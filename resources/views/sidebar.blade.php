
<!-- Search -->
<div class="card mb-4">
  <h5 class="card-header">Search</h5>
  <div class="card-body">
    <form action="{{url('/')}}">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search posts" />
        <div class="input-group-append">
          <!-- <button class="btn btn-dark" type="button" id="button-addon2">Search</button> -->
          <input type="submit" class="btn btn-dark" value="Search">
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Recent Posts -->
<div class="card mb-4">
  <h5 class="card-header">Recent Posts</h5>
  <div class="list-group list-group-flush">
    @if($recent_posts)
      @foreach($recent_posts as $post)
        <a href="{{ url('detail/'.Str::slug($post->title).'/'.$post->id) }}" class="list-group-item">{{$post->title}} <span class="badge badge-info float-right">{{$post->views}}</span></a>
      @endforeach
    @endif
  </div>
</div>
<!-- Popular Posts -->
<div class="card mb-4">
  <h5 class="card-header">Popular Posts</h5>
  <div class="list-group list-group-flush">
    @if($popular_posts)
      @foreach($popular_posts as $post)
        <a href="{{ url('detail/'.Str::slug($post->title).'/'.$post->id) }}" class="list-group-item">{{$post->title}} <span class="badge badge-info float-right">{{$post->views}}</span></a>
      @endforeach
    @endif
  </div>
</div>
