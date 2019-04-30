<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitors;
use Session;
use App\Event;
use App\Article;
class VisitorsController extends Controller
{
    public function index()
    {
    	$data = Visitors::latest()->get();
    	return view('visitors.index',compact('data'));
    }

    public function create(Request $request)
    {
    	$this->validate($request,[
    		'email'=>'required',
    		'name'=>'required',
    		'phone'=>'required',
    	]);
        $obj    = Visitors::where('email',$request->email)->where('phone',$request->phone);
        $number = $obj->count(); 
        if ($number > 0) {
            $data = $obj->first();
            $response['status'] = "success";
            $response['message'] = $data->id;
        }else{
            $check = Visitors::where('email',$request->email)->count();
            if ($check > 0) {
                $response['status'] = "available";
            }else{
                $send = Visitors::create($request->all())->id;

                if ($send) {
                    $response['status'] = "success";
                    $response['message'] = $send;
                }else{
                    $response['status'] = "error";
                }
            }
        }

    	return $response;
    }

    public function user_save(Request $request)
    {
       $this->validate($request,[
            'email'=>'required',
            'name'=>'required',
            'phone'=>'required',
        ]);
        $check = Visitors::where('email',$request->email)->where('phone',$request->phone)->count();
        if ($check > 0) {
            $response['status'] = "success";
        }else{
            $check = Visitors::where('email',$request->email)->count();
            if ($check > 0) {
                $response['status'] = "available";
            }else{
                $send = Visitors::create($request->all());

                if ($send) {
                    $response['status'] = "success";
                }else{
                    $response['status'] = "error";
                }
            }
        }

        if ($response['status'] == "success") {
            Session::put('name',$request->name);
            Session::put('email',$request->email);
            return redirect('/user');
        }else if ($response['status'] == "available") {
            return redirect()->back()->withInfo('This email has been used');
        }
    }

    public function user_logout()
    {
        Session::flush();
        return redirect('user');
    }
    
    public function form_show()
    {
        $article = Article::latest()->limit(2)->get();
        $event = Event::latest()->limit(2)->get();
        
        return view('user.form',compact('article','event'));
    }
}
