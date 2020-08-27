<?php

namespace App\Http\Controllers\Admin\ClientManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Client\Client;
use App\Model\Vendor\VendorAuth;
use DB;
use Mail;

class ClientManagementController extends Controller
{
    public function client_manage()
    {   $client = Client::orderBy('id','desc')->get();
        return view('admin.client_manage.Client_manage',[
            'client' => $client
        ]);
    }

    // for accept vendor request ---------
    // public function accept_request($id)
    // {
    //     $vendor = VendorAuth::find($id);
    //     $vendor->activity = 1;
    //     $vendor->save();

    //     $data = $vendor->toArray();
    //      Mail::send('Admin.Emails.congratulation',$data,function($message) use ($data){
    //          $message->to($data['email']);
    //          $message->subject('congratulation mail');
    //      });
    //     return back();
         
    // }
    
    public function active($id)
    {
        $client = Client::find($id);
        $client->activity = 1;
        $client->save();
        return redirect()->back()->with('message','Client Active Successfully!!');
    }
    
    
    public function deactive($id)
    {
        $client = Client::find($id);
        $client->activity = 0;
        $client->save();
        return redirect()->back()->with('message','Client deactive Successfully!!');
    }

    // for cancel vendor request-------------

    // public function cancel_request($id)
    // {
    //     $vendor = VendorAuth::find($id);
    //     $vendor->activity = 0;
    //     $vendor->save();

    //     $data = $vendor->toArray();
    //      Mail::send('Admin.Emails.ignore',$data,function($message) use ($data){
    //          $message->to($data['email']);
    //          $message->subject('Ignore mail');
    //      });
    //     return back();
    // }
}
