<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//admin========sidebar

Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('admin/delete/category/{id}', 'Admin\Category\CategoryController@deletecategory')->name('delete.category');
Route::get('admin/edit/category/{id}', 'Admin\Category\CategoryController@editcategory')->name('edit.category');
Route::post('admin/update/category/{id}', 'Admin\Category\CategoryController@updateCategory')->name('update.category');




 //Brands=======
 Route::get('admin/brands', 'Admin\Category\CategoryController@brand')->name('brands');
 Route::post('admin/store/brand', 'Admin\Category\CategoryController@storebrand')->name('store.brand');
 Route::get('admin/delete/brand/{id}', 'Admin\Category\CategoryController@deleteBrand')->name('delete.brand');
 Route::get('admin/edit/brand/{id}', 'Admin\Category\CategoryController@editBrand')->name('edit.brand'); 

 Route::post('admin/update/brand/{id}', 'Admin\Category\CategoryController@updateBrand')->name('update.brand');

 //Sub Categories=====
 Route::get('admin/sub/categories', 'Admin\Category\CategoryController@subCategories')->name('sub.categories');
 Route::post('admin/store/subcategory', 'Admin\Category\CategoryController@storeSubCategory')->name('store.subcategory');
 Route::get('admin/delete/subcat/{id}', 'Admin\Category\CategoryController@deleteSubCat')->name('delete.subcat');
 Route::get('admin/edit/subcat/{id}', 'Admin\Category\CategoryController@editSubCat')->name('edit.subcat');
 Route::post('admin/update/subcat/{id}', 'Admin\Category\CategoryController@updateSubCat')->name('update.subcat'); 

 //Coupon======
 Route::get('admin/coupon', 'Admin\CouponController@Coupon')->name('admin.coupon');
 Route::post('admin/store/coupon', 'Admin\CouponController@storecoupon')->name('store.coupon');
 Route::get('admin/delete/coupon/{id}', 'Admin\CouponController@deletecoupon')->name('delete.coupon');
 Route::get('admin/edit/coupon/{id}', 'Admin\CouponController@editcoupon')->name('edit.coupon'); 
 Route::post('admin/update/coupon/{id}', 'Admin\CouponController@updatecoupon')->name('update.coupon');


 //Newsletters====
 Route::get('admin/newsletter', 'Admin\CouponController@newsletter')->name('admin.newsletters');
 Route::get('delete/newsletter/{id}', 'Admin\CouponController@deletenewsletter');

 //Products=====
 Route::get('admin/products', 'Admin\ProductController@index')->name('products');
 Route::get('admin/add/product', 'Admin\ProductController@create')->name('add.product');
 Route::post('admin/store/product', 'Admin\ProductController@storeproduct')->name('store.product');
 Route::get('admin/delete/product/{id}', 'Admin\ProductController@deleteproduct')->name('delete.product');
 Route::get('admin/edit/product/{id}', 'Admin\ProductController@editproduct')->name('edit.product'); 
 Route::post('admin/update/product/{id}', 'Admin\ProductController@updateproduct')->name('update.product');

 //get sub cate by ajax
Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');











//Frontend====


//Newsletter===
 Route::post('store/newsletter', 'FrontController@storeNewsletter')->name('store.newsletter');


