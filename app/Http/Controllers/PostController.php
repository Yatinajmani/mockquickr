<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=Category::all();
        $posts=Post::all();
        return view('search_ad')->with(['categories'=>$categories,'posts'=>$posts]);
    }

    /**
     * Display a custom listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $categories=Category::all();
        $posts=Post::all();
        if($request->category!=0&&$request->title!=null)
            $posts=Post::FilterByCategoryId($request->category)->FilterByTitle($request->title);
        elseif($request->category!=0)
            $posts=Post::FilterByCategoryId($request->category);
        elseif($request->title!=null)
            $posts=Post::FilterByTitle($request->title);
        $posts=$posts->get();
        return view('search_ad')->with(['categories'=>$categories,'posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('post_ad')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->hasFile('file')&&request()->get('category')!=0){
                $fileName=request()->file('file')->getClientOriginalName();
                 // $request->file('file')->move(base_path() . '/public/images/catalog/',$fileName);
                request()->file('file')->move(storage_path().'/uploads/img/', $fileName);
                $file_name=$fileName;
        }
        else
        {
            return Redirect::back();
        }
        $p=Post::Create([
            'user_id'=> Auth::user()->id,
            'category_id' => request()->get('category'),
            'title' => request()->get('title'),
            'description' => request()->get('description'),
            'Starting_bid' => request()->get('Starting_bid'),
            'image_path' => $file_name,
        ]);

        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        $comments=Comment::FilterByPostId($id)->get();
        return view('post',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
