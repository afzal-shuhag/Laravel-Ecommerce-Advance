<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Newsletter;
use DB;

class FrontController extends Controller
{


    public function storeNewsletter(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:newsletters|max:55',
        ]);

        $data = new Newsletter();
        $data->email = $request->email;
        $data->save();

        $notification=array(
                 'messege'=>'Subscription Done!!',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }


}
