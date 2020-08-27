<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Type\Type;

class TypeController extends Controller
{
    // for type list ----------
    public function manage_type()
    {   
        $types = Type::all();
        return view('admin.type.manage_type',[
            'types' => $types
        ]);
    }

    // for type add -----------

    public function add_type()
    {
        return view('admin.type.add_type');
    }

    // for save type------------
    public function save_type(Request $request)
    {
        Type::savetypeinfo($request);
        return back()->with('message','type saved successfully!!');
    }

    // for type details----------
    public function type_details($id)
    {
        $type = Type::find($id);
        return view('Admin.Type.type_details',[
            'type' => $type
        ]);
    }

    // for edit type -------------
    public function edit_type($id)
    {   
        // return $id;
        $type = Type::find($id);
        return view('admin.type.edit_type',[
            'type' => $type
        ]);
    }

    // for type update ------------

    public function update_type(Request $request)
    {
        Type::update_typeinfo($request);
        return redirect('manage-type');
    }
}
