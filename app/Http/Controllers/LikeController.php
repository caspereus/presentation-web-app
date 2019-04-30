<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Visitors;
class LikeController extends Controller
{
    public function do_like($post_id,$user_id,$type)
    {
    	Like::create(['post_id'=>$post_id,'user_id'=>$user_id,'type'=>$type]);

    	return response()->json(['message'=>'like']);
    }

    public function check($post_id,$user_id,$type)
    {
    	$check = Like::where(['post_id'=>$post_id,'user_id'=>$user_id,'type'=>$type])->count();

    	if ($check > 0) {
    		$status = "unlike";
    	}else{
    		$status = "like";
    	}
    	return ['message'=>$status];
    }

    public function unlike($post_id,$user_id,$type)
    {
    	$delete = Like::where(['post_id'=>$post_id,'user_id'=>$user_id,'type'=>$type])->delete();
    	return ['message'=>'success'];
    }

    public function see_data($post_id,$type)
    {
        $big = [];
        $small = [];
        $like_data = Like::where(['post_id'=>$post_id,'type'=>$type])->get();
        if (count($like_data) > 0) {   
            foreach($like_data as $field)
            {
                $visitor = Visitors::where('id',$field->user_id)->first();
                $small = [
                    'name_user'=>$visitor->name,
                    'created_at'=>$field->created_at->diffForHumans(),
                ];

                $big = $small;
            }

            $data[] = $big;

            // return $data;

            return view('like.like',compact('data'));
        }else{
            $data = Like::where(['post_id'=>$post_id,'type'=>$type])->get();
            return view('like.like',compact('data'));
        }
    }
}
