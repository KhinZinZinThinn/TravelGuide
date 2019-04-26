<?php

namespace App\Http\Controllers;

use App\category;
use App\uploadDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getWelcome(){
        $ups=uploadDetail::OrderBy('id','desc')->get();
        $cats=Category::all();
        return view('welcome')->with(['cats'=>$cats, 'ups'=>$ups]);
    }


    public function getProductCategory($id){
        $cats=Category::all();
       $up=uploadDetail::OrderBy('id','desc')->where('category_id',$id)->paginate("8");
       return view('welcome')->with(['ups'=>$up,'cats'=>$cats]);
        //return view('welcome')->with(['cats'=>$cats]);
    }

    public function getLocationImage($img_name){
        $file=Storage::disk('location')->get($img_name);
        return response($file, 200);
    }

    public function getOnePost(Request $request){
        $id=$request['id'];
        $up=uploadDetail::where('id',$id)->paginate("8");
        $cats=Category::all();
        return view('viewDetailOne')->with(['ups'=>$up,'cats'=>$cats]);
    }

    public function getContactUs(){
        return view('contactUs');
    }
}
