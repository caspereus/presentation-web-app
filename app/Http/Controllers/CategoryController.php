<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
    	$data = Category::latest()->get();
    	return view('category.index',compact('data'));
    }

    public function delete($id)
    {
    	Category::destroy($id);

    	return back()->withMessage('Data Successfully deleted');
    }

    public function store(Request $req)
    {
    	$this->validate($req,[
    		'category'=>'required'
    	]);
    	Category::create($req->all());
    	return back()->withMessage('Data Successfully Inserted');
    }
}
