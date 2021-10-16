<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Coupon;
use App\Model\Newsletter;

class CouponController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:admin');
    }

    public function Coupon()
    {
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon',compact('coupon'));
    }

    public function storecoupon(Request $request)
    {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);

        $notification = array(

            'messege' => 'Coupon added Successfully!!',
            'alert-type' => 'success'

        );
        return Redirect()->back()->with($notification);
    }

    public function deletecoupon($id)
    {
        // $delete = DB::table('coupons')->where('id',$id)->delete();

        $delete = Coupon::find($id);
        $delete->delete();

        if($delete){
             $notification = array(

            'messege' => 'Coupon deleted Successfully!!',
            'alert-type' => 'success'

             );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(

            'messege' => 'Something went wrong!!',
            'alert-type' => 'danger'

             );
            return Redirect()->back()->with($notification);
        }
    }

    public function editcoupon($id)
    {
        $coupon = DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }

    public function updatecoupon(Request $request,$id)
    {
        $coupon = Coupon::where('id',$id)->first();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $save = $coupon->save();

        if($save){
            $notification = array(

            'messege' => 'Coupon updated Successfully!!',
            'alert-type' => 'success'

             );
            return Redirect()->route('admin.coupon')->with($notification);
        }

    }

    public function newsletter()
    {
        $newsletter = DB::table('newsletters')->get();
        return view('admin.coupon.newsletter',compact('newsletter'));
    }

    public function deletenewsletter($id)
    {
        $sub = Newsletter::find($id);
        $delete = $sub->delete();
         if($delete){
            $notification = array(

            'messege' => 'Subscription deleted Successfully!!',
            'alert-type' => 'success'

             );
            return Redirect()->back()->with($notification);
        }
    }
    
}
