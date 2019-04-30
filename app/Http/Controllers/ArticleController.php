<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Like;
class ArticleController extends Controller
{
	public function index()
	{
		$big = [];
        $small = [];
        $my_data = Article::latest()->get();
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

        }else{
            $data = Article::latest()->get();
        }
		return view('article.index',compact('data'));
	}

    public function add()
    {
    	$category = Category::latest()->get();
    	return view('article.add',compact('category'));
    }

    public function store(Request $req)
    {
    	// $this->validate($req,[
    	// 	'title'=>'required',
    	// 	'description'=>'required',
    	// 	'full_content'=>'required',
    	// 	'cover_image'=>'required',
    	// 	'category_id'=>'required',
    	// ]);

    	if ($req->hasFile('cover_image')) {
    		$images = $req->file('cover_image');
    		$images_name = uniqid().".".$images->getClientOriginalExtension();
    		$images->move(public_path('images'),$images_name);

    		Article::create([
    			'title'=>$req->title,
    			'description'=>$req->description,
    			'full_content'=>$req->full_content,
    			'cover_image'=>$images_name,
    			'category_id'=>$req->category_id,
    		]);
            
            $this->send_notification($req->title);
            
    		return back()->withMessage('Successfully add new Article'); 
    	}
    }

    public function edit($id)
    {
    	$category = Category::latest()->get();
    	$data     = Article::where('id',$id)->first();

    	return view('article.edit',compact('category','data'));
    }

    public function update($id,Request $req)
    {
    	$this->validate($req,[
    		'title'=>'required',
    		'description'=>'required',
    		'full_content'=>'required',
    		'category_id'=>'required',
    	]);

    	if ($req->hasFile('cover_image')) {
    		$images = $req->file('cover_image');
    		$images_name = uniqid().".".$images->getClientOriginalExtension();
    		$images->move(public_path('images'),$images_name);

    		Article::where('id',$id)->update([
    			'title'=>$req->title,
    			'description'=>$req->description,
    			'full_content'=>$req->full_content,
    			'cover_image'=>$images_name,
    			'category_id'=>$req->category_id,
    		]);

    	}else{
    		Article::where('id',$id)->update([
    			'title'=>$req->title,
    			'description'=>$req->description,
    			'full_content'=>$req->full_content,
    			'category_id'=>$req->category_id,
    		]);
    	}

    	return redirect('article')->withMessage('Successfully update  Article'); 
    }

    public function delete($id)
    {
    	Article::destroy($id);

    	return redirect('article')->withMessage('Success deleted some data');
    }

    public function data()
    {
    	$data = [];
    	$new_data = [];
    	$article = Article::latest()->get();
    	foreach ($article as $field) {
    		$category = Category::where('id',$field->category_id)->first();
    		$new_data = [
    			'id'=>$field->id,
    			'title'=>$field->title,
    			'full_content'=>$field->full_content,
    			'description'=>$field->description,
    			'category'=>$category->category,
    			'cover_image'=>$field->cover_image,
    			'created_at'=>$field->created_at->diffForHumans(),
                'views'=>$field->views,
    		];

    		$data[] = $new_data;
    	}

    	return ['list'=>$data];
    }

    public function user_article()
    {
        $data = [];
        $new_data = [];
        $article = Article::latest()->get();
        foreach ($article as $field) {
            $category = Category::where('id',$field->category_id)->first();
            $new_data = [
                'id'=>$field->id,
                'title'=>$field->title,
                'full_content'=>$field->full_content,
                'description'=>$field->description,
                'category'=>$category->category,
                'cover_image'=>$field->cover_image,
                'created_at'=>$field->created_at,
            ];

            $data[] = $new_data;
        }

        return view('user.article',compact('data'));
    }

    public function user_article_detail($id)
    {
        $data = [];
        $new_data = [];
        $article = Article::where('id',$id)->get();
        foreach ($article as $field) {
            $category = Category::where('id',$field->category_id)->first();
            $new_data = [
                'id'=>$field->id,
                'title'=>$field->title,
                'full_content'=>$field->full_content,
                'description'=>$field->description,
                'category'=>$category->category,
                'cover_image'=>$field->cover_image,
                'created_at'=>$field->created_at,
            ];

            $data[] = $new_data;
        }
        $data = $data[0];
        return view('user.article_detail',compact('data'));
    }

    public function view_count($id)
    {
        $obj   = Article::where('id',$id);
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
        		'title'	=> 'Article Baru!',
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
