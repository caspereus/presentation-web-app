<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentator;
use App\Article;
use App\Event;
class PresentatorController extends Controller
{
    public function index()
    {
        if (Presentator::count() < 1) {
            return redirect('presentator/add');
        }
        
    	$data = Presentator::latest()->first();
    	return view('presentator.index',compact('data'));
    }

    public function add()
    {
    	return view('presentator.add');
    }

    public function rules($req)
    {
    	$this->validate($req,[
    		'name'=>'required',
    		'email'=>'required',
    		'phone'=>'required',
    		'company'=>'required',
    		'position'=>'required',
    		'address'=>'required',
            'website'=>'required',
            'about'=>'required',
            'tweeter'=>'required',
            'google'=>'required',
    	]);
    }

    public function store(Request $req)
    {
    	$this->rules($req);
    	if ($req->hasFile('photo')) {
    		$foto       = $req->file('photo');
    		$photo_name = "presentator".uniqid().".".$foto->getClientOriginalExtension();
    		$path       = public_path('images/presentator');
    		$foto->move($path,$photo_name);

    		Presentator::create([
	    		'name'     =>$req->name,
	    		'email'    =>$req->email,
	    		'phone'    =>$req->phone,
	    		'company'  =>$req->company,
	    		'position' =>$req->position,
	    		'address'  =>$req->address,
	    		'facebook' =>$req->facebook,
	    		'instagram'=>$req->instagram,
	    		'photo'    =>$photo_name,
                'website'  =>$req->website,
                'about'    =>$req->about,
                'tweeter'  =>$req->tweeter,
                'google'   =>$req->google,
	    	]);

	    	return redirect('presentator')->with('message','Success Add Presentator');
    	}
    }

    public function update($id,Request $req)
    {
    	$this->rules($req);
    	if ($req->hasFile('photo')) {
    		$foto       = $req->file('photo');
    		$photo_name = "presentator".uniqid().".".$foto->getClientOriginalExtension();
    		$path       = public_path('images/presentator');
    		$foto->move($path,$photo_name);

    		Presentator::where('id',$id)->update([
	    		'name'     =>$req->name,
	    		'email'    =>$req->email,
	    		'phone'    =>$req->phone,
	    		'company'  =>$req->company,
	    		'position' =>$req->position,
	    		'address'  =>$req->address,
	    		'facebook' =>$req->facebook,
	    		'instagram'=>$req->instagram,
	    		'photo'    =>$photo_name,
                'website'  =>$req->website,
                'about'    =>$req->about,
                'tweeter'  =>$req->tweeter,
                'google'   =>$req->google,
	    	]);

    	}else{
    		Presentator::where('id',$id)->update([
	    		'name'     =>$req->name,
	    		'email'    =>$req->email,
	    		'phone'    =>$req->phone,
	    		'company'  =>$req->company,
	    		'position' =>$req->position,
	    		'address'  =>$req->address,
	    		'facebook' =>$req->facebook,
	    		'instagram'=>$req->instagram,
                'website'  =>$req->website,
                'about'    =>$req->about,
                'tweeter'  =>$req->tweeter,
                'google'   =>$req->google,
	    	]);
    	}

    	return redirect('presentator')->with('message','Success Update Presentator');
    }

    public function edit($id)
    {
    	$data = Presentator::where('id',$id)->first();
    	return view('presentator.edit',compact('data'));
    }

    public function data()
    {
    	return Presentator::latest()->first();
    }

    public function user_profile()
    {
        $data = Presentator::latest()->first();
        return view('user.profile',compact('data'));
    }

    public function contact()
    {
        $data = Presentator::latest()->first();
        return view('user.contact',compact('data'));
    }

    public function main_article()
    {
        $data = Article::latest()->limit(2)->get();
        return ['list'=>$data];
    }

    public function main_event()
    {
        $data = Event::latest()->limit(2)->get();
        return ['list'=>$data];
    }
}
