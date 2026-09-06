<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;

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



    # This function receives a category name from a form,
    # attaches it to the logged-in admin, saves it to the database,
    # shows a success message, and then redirects back to the categories page.

    function addCategory(Request $request){
        // return $request;
        $admin =  Session::get('admin');
    
        $category = new Category;
        $category->name = $request->category;
        $category->creator = $admin->name;    
        
        if($category->save()) {
            session::flash('category',"Category ". $request->category. " added successfully");
        }

        return redirect("admin-categories");
        }









}


