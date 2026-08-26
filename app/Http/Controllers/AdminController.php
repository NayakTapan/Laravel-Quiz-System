<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminController extends Controller
{
    function login (Request $request){
        // return 'admin login';

        # validation 
        $validation = $request->validate([ 
            'name' => 'required',
            'password' => 'required',
        ]); 

        # check if the admin exists in the database
        $admin = Admin::where([
            ['name',"=",$request->name],
            ['password',"=",$request->password],
        ])->first();

        # return $admin->name;
        #     return view('admin',['name'=>$admin->name]);


        # if the admin exists, validate the user input
        if(!$admin){
            $validation = $request->validate([
                'user' => 'required',
            ],[
                'user.required' => 'User does not exist'
            ]);
        }

        #// return $admin->name;
        #//     return view('admin',['name'=>$admin->name]);

        // return view('admin',['name'=>$admin->name]);

        Session::put('admin',$admin);
        return redirect('dashboard'); 

    }


    function dashboard() {
        $admin =  Session::get('admin');
        
        if($admin){
            return view('admin',["name"=>$admin->name]);
        }else{
            
            return redirect('admin-login');
        }

        // return view('admin',["name"=>$admin->name]);
    }


    function categories(){
        $admin =  Session::get('admin');
        
        if($admin){
            return view('categories',["name"=>$admin->name]);
        }else{
            
            return redirect('admin-login');
        }
    }


    function logout(){
        Session::forget('admin');
        return redirect('admin-login');
    }   





}
