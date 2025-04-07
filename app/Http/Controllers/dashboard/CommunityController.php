<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\Replay;
use App\Models\Post;
use App\Models\Accident;
use Illuminate\Validation\Rule;
use Image;
use Str;
use File;

class CommunityController extends ApiController
{
    public function index(){
        Post::query()->update(['seen' => 1]);
        $posts=Post::orderBy('id','desc')->get()->map(function($post){
            $post->image=getFirstMediaUrl($post,$post->postImageCollection);
            $post->comments_count=$post->comments->count();
            return $post;
        });
        return view('website.community.index2',compact('posts'));

    }

    public function create_post(Request $request){
        $validator = Validator::make($request->all(), [
            'post' => 'required'
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }

        $post=Post::create(['user_id'=>auth()->user()->id,'description'=>$request->post,'seen'=>1]);
        if($request->file('image')){
            uploadMedia($request->file('image'),$post->postImageCollection,$post);
        }
        $post->image=getFirstMediaUrl($post,$post->postImageCollection);
        $post->user;
        return $this->sendResponse($post,'Post created successfuly');
    }
    public function delete_post(Request $request){
        Post::where('id',$request->id)->delete();
        return $this->sendResponse(null,'Post deleted successfuly');
    }
    public function update_post(Request $request){
        $validator = Validator::make($request->all(), [
            'post' => 'required'
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }
        //dd($request->all());
        $post=Post::find($request->id);
        $post->description=$request->post;
        $post->save();
        if($request->key=='false'){
            deleteMedia($post,$post->postImageCollection);
        }
        if($request->file('image')){
            if(getMediaUrl($post,$post->postImageCollection)==null){
                uploadMedia($request->file('image'), $post->postImageCollection, $post);
            }else{
                deleteMedia($post,$post->postImageCollection);
                uploadMedia($request->file('image'), $post->postImageCollection, $post);
            }
            
        }
        $post->image=getFirstMediaUrl($post,$post->postImageCollection);
        return $this->sendResponse($post,'Post updated successfuly');

    }
    public function unseen_posts(){
        
        $posts=Post::where('seen',0)->orderBy('id','desc')->get()->map(function($post){
            $post->image=getFirstMediaUrl($post,$post->postImageCollection);
            $post->comments_count=$post->comments->count();
            $post->user;
            return $post;
        });
        Post::where('seen',0)->update(['seen' => 1]);
        return $this->sendResponse($posts);

    }
    public function post_comments($id){
        $comments=Comment::where('post_id',$id)->with(['user','replayes'=>function($q){
           $q->with('user');
        }])->get()->map(function($comment){
            
            $comment->replies_count=$comment->replayes->count();
            $comment->auth_user_id=auth()->user()->id;
            return $comment;
        });
        Comment::where('post_id',$id)->update(['seen' => 1]);

        return $this->sendResponse($comments);
    }

    public function create_comment(Request $request){
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'post_id' => [
                'required',
                Rule::exists('posts', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }

        $comment=Comment::create(['user_id'=>auth()->user()->id,'post_id'=>$request->post_id,'description'=>$request->comment,'seen'=>1]);
        if($request->file('image')){
            uploadMedia($request->file('image'),$comment->commentImageCollection,$comment);
        }
        $comment->user;
        return $this->sendResponse($comment,'Comment created successfuly');
    }
    public function delete_comment(Request $request){
        Comment::where('id',$request->id)->delete();
        return $this->sendResponse(null,'Comment deleted successfuly');
    }

    public function update_comment (Request $request){
        $validator = Validator::make($request->all(), [
            'comment' => 'required'
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }
        //dd($request->all());
        $comment=Comment::find($request->id);
        $comment->description=$request->comment;
        $comment->save();
        
        
        return $this->sendResponse($comment,'Comment updated successfuly');
    }

    public function delete_replay(Request $request){
        Replay::where('id',$request->id)->delete();
        return $this->sendResponse(null,'Replay deleted successfuly');
    }

    public function create_replay(Request $request){
        $validator = Validator::make($request->all(), [
            'replay' => 'required',
            'comment_id' => [
                'required',
                Rule::exists('comments', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }

        $replay=Replay::create(['user_id'=>auth()->user()->id,'comment_id'=>$request->comment_id,'description'=>$request->replay,'seen'=>1]);
        if($request->file('image')){
            uploadMedia($request->file('image'),$replay->replayImageCollection,$replay);
        }
        $replay->user;
        return $this->sendResponse($replay,'Replay created successfuly');
    }
    public function update_replay(Request $request){
        $validator = Validator::make($request->all(), [
            'replay' => 'required'
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }
        //dd($request->all());
        $replay=Replay::find($request->id);
        $replay->description=$request->replay;
        $replay->save();
        
        
        return $this->sendResponse($replay,'Replay updated successfuly');
    }

}