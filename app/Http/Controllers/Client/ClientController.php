<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Category\Category;
use App\Model\Client\ContactUs;
use App\Model\Client\Order;
use App\Model\Product\Product;
use App\Model\Client\Client;
use App\Model\Brand\Brand;
use App\Model\ProductImage\ProductImage;
use App\ProductReview;
use Illuminate\Http\Request;
use Cart;
use Session;
use DB;
use Image;

class ClientController extends Controller
{
    public function index()
    {
         $categories = Category::where('root_id',0)->where('home_page',1)->where('status',1)->get();
         $products = Product::where('status',1)->take(12)->get();
         


        return view('client.home.home',[
            'categories'=>$categories,
            'products'=>$products,

        ]);


    }
    
    public function search(Request $request)
    {
        $data = array();
        if ($request->get('query')) {
            $query = $request->get('query');
            $result = DB::table('products')
                ->where('product_name', 'LIKE', "%{$query}%")
                ->get();


            foreach ($result as $val) {
                $ara=array();
                $ara["id"]=$val->id;
                $ara["value"]=$val->product_name;
                array_push($data, $ara);
            }
        }
        echo json_encode($data);
        
        
    }
    
    
    public function brand_search(Request $request)
    {   
        // $id  = $request->get('brand_id');
        // $id   = Brand::find($request->id);
        // $id  = DB::table('product')
        // ->join('brands','')
        // return $id;
        // exit();
         $data = array();
        if ($request->get('query')) {
            $query = $request->get('query');
            $result = DB::table('products')
                ->where('product_name', 'LIKE', "%{$query}%")
               ->where('brand_id',$request->brand_id)
                ->get();


            foreach ($result as $val) {
                $ara=array();
                $ara["id"]=$val->id;
                $ara["value"]=$val->product_name;
                array_push($data, $ara);
            }
        }
        echo json_encode($data);
    }
    
    
    public function product_price_filter(Request $request)
    {
        $from = $request->get('start');
        $to =  $request->get('end');
        // $brand_id = Brand::find($request->brand_id);
        $products = Product::whereBetween('product_price', [$from, $to])->where('brand_id',$request->brand_id)->get();
        
        return view('client.product.product_price_filter',compact('products'));
        // return $orders;
    }
    
      public function category_product_price_filter(Request $request)
    {
        $from = $request->get('start');
        $to =  $request->get('end');
        // $brand_id = Brand::find($request->brand_id);
        $products = Product::whereBetween('product_price', [$from, $to])->where('subcategory_id',$request->category_id)->get();
        
        return view('client.product.product_price_filter',compact('products'));
        // return $orders;
    }
    
    public function price_filter()
    {
        $id_list = "";
        if (isset($_GET["filter"])) {

            $id_list = array();
            $filter_cate = json_decode(stripslashes($_GET['filter']));

            foreach ($filter_cate as $item) {
                $id_list[] = $item[0];
            }
        }
        DB::enableQueryLog();
        $filter = DB::table('products')
            ->where(function ($filter) use ($id_list) {
                if (count($id_list) > 0)
                    $filter->whereIn('subcategory_id', $id_list);
                else
                 $filter->whereIn('subcategory_id', $id_list);
            })
            ->get();
        $query = DB::getQueryLog();
        return view('client.product.category_product', [
            'filter' => $filter
        ]);
        // return $filter;
    }
    //  public function category_filter(Request $request)
    //  {
    //      $category  = $request->category_id;
    //      return $data  = DB::table('products')
    //      ->join('category', 'products.category_id', '=', 'category.category_id')
    //      ->where('products.category_id',$category)
    //     ->get();
    //  }


// brand wise product filter -----------
    public function brand_price_filter()
    {
        // $max = $_GET["max"];
        // $min = $_GET["min"];
        $id_list = "";
        if (isset($_GET["filter"])) {

            $id_list = array();
            //$filter_cate=$_GET["filter"];
            $filter_cate = json_decode(stripslashes($_GET['filter']));

            foreach ($filter_cate as $item) {
                $id_list[] = $item[0];
            }
            //$id_list=$id_list."-0903";
            //$filter=$filter->whereIn('id', [$id_list]);
        }
        DB::enableQueryLog();
        $filter = DB::table('products')
            // ->whereBetween('product_price', [$min, $max])
            ->where(function ($filter) use ($id_list) {
                if (count($id_list) > 0)
                    $filter->whereIn('brand_id', $id_list);
            })
            ->get();
        $query = DB::getQueryLog();
        return $filter;
        //echo $id_list;
        //print_r($query);
        // $catid  = Category::get(['id']);
        // $filter = Product::where('category_id',$catid)->whereBetween('product_price', [$min, $max])->get();
        // return view('Client.Productlist.brand_product_list', [
        //     'filter' => $filter
        // ]);
    }
    
    
    
    // public function category($id)
    // {

    //     $brands = Brand::all();
    //     $categories = Category::where('root_id',$id)->get();
    //     $products = Product::with('category')->where('category_id', $id)->paginate(20);
    //     $product = Product::where('category_id', $id)->first();
    //     return view('client.category.category')->with([
    //         'brands' => $brands,
    //         'categories' => $categories,
    //         'products' => $products,
    //         'product' => $product
    //     ]);
    // }


    // public function subCategory($id)
    // {

    //     $brands = Brand::all();
    //     $categories = Category::where('root_id',$id)->get();
    //     $products = Product::with('category')->where('subcategory_id', $id)->paginate(20);
    //     $product = Product::where('subcategory_id', $id)->first();
    //     return view('client.category.sub-category')->with([
    //         'brands' => $brands,
    //         'categories' => $categories,
    //         'products' => $products,
    //         'product'  =>$product
    //     ]);
    // }
    
    
    // public function subSubCategory($id)
    // {

    //     $brands = Brand::all();
    //     $categories = Category::all();
    //     $products = Product::with('category')->where('sub_sub_cat_id', $id)->paginate(20);
    //     return view('client.category.sub-sub-category')->with([
    //         'brands' => $brands,
    //         'categories' => $categories,
    //         'products' => $products,
    //     ]);
    // }



    public function category($name)
    {

        $brands = Brand::all();
        $info = Category::where('short_name',$name)->first();
        $cid=-1;
        if(!empty($info->id))
        $cid=$info->id;
        $product1  = DB::table('products')
            ->join('categories', 'products.category_id','=', 'categories.id')
            ->select('products.product_name','products.product_price','products.category_id', 'categories.short_name','categories.category_name')
            ->where('categories.root_id',$cid)
            ->get()
            ->take(1);
       $categories = Category::where('root_id',$cid)->get(); 
       
            
        // $product = DB::table('products')->where('category_id',$cid)->get();
        $product = Product::where('category_id',$cid)->first();
        $products = DB::table('products')

            ->join('categories','products.category_id','=','categories.id')
            ->where('categories.short_name', $name)
            ->select('products.*','categories.short_name')
            ->paginate(20);
            // ->get();
            

        return view('client.category.category')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
            'product1' => $product1,
            'product'=>$product,
            'info'   => $info,
        ]);
    }


    public function subCategory($name)
    {


        $brands = Brand::all();
        // $categories = Category::all();

        // $product = Product::where('subcategory_id', $id)->first();
        $info = Category::where('short_name',$name)->first();
        $cid=-1;
        if(!empty($info->id))
        $cid=$info->id;
        $product1  = DB::table('products')
            ->join('categories', 'products.subcategory_id','=', 'categories.id')
            ->select('products.product_name','products.product_price','products.category_id', 'categories.short_name','categories.category_name')
            ->where('categories.root_id',$cid)
            ->get()
            ->take(1);
        $categories = Category::where('root_id',$cid)->get();     
            
        $product = Product::where('subcategory_id',$cid)->first();
        $products = DB::table('products')

            ->join('categories','products.subcategory_id','=','categories.id')
            ->where('categories.short_name', $name)
            ->select('products.*','categories.short_name')
            ->paginate(20);

        //$products = Product::with('category')->where('subcategory_id', $id)->get();
        return view('client.category.sub-category')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
            'product' => $product,
            'info'   => $info,
        ]);
    }

    public function subSubCategory($name)
    {

        // $brands = Brand::all();
        // $categories = Category::all();
        // //$products = Product::with('category')->where('subcategory_id', $id)->get();z

        // $product1  = DB::table('products')
        //     ->join('categories','products.sub_sub_cat_id','=','categories.id')
        //     ->where('categories.short_name', $name)
        //     ->select('products.*','categories.category_name')
        //     ->get()
        //     ->take(1);

        // $products = DB::table('products')

        //     ->join('categories','products.sub_sub_cat_id','=','categories.id')
        //     ->where('categories.short_name', $name)
        //     ->select('products.*','categories.short_name')
        //     ->paginate(20);
        $brands = Brand::all();
        // $categories = Category::all();

        // $product = Product::where('subcategory_id', $id)->first();
        $info = Category::where('short_name',$name)->first();
        $cid=-1;
        if(!empty($info->id))
        $cid=$info->id;
        $product1  = DB::table('products')
            ->join('categories', 'products.sub_sub_cat_id','=', 'categories.id')
            ->select('products.product_name','products.product_price','products.category_id', 'categories.short_name','categories.category_name')
            ->where('categories.root_id',$cid)
            ->get()
            ->take(1);
        $categories = Category::where('root_id',$cid)->get();     
            
        $product = Product::where('sub_sub_cat_id',$cid)->first();
        $products = DB::table('products')

            ->join('categories','products.sub_sub_cat_id','=','categories.id')
            ->where('categories.short_name', $name)
            ->select('products.*','categories.short_name')
            ->paginate(20);

        return view('client.category.sub-sub-category')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
            'product1' => $product1,
            'product'=>$product
        ]);
    }
    


    public function productDetails($id, $category_id)
    {

        $products = Product::with('category')
            ->where('category_id', $category_id)
            ->where('id', '!=', $id)
            ->take(4)->get();

        $product = Product::find($id);

        $productImages = ProductImage::where('product_id', $id)->get();
        //return $productImages;

        $bestProducts = Product::take(3)->orderBy('popularity', 'desc')->get();

        $reviews = DB::table('product_reviews')
            ->join('products', 'product_reviews.product_id', '=', 'products.id')
            ->join('clients', 'clients.id', '=', 'product_reviews.client_id')
            ->select('product_reviews.*', 'clients.full_name')
            ->where('product_reviews.product_id', $product->id)
            ->get();

        return view('client.product.details.product')->with([
            'product' => $product,
            'products' => $products,
            'reviews' => $reviews,
            'bestProducts' => $bestProducts,
            'productImages' => $productImages,
        ]);
    }


    public function productReview(Request $request)
    {


        $this->validate($request, [
            'description' => 'required',
            'title' => 'required',
            'rating' => 'required'
        ]);


        //$product = product::find($request->product_id);
        $product = new ProductReview();
        $product->product_id = $request->product_id;
        $product->client_id = $request->client_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->rating = $request->rating;
        $product->save();
        return back()->with('message', 'Review submitted successfully');

    }

    public function brandProducts($name)
    {

        $brands = Brand::all();
        $categories = Category::all();
        //$products = Product::with('brand')->where('brand_id', $id)->paginate(20);
        //$product = Product::where('brand_id', $id)->first();
         $info = Brand::where('short',$name)->first();
        $cid=-1;
        if(!empty($info->id))
        $cid=$info->id;
        $product1  = DB::table('products')
            ->join('brands', 'products.brand_id','=', 'brands.id')
            ->select('products.product_name','products.product_price','products.brand_id', 'brands.short','brands.brand_name')
            ->where('brands.id',$cid)
            ->get()
            ->take(1);
        $brand = Brand::where('id',$cid)->get();     
            
        $product = Product::where('brand_id',$cid)->first();
        
        $products = DB::table('products')

            ->join('brands','products.brand_id','=','brands.id')
            ->where('brands.short', $name)
            ->select('products.*','brands.short')
            ->paginate(20);
        
        return view('client.brand-products.products')->with([
            'brands' => $brands,
            'categories' => $categories,
            'product' => $product,
            'products' => $products,
            'brand'=>$brand
        ]);
    }
    
    public function allBrands()
    {

        $brands = Brand::all();

        return view('client.brand-products.all-brands')->with([
            'brands' => $brands,
        ]);
    }
    
    
    public function editProfile()
    {
        return view('client.profile.edit-profile');
    }


    public function updateProfile(Request $request)
    {
        Client::updateProfile($request);
        return redirect('/client/profile')->with('message', 'Profile updated successfully!!');
    }
    
    
    public function orderList()
    {
        $uid = Session::get('client_id');
        $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.client_id')
            ->where('orders.client_id', $uid)
            ->select('clients.*', 'orders.*')
            ->orderBy('orders.id', 'desc')
            ->get();

        $pending = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 1)
            ->orWhere('invoices.client_id', $uid)
            ->where('invoices.status', 4)
            ->select('clients.*', 'invoices.*')
            ->get();

        $pendingTotal = $pending->count();

        $processing = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 2)
            ->select('clients.*', 'invoices.*')
            ->get();

        $processingTotal = $processing->count();


        $cancelled = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 3)
            ->select('clients.*', 'invoices.*')
            ->get();

        $cancelledTotal = $cancelled->count();

        $delivered = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 5)
            ->select('clients.*', 'invoices.*')
            ->get();

        $deliveredTotal = $delivered->count();

        return view('client.profile.order-list', [
            'orders' => $orders,
            'pendingTotal' => $pendingTotal,
            'processingTotal' => $processingTotal,
            'cancelledTotal' => $cancelledTotal,
            'deliveredTotal' => $deliveredTotal,
        ]);

    }

    public function orderList2($id)
    {
        $uid = Session::get('client_id');
        /*$invoices = DB::table('invoices')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('products','invoices.product_id','=','products.id')
            ->select('invoices.*','products.product_name','products.product_description')
            ->where('invoices.status',$id)
            ->where('orders.client_id',$uid)
            ->get();*/


        if ($id == 1 || $id == 4) {
            $invoices = DB::table('invoices')
                ->join('orders', 'invoices.order_id', '=', 'orders.id')
                ->join('products', 'invoices.product_id', '=', 'products.id')
                ->select('invoices.*', 'products.product_name', 'products.product_description')
                ->where('invoices.status', 1)
                ->where('orders.client_id', $uid)
                ->orWhere('invoices.status', 4)
                ->where('orders.client_id', $uid)
                ->get();
        } else {
            $invoices = DB::table('invoices')
                ->join('orders', 'invoices.order_id', '=', 'orders.id')
                ->join('products', 'invoices.product_id', '=', 'products.id')
                ->select('invoices.*', 'products.product_name', 'products.product_description')
                ->where('invoices.status', $id)
                ->where('orders.client_id', $uid)
                ->get();
        }


        return view('client.profile.order-list2', [
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }

    public function orderDetails($id)
    {
        $invoices = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->select('invoices.*', 'products.product_name', 'products.product_description')
            ->where('invoices.order_id', $id)
            ->get();

        return view('client.profile.order-details', [
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }
    
    public function about()
    {
        return view('client.about.about');
    }


    public function contactUs()
    {
        return view('client.contact-us.contact');
    }

    public function contactSubmit(Request $request)
    {

        $contact = new ContactUs();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('message', 'Message send successfully');

    }
    
    public function terms()
    {
        return view('client.terms-and-condition.terms');
    }
    
    public function returnPolicy()
    {
        return view('client.return-policy.return');
    }
    
    public function paymentPolicy()
    {
        return view('client.payment-policy.payment');
    }

}
