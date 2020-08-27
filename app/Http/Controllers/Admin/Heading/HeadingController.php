<?php

namespace App\Http\Controllers\Admin\Heading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Vendor\VendorAuth;
use App\Model\Heading\Heading;
use App\Model\Category\Category;
use App\Model\Type\Type;
use App\Model\Product\Product;
use Image;
use DB;
class HeadingController extends Controller
{
    public function add_heading()
    {
        return view('admin.heading.add_heading');
    }
    
    public function save_heading(Request $request)
    {
        $heading = new Heading();
        $heading->heading = $request->heading;
        $heading->serial  = $request->serial;
        $heading->save();
        return redirect()->back()->with('message','heading saved successfully!!');
        
    }
    
    public function manage_heading(Request $request)
    {   
        $heading = Heading::all();
        return view('admin.heading.manage_heading',compact('heading'));
    }
    
    public function edit_heading($id)
    {   
        // return $id;
        $heading = Heading::find($id);
        return view('admin.heading.edit_heading',compact('heading'));
    }
    
    
    public function update_heading(Request $request)
    {
        $heading = Heading::find($request->id);
        $heading->heading = $request->heading;
        $heading->serial  = $request->serial;
        $heading->save();
        return redirect('manage-heading')->with('message','heading updated successfully!!');
    }
    
    
}


