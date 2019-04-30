<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;
use App\EventFile;
use App\Like;
class EventController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth');
	}

	public function index()
	{
		$big = [];
        $small = [];
        $my_data = Event::latest()->get();
        if (count($my_data) > 0) {   
            foreach($my_data as $field)
            {
                $like = Like::where(['post_id'=>$field->id,'type'=>'article'])->count();
                $small = [
                    'id'=>$field->id,
                    'title'=>$field->title,
                    'description'=>$field->description,
                    'created_at'=>$field->created_at->diffForHumans(),
                    'likes'=>$like,
                    'views'=>$field->views,
                ];

                $big[] = $small;
            }

            $data = $big;
            
            // return $data;

        }else{
            $data = Event::latest()->get();
        }
		return view('event.data',compact('data'));
	}

    public function add()
    {
    	return view('event.add');
    }

    public function store(Request $req)
    {
    	$this->validate($req,[
    		'title'=>'required',
    		'description'=>'required',
    		'cover_image'=>'required',
    		'ppt_file'=>'required',
    	]);

    	if ($req->hasFile('ppt_file') && $req->hasFile('cover_image')) {
    		$ppt_file = $req->file('ppt_file');
    		$cover_image = $req->file('cover_image');
    		$newName = uniqid().".".$cover_image->getClientOriginalExtension();
    		$cover_image->move(public_path('images'),$newName);
    		$ppt_file->move(public_path('files'),$ppt_file->getClientOriginalName());

    		$id = Event::create([
    			'title'=>$req->title,
    			'description'=>$req->description,
    			'cover_image'=>$newName,
    		])->id;

	    	EventFile::create([
	    		'event_id'=>$id,
	    		'file_name'=>$ppt_file->getClientOriginalName(),
	    		'file_password'=>uniqid(),
	    	]);
	    	
	    	$this->send_notification($req->title);

	    	return redirect('event')->withMessage('Event Successfully added');
	    	
    	}
    }

    public function delete($id)
    {
    	Event::destroy($id);
    	return back()->withMessage('Data Successfully deleted');
    }

    public function edit($id)
    {
    	$file = EventFile::where('event_id',$id)->first();
    	$data = Event::where('id',$id)->first();
    	return view('event.edit',compact('data','file'));
    }

    public function update($id,Request $req)
    {
    	// $this->validate($req,[
    	// 	'title'=>'required',
    	// 	'description'=>'required',
    	// 	'cover_image'=>'required',
    	// 	'ppt_file'=>'required',
    	// ]);

    	if ($req->hasFile('ppt_file') && $req->hasFile('cover_image')) {
    		$ppt_file = $req->file('ppt_file');
    		$cover_image = $req->file('cover_image');
    		$newName = uniqid().".".$cover_image->getClientOriginalExtension();
    		$cover_image->move(public_path('images'),$newName);
    		$ppt_file_name = "files".uniqid().".".$ppt_file->getClientOriginalExtension();
    		$ppt_file->move(public_path('files'),$ppt_file_name);
    		Event::where('id',$id)->update([
    			'title'=>$req->title,
    			'description'=>$req->description,
    			'cover_image'=>$newName,
    		]);

	    	EventFile::where('event_id',$id)->update([
	    		'file_name'=>$ppt_file_name,
	    	]);

	    	
    	}elseif ($req->hasFile('ppt_file') && !$req->hasFile('cover_image')) {
    		$ppt_file = $req->file('ppt_file');
    		$ppt_file_name = "files".uniqid().".".$ppt_file->getClientOriginalExtension();
    		$ppt_file->move(public_path('files'),$ppt_file_name);
    		Event::where('id',$id)->update([
    			'title'=>$req->title,
    			'description'=>$req->description,
    		]);

	    	$data = EventFile::where('event_id',$id)->update([
	    		'file_name'=>$ppt_file_name,
	    	]);

    	}elseif (!$req->hasFile('ppt_file') && $req->hasFile('cover_image')) {
    		$cover_image = $req->file('cover_image');
    		$newName = uniqid().".".$cover_image->getClientOriginalExtension();
    		$cover_image->move(public_path('images'),$newName);

    		Event::where('id',$id)->update([
    			'title'=>$req->title,
    			'description'=>$req->description,
    			'cover_image'=>$newName,
    		]);
    	}elseif (!$req->hasFile('ppt_file') && !$req->hasFile('cover_image')) {
    		Event::where('id',$id)->update([
    			'title'=>$req->title,
    			'description'=>$req->description,
    		]);
    	}


	    return redirect('event')->withMessage('Event Successfully Updated');
    }

    public function data()
    {
        return ['list'=>Event::latest()->get()];
    }

    public function user_event()
    {
        $data = Event::latest()->get();
        return view('user.event',compact('data'));
    }

    public function user_event_detail($id)
    {
        $data = Event::where('id',$id)->first();
        return view('user.event_detail',compact('data'));
    }

    public function view_count($id)
    {
        $obj   = Event::where('id',$id);
        $data  = $obj->first();
        $count = $data->views + 1;
        $obj->update(['views'=>$count]);

        return ['message'=>'ok']; 
    }
    


    function send_notification($message)
    {
        define( 'API_ACCESS_KEY', 'AAAAx9jesHk:APA91bFf-94iH1QXkbTWR56pS8erGL32t0UzizerVgZ61yMGH5Is_rot7LFULp8rXrkqnRuNhyNSzBNBWPQFdXhGfQpQTLKMMPLTsTHbEzq694nVEI65Hr38zd55un9ckvOTvuU8ENRXoAgpZ2H1acnSoJ4oYyucZg');
             $msg = array
                  (
        		'message' 	=> $message,
        		'title'	=> 'Event Baru!',
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

}
