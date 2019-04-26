<?php

namespace App\Http\Controllers;


use App\category;
use App\uploadDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\User;

class TravelController extends Controller
{
    public function getPostUpload(){
        $cats=Category::OrderBy('id','desc')->paginate("3");
        return view('uploadPost')->with(['cats'=>$cats]);
    }

    public function getAllPost(){
        $ups=uploadDetail::OrderBy('id','desc')->get();
        $cats=Category::all();
        return view('allPost')->with(['cats'=>$cats, 'ups'=>$ups]);// to send category id to select ->allPost.blade
    }


    public function getLocationImage($img_name){
        $file=Storage::disk('location')->get($img_name);
        return response($file, 200);
    }

    public function getDeletePost(Request $request){
        $id=$request['id'];
        $up=uploadDetail::whereId($id)->firstOrFail();
        Storage::disk('location')->delete($up->image);
        $up->delete();
        return redirect()->back();
    }

    public function postNewCategory(Request $request){
        $this->validate($request,[
            'cat_name'=>'required|unique:categories'
        ]);
        $cat=new Category();
        $cat->cat_name=$request['cat_name'];
        $cat->save();
        return redirect()->back()->with('alert','The category has been saved');
    }

    public function postNewUploadDetail(Request $request){
            $this->validate($request,[
                'location_name'=>'required',
                'category_id'=>'required',
                'image'=>'required|mimes:jpg,png,gif,jpeg',
                'location_detail'=>'required',
            ]);

            $img_name=$request['location_name'].'.'.$request->file('image')->getClientOriginalExtension();
            $img_file=$request->file('image');

            $up=new uploadDetail();
            $up->location_name=$request['location_name'];
            $up->category_id=$request['category_id'];
            $up->image=$img_name;
            $up->location_detail=$request['location_detail'];
            $up->user_id=Auth::user()->id;
            $up->save();
            Storage::disk('location')->put($img_name, file::get($img_file));
            return redirect()->back()->with('info','The information have been inserted');
        }

    public function postUpdateCategory(Request $request){
        $cat_id=$request['id'];
        $cat_name=$request['cat_name'];
        $cats=Category::whereId($cat_id)->firstOrFail();
        $cats->cat_name=$cat_name;
        $cats->update();
        return redirect()->back()->with('info','The category has been updated');
    }

    public function getDeleteCategory($id){
        $cats=Category::where('id',$id)->firstOrFail();
        $cats->delete();
        return redirect()->back()->with('info','The selected category has been deleted');
    }


}
