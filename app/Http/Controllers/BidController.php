<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bid=Bid::FilterbyPostId($request->post_id)->FilterbyUserId(Auth::User()->id)->first();
        if(!$bid||Post::FilterbyId($request->post_id)->latest()->value('user_id')==Auth::User()->id){
        if(Post::FilterbyId($request->post_id)->latest()->value('user_id')!=Auth::User()->id)
        {
            Bid::Create([
                'user_id'=>Auth::User()->id,
                'post_id'=>$request->post_id,
                'bid'=>$request->bid,
            ]);
            }
            else
            return "You Cannot Bid on your own post";            
        }
        else
            $this->update($request,$bid->id);
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
        //
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
        $b=Bid::find($id);
        $b->bid=$request->bid;
        $b->save();

        return Redirect::back();
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

    public function toggkeLike($post_id)
    {
        if(Bid::FilterbyPostId($post_id)->FilterbyUserId(Auth::User()->id)->first())
        {
            $b=Bid::FilterbyPostId($post_id)->FilterbyUserId(Auth::User()->id)->first();
            if($b->is_liked)
                $b->is_liked=0;
            else
                $b->is_liked=1;
            $b->save();
        }
        else
        {
            Bid::Create([
                 'user_id'=>Auth::User()->id,
                'post_id'=>$post_id,
                'is_liked'=>1,
            ]);
        }
        return Redirect::back();
    }
}
