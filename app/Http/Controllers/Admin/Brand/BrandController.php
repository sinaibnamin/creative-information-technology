<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand\Brand;
use Image;
use Auth;

class BrandController extends Controller
{
    public function add_brand()
    {
        return view('admin.brand.add_brand');
    }

    public function manage_brand()
    {   
        $brand = Brand::all();
        return view('admin.brand.manage_brand',compact('brand'));
    }
    
    public function save_brand(Request $request)
    {
        $image     =$request->file('brand_image');
             $imageName =$image->getClientOriginalName();
             $directory ='public/brand-image/';
             $imageUrl = $directory.$imageName;
        Image::make($image)->resize(200,200)->save($imageUrl);

        
        $brand  = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $imageUrl;
        $brand->admin_id   = Auth::user()->id;
        $brand->short           = \Illuminate\Support\Str::slug($request->short_name);
        $brand->save();
        return redirect()->back()->with('message','Brand added successfully!!');
        
    }

    public function edit_brand($id)
    {   
        $brand = Brand::find($id);
        return view('admin.brand.edit_brand',compact('brand'));
    }

    public function update_brand(Request $request)
    {
        $brand  = Brand::find($request->id);
        
        $brandImage = $request->file('brand_image');
        
        if ($brandImage) {
            
               $imageName =$brandImage->getClientOriginalName();
             $directory ='public/brand-image/';
             $imageUrl = $directory.$imageName;
        Image::make($brandImage)->resize(200,200)->save($imageUrl);
             $brand->brand_name = $request->brand_name;
             $brand->brand_image = $imageUrl;
             $brand->short           = \Illuminate\Support\Str::slug($request->short_name);
            
        }
        
        else{
            $brand->brand_name = $request->brand_name;
            $brand->short           = \Illuminate\Support\Str::slug($request->short_name);
        }
        
        $brand->save();
        
        return redirect('manage-brand')->with('message','Brand updated successfully!!');
    }
}