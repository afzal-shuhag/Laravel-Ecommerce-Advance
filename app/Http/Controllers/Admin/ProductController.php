<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{


    public function __construct() 
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $product = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
    }

    public function create()
    {
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        return view('admin.product.create',compact('category','brand'));
    }

    //Ajax Subcategory select

    public function GetSubcat($category_id)
    {
        $cat = DB::table("subcategories")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }

    public function storeproduct(Request $request)
    {
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['product_name'] = $request->product_name;
        $data['brand_id'] = $request->brand_id;
        $data['product_code'] = $request->product_code;
        $data['quantity'] = $request->quantity;
        $data['product_details'] = $request->product_details;
        $data['product_color'] = $request->product_color;
        $data['product_size'] = $request->product_size;
        $data['selling_price'] = $request->selling_price;
        //$data['discount_price'] = $request->discount_price;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['trend'] = $request->trend;
        $data['status'] = '1';

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if($image_one && $image_two && $image_three){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
                $data['image_one']='public/media/product/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
                $data['image_two']='public/media/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
                $data['image_three']='public/media/product/'.$image_three_name; 
                
                $product=DB::table('products')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }



    }



}


        // if ($image_one && $image_two) {
            
        //     $image_one = hexdec(uniqid());
        //     $image_two = hexdec(uniqid());

        //     $image_one_name = $image_one.'.'.$image_one->getClientOriginalExtension();
        //     $image_two_name = $image_two.'.'.$image_two->getClientOriginalExtension();
        //     $upload_path = "public/media/product/";

        //     $success = $image_one->move($upload_path,$image_one_name);
        //     $success = $image_two->move($upload_path,$image_two_name);

        //     $data['image_one'] = $image_one_name;
        //     $data['image_two'] = $image_two_name;

        //     $insert = DB::table('products')->insert($data);
        //                 $notification = array(

        //                 'messege' => 'Product stored Successfully!!',
        //                 'alert-type' => 'success'

        //                  );
        //                 return Redirect()->back()->with($notification);

        // }