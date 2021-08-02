<?php

namespace App\Http\Controllers;

use App\PostList;
use Illuminate\Http\Request;

class PostListController extends Controller
{
    public function index(PostList $post_list){
        return view('index')->with(['post_lists' => $post_list->get()]);
    }
    public function store(PostList $post_list, Request $request){
        $input = $request['post_list'];
        $post_list->fill($input)->save();
        return redirect('/');
    }
    public function delete(PostList $post_list){
        $post_list->delete();
        return redirect('/');
    }
}
?>
