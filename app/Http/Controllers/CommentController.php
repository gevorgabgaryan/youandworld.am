<?php

namespace Numerus\Http\Controllers;

use Illuminate\Http\Request;
 use Validator;
 use Auth;
use Numerus\Comment;
use Numerus\Articles;


class CommentController extends SiteController
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
        //
         $data=$request->except('_token', 'comment_parent_ID','comment_post_ID');
 
         $data['article_id']=$request->input('comment_post_ID');
         $data['parent_id']=$request->input('comment_parent_ID');
       
         $validator =Validator::make($data, [

            "article_id"=>'numeric|required',
            "parent_id"=>'numeric|required',
            "text"=>"string|required",


         ]);

         $validator->sometimes(['name', 'email'],'required|max:255', function($input){

                return !Auth::check();

         } );

         if($validator->fails()){
            return \Response::json(['error'=>$validator->errors()->all()]);



         }
         $user=Auth::user();

         $comment=new Comment($data);
         if($user){
          
            $comment->user_id->id;
         }

       $post= Articles::find($request->input('comment_post_ID'));

       $post->comment()->save($comment);

       $comment->load('user');
       $data['id']=$comment->id;

       $data['email']=(!empty($data['email']))?$data['email'] : $comment->user->email;
        $data['name']=(!empty($data['email']))?$data['name'] : $comment->user->name;

      

        $data['hash']=md5($data['email']);

        $view_comment=view('content_one_comment')->with('data', $data)->render();



        return \Response::json(['success'=>TRUE, 'comment'=>$view_comment, 'data'=>$data]);
        exit();

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
