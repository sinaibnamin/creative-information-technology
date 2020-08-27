<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Category\Category;
use App\Model\Brand\Brand;
use App\Model\Client\Client;
use App\Model\Product\Product;
use Illuminate\Http\Request;
use Session;
use Response;
use Illuminate\Support\str;
use Mail;
use App\Mail\verifyemail;
use App\Mail\verifyforgotpasswordemail;

session_start();

class CheckoutController extends Controller
{


    public function login()
    {


        $categories = Category::where('root_id', 0)->get();
        $subCategories = Category::where('root_id', '!=', 0)->get();
        $popularProducts = Product::take(5)->orderBy('id', 'desc')->get();
        $brands = Brand::all();
        $latestProducts = Product::take(5)->orderBy('popularity', 'desc')->get();
        return view('client.login.login', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'popularProducts' => $popularProducts,
            'latestProducts' => $latestProducts,
            'brands' => $brands,
        ]);

    }


    public function loginProcess(Request $request)
    {
        $client = Client::where('email', $request->email)->first();
        if ($client) {
            if (password_verify($request->password, $client->password)) {
                // if ($request->password == $client->password) {

                if ($client->status == 1) {
                    Session::put('client_id', $client->id);
                    Session::put('client_name', $client->full_name);
                    Session::put('client_first_name', $client->first_name);
                    Session::put('client_last_name', $client->last_name);
                    Session::put('client_email', $client->email);
                    Session::put('client_password', $client->password);
                    Session::put('client_contact_no', $client->contact_no);
                    Session::put('client_nid', $client->nid);
                    Session::put('client_present_address', $client->present_address);
                    Session::put('client_permanent_address', $client->permanent_address);
                    Session::put('client_photo', $client->photo);
                    return redirect('/');
                } else {
                    return redirect('client-login')->with('message', 'please verify your account first!!');
                }

            } else {
                return redirect('client-login')->with('message', 'Wrong Password!!');
            }
        } else {
            return redirect('client-login')->with('message', 'Invalid email!!');
        }

    }


    public function register()
    {
        $categories = Category::where('root_id', 0)->get();
        $subCategories = Category::where('root_id', '!=', 0)->get();
        $brands = Brand::all();
        $popularProducts = Product::take(5)->orderBy('id', 'desc')->get();
        $latestProducts = Product::take(5)->orderBy('popularity', 'desc')->get();

        return view('client.register.register', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'popularProducts' => $popularProducts,
            'latestProducts' => $latestProducts,
            'brands' => $brands,
        ]);

    }


    public function registerProcess(Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|unique:clients',
            'contact_no' => 'required',
            'password' => 'required'
        ]);
        $client = new Client();
        $client->full_name = $request->full_name;
        $client->email = $request->email;
        $client->contact_no = $request->contact_no;
        $client->password = bcrypt($request->password);
        $client->varify_token = str::random(40);

        $client->save();
        $thisclient = Client::find($client->id);
        $this->sendemail($thisclient);
        // $client->save();


        // Session::put('client_id', $client->id);
        // Session::put('client_password', $client->password);
        // Session::put('client_email', $client->email);
        // Session::put('client_contact_no', $client->contact_no);

        //  return redirect('/');
        return redirect('verifyemailfirst');
    }

    public function verify_email_first()
    {
        return view('client.login.verifyemailfirst');
    }

    public function send_email_done($email, $varify_token)
    {
        // return $email;
        // return $varify_token;
        $client = Client::where(['email' => $email, 'varify_token' => $varify_token])->first();
        // return $client;
        if ($client) {
            Client::where(['email' => $email, 'varify_token' => $varify_token])->update(['status' => '1',]);

        }

        // return redirect('/');
        return redirect('client-login')->with('message', "your are welcome please enter your valid email and password");
    }


    public function sendemail($thisclient)
    {
        Mail::to($thisclient['email'])->send(new verifyemail($thisclient));
    }


    public function logout()
    {

        Session::forget('client_id');
        Session::forget('client_name');
        Session::forget('client_first_name');
        Session::forget('client_last_name');
        Session::forget('client_email');
        Session::forget('client_password');
        Session::forget('client_contact_no');
        Session::forget('client_nid');
        Session::forget('client_present_address');
        Session::forget('client_permanent_address');
        Session::forget('client_photo');
        Session::forget('client_city');

        return redirect('/');

    }

    public function password_change()
    {
        // $this->authcheck();
        return view('client.profile.password_change');
    }

    public function update_password(Request $request)
    {
        $client = Client::where('id', $request->id)->first();
        if ($client) {
            if (password_verify($request->oldpassword, $client->password)) {

                $newpassword = Client::find($request->id);
                $newpassword->password = bcrypt($request->new_password);
                $newpassword->save();
                return redirect()->back()->with('message', 'password changes successfully!!');

            } else {
                return redirect()->back()->with('message', 'old password not valid!!');
            }
        }
    }

    public function getclientinfo()
    {
        $clientinfo = Client::find(Session::get('client_id'));
        return Response::json($clientinfo);

    }

    public function forgot_password()
    {
        return view('client.profile.forgot_password');
    }

    public function check_email_for_forgot_password(Request $request)
    {
        $client = Client::where('email', $request->email)->first();
        if ($client) {

//            return $client->id;
            $forgot = Client::find($client->id);
            $forgot->remember_token = str::random(40);
            $forgot->save();

            $forgot = Client::find($client->id);
            $this->send_email_forgot_password($forgot);
            return redirect()->back()->with('message','We Have Sent You A Verification Email!!');

        }
        else{
            return redirect()->back()->with('message','Your Email Is Not Valid!!');
        }
    }

    public  function send_email_forgot_password($forgot)
    {
        Mail::to($forgot['email'])->send(new verifyforgotpasswordemail($forgot));
    }

    public function forgot_password_send_email_done($email, $varify_token)
    {
        $client = Client::where(['email' => $email, 'varify_token' => $varify_token])->first();
//        return $client->id;
//        exit();
        // return $client;
        if ($client) {
//            Client::where(['email' => $email, 'varify_token' => $varify_token])->update(['status' => '1',]);
            return view("client.profile.new_password_form",compact('client'));

        }

        // return redirect('/');
//        return redirect('client-login')->with('message', "your are welcome please enter your valid email and password");
    }

    public function update_forgot_password(Request $request)
    {
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if($password == $confirm_password) {
            $client = Client::find($request->id);
            $client->password = bcrypt($request->password);
            $client->save();
            return redirect('client-login')->with('message','your password updated Successfully!!');
        }
        else{
            return redirect()->back()->with('message','Your Password And Confirm Password Doesnot Match!!');
        }
    }
}
