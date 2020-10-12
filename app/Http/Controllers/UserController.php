<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function store(request $request)
    {
        $validation = $request->validate([
        /*$this->validate($request, [*/
            'fname'       =>      'required',
            'lname'       =>       'required',
            'email'       =>      'required   | email |unique:user',
            'phone'       =>       'required  | min:10',
            'password'    =>       'required  | min:8'
        ],
        [
            'fname.required'     =>     'First Name Required',
            'lname.required'     =>     'Last Name Required',
            'email.required'     =>     'Email  Required',
            'phone.required'     =>     'Phone Number Required',
            'password.required'  =>     'Password Required'
       ]
    );
              /*print_r($validation);*/

        $fname=$request->input('fname');
        $lname=$request->input('lname');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $password=$request->input('password');
        $data = DB::insert('insert into user(id,fname,lname,email,phone,password) values(?,?,?,?,?,?)',[null,$fname,$lname,$email,$phone,$password]);

        if($data)
        {
            dd($data);
            die;
            return view('login');
        }
        else
        {
            echo "Wrong Register Details";
        }
    }
    public function logs(request $request)
    {
        $validation = $request->validate([


                'email'       =>      'required',
                'password'    =>       'required'
            ],
            [

                'email.required'     =>     'Email  Required',
                'password.required'  =>     'Password Required'
           ]
        );

        $email=$request->input('email');
        $password=$request->input('password');
        $data=DB::select('select id from user where email=? and password=?',[$email,$password]);
        if(count($data))
        {
            return view('success');
        }
        else
        {
            return redirect('login')->with('success','Wrong Username or Password');
            /*echo "Wrong Username or Password";*/
        }
    }

    public function logout()
    {

     Auth::logout();
     return redirect('login');
    }
}
