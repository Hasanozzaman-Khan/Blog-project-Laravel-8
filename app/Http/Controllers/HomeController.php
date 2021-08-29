<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index(Request $request){
      if ($request->has('q')) {
        $q = $request->q;
        $posts = Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(12);
      }else {
        $posts = Post::orderBy('id','desc')->paginate(12);
      }

      return view('home', ['posts'=>$posts]);
    }

    // Post details
    public function detail(Request $request, $slug, $postId){
      // Updata post count
      Post::find($postId)->increment('views');
      $detail = Post::find($postId);
      return view('detail', ['detail'=>$detail]);
    }

    // All categories
    public function all_categories(){
      $categories = Category::orderBy('id','desc')->paginate(12);
      return view('categories', ['categories'=>$categories]);
    }

    // All posts according to the category
    public function category(Request $request, $cat_slug, $cat_id){
      $category = Category::find($cat_id);
      $posts = Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(12);
      return view('category', ['posts'=>$posts, 'category'=>$category]);
    }

    // Save Comments
    public function save_comment(Request $request, $slug, $id){
      $request->validate([
        'comment'=>'required'
      ]);
      $comment = new Comment;
      $comment->user_id = $request->user()->id;
      $comment->post_id = $id;
      $comment->comment = $request->comment;
      $comment->save();
      return redirect('detail/'.$slug.'/'.$id)->with('success','Comment has been submitted.');
    }

    // Show post form
    public function save_post_form(){
      $cats = Category::all();
      return view('save-post-form', ['cats'=>$cats]);
    }

    // Save post data
    public function save_post_data(Request $request){
      $request->validate([
        'title'=>'required',
        'category'=>'required',
        'detail'=>'required'
      ]);
      // Post Thumbnail
      if ($request->hasFile('post_thumb')) {
        $image1 = $request->file('post_thumb');
        $reThumbImage = 'thumb'.time().'.'.$image1->getClientOriginalExtension();
        $dest = public_path('/imgs/thumb');
        $image1->move($dest, $reThumbImage);
      }else {
        $reThumbImage = 'Not available';
      }
      // Post Full Image
      if ($request->hasFile('post_image')) {
        $image2 = $request->file('post_image');
        $reFullImage = 'full'.time().'.'.$image2->getClientOriginalExtension();
        $dest = public_path('/imgs/full');
        $image2->move($dest, $reFullImage);
      }else {
        $reFullImage = 'Not available';
      }
      $post = new Post;
      $post->user_id = $request->user()->id;
      $post->cat_id = $request->category;
      $post->title = $request->title;
      $post->thumb = $reThumbImage;
      $post->full_img = $reFullImage;
      $post->detail = $request->detail;
      $post->tags = $request->tags;
      $post->status = 1;
      $post->save();
      return redirect('save-post-form')->with('success','Post created successfully.');
    }

    // Manage posts
    public function manage_posts(Request $request){
      $posts = Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
      return view('manage-posts', ['posts'=>$posts]);
    }
}
