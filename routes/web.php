<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function () {

    echo 333;

    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache Clear";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//client side
Route::get('/', 'Client\ClientController@index')->name('/');
Route::get('/about/', 'Client\ClientController@about')->name('about');
Route::get('/contact/', 'Client\ClientController@contactUs')->name('contact-us');
Route::post('/contact/form/', 'Client\ClientController@contactSubmit')->name('contact-submit');
Route::get('/terms/', 'Client\ClientController@terms')->name('terms');
Route::get('/return/policy', 'Client\ClientController@returnPolicy')->name('return');
Route::get('/payment/policy', 'Client\ClientController@paymentPolicy')->name('payment');


Route::get('/client-login', 'Client\CheckoutController@login')->name('client-login');
Route::get('/client-forgot-password', 'Client\CheckoutController@password_change')->name('client-forgot-password');
Route::post('/client-forgot-password', 'Client\CheckoutController@update_password')->name('update-password');
Route::get('/verify-email/{email}/{varify_token}', 'Client\CheckoutController@forgot_password_send_email_done')->name('forgot-passwordsendemaildone');
//for forgetting password .......
Route::get('/forgot-password', 'Client\CheckoutController@forgot_password')->name('forgot-password');
Route::post('/check-email-forgot-password', 'Client\CheckoutController@check_email_for_forgot_password')->name('check-email-forgot-password');

Route::post('/login-process', 'Client\CheckoutController@loginProcess')->name('login-process');
Route::get('/client-register', 'Client\CheckoutController@register')->name('client-register');
// get client information---------
Route::get('/getclientInfo', 'Client\CheckoutController@getclientinfo')->name('getclientInfo');
Route::post('/registration-process', 'Client\CheckoutController@registerProcess')->name('registration-process');
Route::get('/client-logout', 'Client\CheckoutController@logout')->name('client-logout');
Route::get('/client/profile', 'Client\ClientController@editProfile')->name('client-profile');
Route::post('/client/update/profile', 'Client\ClientController@updateProfile')->name('client-update-profile');
Route::get('/order-list', 'Client\ClientController@orderList')->name('order-list');
Route::get('/order-list2/{id}', 'Client\ClientController@orderList2')->name('order-list2');
Route::get('/order-details/{id}', 'Client\ClientController@orderDetails')->name('order-details');
// for client email verification................................................................
Route::get('/verifyemailfirst', 'Client\CheckoutController@verify_email_first')->name('verifyemailfirst');
Route::get('/verify/{email}/{varify_token}', 'Client\CheckoutController@send_email_done')->name('sendemaildone');
Route::post('/update-forgot-password', 'Client\CheckoutController@update_forgot_password')->name('update-forgot-password');
// end client email verifaction..................................................................
//Route::get('/category/{id}', 'Client\ClientController@category')->name('category-products');
//Route::get('/sub-category/{id}', 'Client\ClientController@subCategory')->name('sub-category');
//Route::get('/sub/sub/category/{id}', 'Client\ClientController@subSubCategory')->name('sub-sub-category');

Route::get('/category/{name}', 'Client\ClientController@category')->name('category-products');
Route::get('/category/sub/{name}', 'Client\ClientController@subCategory')->name('sub-category');
Route::get('/category/sub/sub/{name}', 'Client\ClientController@subSubCategory')->name('sub-sub-category');

Route::get('/product/details/{id}/{category_id}', 'Client\ClientController@productDetails')->name('product');
Route::post('/product-review', 'Client\ClientController@productReview')->name('product-review');
Route::get('/brand/products/{name}', 'Client\ClientController@brandProducts')->name('brand-product');
Route::get('/brand/all/', 'Client\ClientController@allBrands')->name('all-brands');

// for client cart management...................................................................
Route::get('/add-to-cart', 'Client\CartController@add_to_cart')->name('add-to-cart');
Route::get('/show-cart', 'Client\CartController@show_cart')->name('show-cart');
Route::get('/isCartExist', 'Client\CartController@isCartExist');
Route::get('/delete-cart/{id}', 'Client\CartController@delete_cart')->name('delete-cart');
Route::get('/update-cart', 'Client\CartController@update_cart')->name('update-cart');


// for client product search.....................................................................
Route::post('/search', 'Client\ClientController@search')->name('search');
Route::post('/brand-search', 'Client\ClientController@brand_search')->name('brand-search');
// for product price filter........................
Route::get('/product-price-filter', 'Client\ClientController@product_price_filter')->name('product-price-filter');
Route::get('/category-product-price-filter', 'Client\ClientController@category_product_price_filter')->name('category-product-price-filter');
Route::get('/price-filter', 'Client\ClientController@price_filter')->name('price-filter');
// Route::get('/category-filter', 'Client\ClientController@category_filter')->name('category-filter');
// Route::get('/brand-price-filter', 'Client\ClientController@brand_price_filter')->name('brand-price-filter');


// for client order submit.......................................................................
Route::post('/confim-order', 'Client\OrderController@confirm_order')->name('confim-order');


Route::group(['middleware' => ['auth']], function () {
//admin side
//category
    Route::get('/add-category', 'Admin\Category\CategoryController@add_category')->name('add-category');
    Route::post('/save-category', 'Admin\Category\CategoryController@save_category')->name('save-category');
    Route::get('/manage-category', 'Admin\Category\CategoryController@manage_category')->name('manage-category');
    Route::get('/details-category/{id}', 'Admin\Category\CategoryController@details_category')->name('details-category');
    Route::get('/edit-category/{id}', 'Admin\Category\CategoryController@edit_category')->name('edit-category');
    Route::post('/update-category', 'Admin\Category\CategoryController@update_category')->name('update-category');

// for subcategory ----------
    Route::get('/manage-subcategory/{id}', 'Admin\Category\CategoryController@manage_subcategory')->name('manage-subcategory');
    Route::get('/add-subcategory/{id}', 'Admin\Category\CategoryController@add_subcategory')->name('add-subcategory');
    Route::post('/save-subcategory', 'Admin\Category\CategoryController@save_subcategory')->name('save-subcategory');
    Route::get('/details-subcategory/{id}', 'Admin\Category\CategoryController@details_subcategory')->name('details-subcategory');
    Route::get('/edit-subcategory/{id}', 'Admin\Category\CategoryController@edit_subcategory')->name('edit-subcategory');
    Route::post('/update-subcategory', 'Admin\Category\CategoryController@update_subcategory')->name('update-subcategory');

// for type management.......................
    Route::get('/add-type', 'Admin\Type\TypeController@add_type')->name('add-type');
    Route::post('/add-type', 'Admin\Type\TypeController@save_type')->name('save-type');
    Route::get('/manage-type', 'Admin\Type\TypeController@manage_type')->name('manage-type');
    Route::get('/edit-type/{id}', 'Admin\Type\TypeController@edit_type')->name('edit-type');
    Route::post('/edit-type', 'Admin\Type\TypeController@update_type')->name('update-type');


// for admin brand management...............................
    Route::get('/add-brand', 'Admin\Brand\BrandController@add_brand')->name('add-brand');
    Route::get('/manage-brand', 'Admin\Brand\BrandController@manage_brand')->name('manage-brand');
    Route::post('/add-brand', 'Admin\Brand\BrandController@save_brand')->name('save-brand');
    Route::get('/edit-brand/{id}', 'Admin\Brand\BrandController@edit_brand')->name('edit-brand');
    Route::post('/edit-brand', 'Admin\Brand\BrandController@update_brand')->name('update-brand');

// for getting category and brand ---------------
    Route::get('/get-categories/{id}', 'Api\apiController@getcategories');
    Route::get('/get-brand/{id}', 'Api\apiController@getbrands');

// for admin product management ..................
    Route::get('/manage-product', 'Admin\Product\ProductController@manage_product')->name('manage-product');
    Route::get('/add-product', 'Admin\Product\ProductController@add_product')->name('add-product');
    Route::post('/add-product', 'Admin\Product\ProductController@save_product')->name('save-product');
    Route::get('/edit-product/{id}', 'Admin\Product\ProductController@edit_product')->name('edit-product');
    Route::post('/edit-product', 'Admin\Product\ProductController@update_product')->name('update-product');
    Route::get('/product-details/{id}', 'Admin\Product\ProductController@product_details')->name('product-details');
    Route::post('/admin-search-filter', 'Admin\Product\ProductController@admin_search_filter')->name('admin-search-filter');
    Route::post('/save-colorsize', 'Admin\ColorSize\ColorSizeController@save_size_color')->name('save-colorsize');
// for save multiple product image-------------
    Route::post('/save-product-image', 'Admin\ProductImage\ProductImageController@save_productImage')->name('save-product-image');
// for delete multiple product image-------------
    Route::get('/productiamge-delete/{id}', 'Admin\ProductImage\ProductImageController@productImage_delete')->name('productiamge-delete');

// for admin product specification.................
    Route::get('/edit-spec/{id}', 'Admin\Product\ProductController@edit_spec')->name('edit-spec');
// Route::post('/edit-spec/{id}','Admin\Product\ProductController@update_spec')->name('update-spec');
    Route::post('/update-spec/{id}', 'Admin\Product\ProductController@update_spec')->name('update-spec');
    Route::get('/add-spec/{id}', 'Admin\Product\ProductController@add_spec')->name('add-spec');
    Route::post('/add-spec', 'Admin\Product\ProductController@add_spec_process')->name('add-spec-process');

// for admin specification header.......................................
    Route::get('/add-heading', 'Admin\Heading\HeadingController@add_heading')->name('add-heading');
    Route::post('/add-heading', 'Admin\Heading\HeadingController@save_heading')->name('save-heading');
    Route::get('/manage-heading', 'Admin\Heading\HeadingController@manage_heading')->name('manage-heading');
    Route::get('/edit-heading/{id}', 'Admin\Heading\HeadingController@edit_heading')->name('edit-heading');
    Route::post('/edit-heading', 'Admin\Heading\HeadingController@update_heading')->name('update-heading');
// for delete heading from admin product details page..........
    Route::get('/delete-spcification/{id}', 'Admin\Product\ProductController@delete_spcification')->name('delete-spcification');


// for admin client management........................................................
    Route::get('/client-manage', 'Admin\ClientManagement\ClientManagementController@client_manage')->name('client-manage');
    Route::get('/client-active/{id}', 'Admin\ClientManagement\ClientManagementController@active')->name('client-active');
    Route::get('/client-deactive/{id}', 'Admin\ClientManagement\ClientManagementController@deactive')->name('client-deactive');

// for admin order management...........................................
    Route::get('/admin-manage-order', 'Admin\Order\OrderController@manageOrder')->name('admin-manage-order');
    Route::get('/admin-manage-order-details/{id}', 'Admin\Order\OrderController@orderDetails')->name('admin-manage-order-details');
    Route::get('/admin-order-accept/{id}', 'Admin\Order\OrderController@acceptOrder')->name('admin-order-accept');
    Route::get('/admin-cancel-order/{id}', 'Admin\Order\OrderController@cancelOrder')->name('admin-cancel-order');
    Route::get('/admin-delete-order/{id}', 'Admin\Order\OrderController@deleteOrder')->name('admin-delete-order');
// for admin order filter...........................................
    Route::post('/order-search-filter', 'Admin\Order\OrderController@order_search_filter')->name('order-search-filter');
});