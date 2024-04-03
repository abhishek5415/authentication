<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PostController extends Controller 
{
    public function View(Request $request, $current_page){ 
        $total_records = 0;

        if(Auth::check()){
            $posts = Auth::user()->userPost()->orderBy('id')->get()->toArray();
            return view('/home',compact('posts','total_records','current_page'));
        }
    }

    public function addView(Request $request){
        $current_page = $request->get('page', 1);      // Fetch current page from the request or set a default value
        return view('add',compact('current_page'));
    }

    public function add(Request $request){
        $input = $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        $current_page = $request->get('page', 1);   // Fetch current page from the request or set a default value
        $input['user_id'] = auth()->id();
        Post::create($input);
        return redirect('home/'. $current_page.'/add')->with('status','Item added successfully'); 
    }

    public function editView(Request $request, $id) {
        $post = Post::findOrFail($id);
        $current_page = $request->get('page', 1);     // Fetch current page from the request or set a default value
        return view('edit', compact('post', 'current_page'));
    }

    public function edit(Request $request, int $id){
        $request -> validate([
            'title' => 'required | string',
            'body' => 'required | string',
        ]);

        Post::findOrFail($id)->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('status','Post updated successfully');
    }

    public function destroy(int $id){
        $post = Post::findOrFail($id); 
        $post->delete();
        return back();  //It is used to return to its original page after performing perticular task
    }

}
