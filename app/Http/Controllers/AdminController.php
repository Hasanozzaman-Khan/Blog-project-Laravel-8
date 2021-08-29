<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    // Login view
    public function login(){
      return view('backend.login');
    }
    // Login Submit view
    public function submit_login(Request $request){
      $request->validate([
        'email'=>'required',
        'password'=>'required'
      ]);
      $userCheck = Admin::where(['email'=>$request->email, 'password'=>$request->password])->count();
      if ($userCheck > 0) {
        $adminData = Admin::where(['email'=>$request->email, 'password'=>$request->password])->first();
        session(['adminData'=>$adminData]);
        return redirect('admin/dashboard');
      }else {
        return redirect('admin/login')->with('error','Invalid email/password.');
      }
    }
    // Dashboard view
    public function dashboard(){
      $posts = Post::orderBy('id','desc')->get();
      return view('backend.dashboard', ['posts'=>$posts]);
    }

    // Dashboard User
    public function users(){
      $users = User::orderBy('id','desc')->get();
      return view('backend.user.index', ['users'=>$users]);
    }
    // Dashboard User Delete
    public function user_delete($id){
      $user = User::find($id);
      $user->delete();
      return redirect('admin/comment')->with('success','User deleted successfully.');
    }

    // Dashboard Comment
    public function comments(){
      $comments = Comment::orderBy('id','desc')->get();
      return view('backend.comment.index', ['comments'=>$comments]);
    }
    // Dashboard Comment Delete
    public function comment_delete($id){
      $comments = Comment::find($id);
      $comments->delete();
      return redirect('admin/comment')->with('success','Comment deleted successfully.');
    }
    // Logout view
    public function logout(){
      session()->forget(['adminData']);
      return redirect('admin/login');
    }
}
