<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\ImageGallery;
use App\Like;
class GalleryController extends Controller
{
    public function store(Request $req)
    {
        $this->validate($req,[
            'gallery_title'=>'required',
            'images.*'=>'image',
        ]);
        
        $id = Gallery::create(['gallery_title'=>$req->gallery_title])->id;
        
        if($id > 0)
        {
            if($req->hasFile('images'))
            {
                foreach ($req->file('images') as $image) {
                    $name = $id.uniqid().".".$image->getClientOriginalExtension();
                    $image->move(public_path('images/gallery/'),$name);
                    ImageGallery::create(['image_name'=>$name,'gallery_id'=>$id]);
                }
                
                $this->send_notification($req->gallery_title);

                return redirect('gallery')->withMessage('Success added new Gallery');
            }
        }   
    }
    
    function send_notification($message)
    {
        define( 'API_ACCESS_KEY', 'AAAAx9jesHk:APA91bFf-94iH1QXkbTWR56pS8erGL32t0UzizerVgZ61yMGH5Is_rot7LFULp8rXrkqnRuNhyNSzBNBWPQFdXhGfQpQTLKMMPLTsTHbEzq694nVEI65Hr38zd55un9ckvOTvuU8ENRXoAgpZ2H1acnSoJ4oYyucZg');
             $msg = array
                  (
        		'message' 	=> $message,
        		'title'	=> 'Gallery Baru!',
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

    public function index()
    {
        $big = [];
        $small = [];
        $my_data = Gallery::latest()->get();
        if (count($my_data) > 0) {   
            foreach($my_data as $field)
            {
                $like = Like::where(['post_id'=>$field->id,'type'=>'gallery'])->count();
                $small = [
                    'id'=>$field->id,
                    'title'=>$field->gallery_title,
                    'created_at'=>$field->created_at->diffForHumans(),
                    'likes'=>$like,
                    'views'=>$field->views,
                ];

                $big[] = $small;
            }

            $data = $big;

        }else{
            $data = Gallery::latest()->get();
        }
        return view('gallery.index',compact('data'));
    }

    public function detail($id)
    {
        $gallery = Gallery::where('id',$id)->first();
        $data    = ImageGallery::where('gallery_id',$id)->latest()->get();
        return view('gallery.detail',compact('data','gallery'));
    }

    public function apidata()
    {
        $arrayBig = [];
        $data = Gallery::latest()->get();
        foreach($data as $field)
        {
            $count_like = Like::where('post_id',$field->id)->where('type','gallery')->count();
            $image = ImageGallery::where('gallery_id',$field->id)->latest()->first();
            $arraySmall = [
                'id'=>$field->id,
                'gallery_title'=>$field->gallery_title,
                'created_at'=>$field->created_at->toDateString(),
                'updated_at'=>$field->updated_at->toDateString(),
                'image_thumbnail'=>$image->image_name,
                'views'=>$field->views,
                'likes'=>$count_like,
            ];

            $arrayBig[] = $arraySmall;
        }

        return ['list'=>$arrayBig];
    }

    public function apidetail($id)
    {
        return ['list'=>ImageGallery::where('gallery_id',$id)->get()];
    }

    public function delete($id)
    {
        Gallery::destroy($id);

        return back()->withMessage('Successfully delete an items');
    }

    public function imagedelete($id)
    {
        ImageGallery::destroy($id);
        return back()->withMessage('Successfully deleted an Image');
    }

    public function addmore($id)
    {
        $data = Gallery::where('id',$id)->first();

        return view('gallery.addmore',compact('data'));
    }

    public function moreupdates(Request $req,$id)
    {
        $this->validate($req,[
            'images.*'=>'image',
        ]);

        if($id > 0)
        {
            if($req->hasFile('images'))
            {
                foreach ($req->file('images') as $image) {
                    $name = $id.uniqid().".".$image->getClientOriginalExtension();
                    $image->move(public_path('images/gallery/'),$name);
                    ImageGallery::create(['image_name'=>$name,'gallery_id'=>$id]);
                }

                return redirect('/gallery')->withMessage('Success added more image to Gallery');
            }
        }
    }

    public function view_count($id)
    {
        $obj   = Gallery::where('id',$id);
        $data  = $obj->first();
        $count = $data->views + 1;
        $obj->update(['views'=>$count]);

        return ['message'=>'ok']; 
    }

    public function user_gallery()
    {
        $arrayBig = [];
        $data = Gallery::latest()->get();
        foreach($data as $field)
        {
            $count_like = Like::where('post_id',$field->id)->where('type','gallery')->count();
            $image = ImageGallery::where('gallery_id',$field->id)->latest()->first();
            $arraySmall = [
                'id'=>$field->id,
                'gallery_title'=>$field->gallery_title,
                'created_at'=>$field->created_at->toDateString(),
                'updated_at'=>$field->updated_at->toDateString(),
                'image_thumbnail'=>$image->image_name,
                'likes'=>$count_like,
            ];

            $arrayBig[] = $arraySmall;
        }

        $data = $arrayBig;

        return view('user.gallery',compact('data'));
    }

    public function user_gallery_detail($id)
    {
        $data = ImageGallery::where('gallery_id',$id)->get();

        return view('user.gallery_detail',compact('data'));
    }








}
