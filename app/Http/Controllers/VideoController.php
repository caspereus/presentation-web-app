<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Like;
class VideoController extends Controller
{
    public function save(Request $req)
    {
    	$this->validate($req,[
    		'title'=>'required',
    		'description'=>'required',
    		'url_link'=>'required',
    	]);

    	Video::create($req->all());
        $this->send_notification($req->title);
    	return back()->withMessage('successfully added new video');
    }
    
    function send_notification($message)
    {
        define( 'API_ACCESS_KEY', 'AAAAx9jesHk:APA91bFf-94iH1QXkbTWR56pS8erGL32t0UzizerVgZ61yMGH5Is_rot7LFULp8rXrkqnRuNhyNSzBNBWPQFdXhGfQpQTLKMMPLTsTHbEzq694nVEI65Hr38zd55un9ckvOTvuU8ENRXoAgpZ2H1acnSoJ4oYyucZg');
             $msg = array
                  (
        		'message' 	=> $message,
        		'title'	=> 'Video Baru!',
                  );
        	$fields = array
        			(
        				"to"=> "/topics/all",
        				'data'	=> $msg
        			);
        	
        	
        	$headers = array
        			(
        				'Authorization: key=' . API_ACCESS_KEY,
        				'Content-Type: application/json'
        			);
        		
        		$ch = curl_init();
        		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        		curl_setopt( $ch,CURLOPT_POST, true );
        		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        		$result = curl_exec($ch );
        		curl_close( $ch );
    }

    public function show()
    {
        $big = [];
        $small = [];
        $my_data = Video::latest()->get();
        if (count($my_data) > 0) {   
            foreach($my_data as $field)
            {
                $like = Like::where(['post_id'=>$field->id,'type'=>'video'])->count();
                $small = [
                    'id'=>$field->id,
                    'title'=>$field->title,
                    'description'=>$field->description,
                    'created_at'=>$field->created_at->diffForHumans(),
                    'likes'=>$like,
                    'views'=>$field->views
                ];

                $big[] = $small;
            }

            $data = $big;

        }else{
            $data = Video::latest()->get();
        }
        return view('video.index',compact('data'));
    }

    public function edit($id)
    {
    	$data = Video::where('id',$id)->first();
    	return view('video.edit',compact('data'));
    }

    public function update(Request $req,$id)
    {
    	$this->validate($req,[
    		'title'=>'required',
    		'description'=>'required',
    		'url_link'=>'required',
    	]);

    	Video::where('id',$id)->update([
    		'title'=>$req->title,
    		'description'=>$req->description,
    		'url_link'=>$req->url_link,
    	]);

    	return redirect('video')->withMessage('Successfully updated a video');
    }

    public function delete($id)
    {
    	Video::destroy($id);

    	return back()->withMessage('Sucessfully deleted an items');
    }

    public function apidata()
    {
        return ['list'=>Video::latest()->get()];
    }


    public function user_video()
    {
        $data = Video::latest()->get();
        return view('user.video',compact('data'));
    }

    public function view_count($id)
    {
        $obj   = Video::where('id',$id);
        $data  = $obj->first();
        $count = $data->views + 1;
        $obj->update(['views'=>$count]);

        return ['message'=>'ok']; 
    }


}
