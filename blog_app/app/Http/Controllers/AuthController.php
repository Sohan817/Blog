<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
class AuthController extends Controller
{
    function login_view(){
        return view('auth.login');
    }
    function login(Request $request){
        //validate
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        //login code
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        return redirect('login')->withError('Login details are not valid');
        dd($request->all());
    }
    function register(Request $request){
        //validate
        $request->validate([
            'email'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required|confirmed',
            'password'=>'required'
        ]);
        //save in users table
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password)
        ]);
        // login user here 
        
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }
        return redirect('register')->withError('Error in registration');
    }
    function register_view(){
        return view('auth.register');
    }
    public function home(){
        return view('home');
    }
    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }
    public function blogSave(Request $req){
        $data=new Blog;
        $data->name=$req->name;
        $data->blog=$req->blog;
        $data->save();
        return redirect('blog');
    }
    //Show list
    public function listBlog(){
        $data=Blog::all();
        return view('blog',['blogs'=>$data]);
    }
    //Delete Data
    public function delete($id){
        $data=Blog::find($id);
        $data->delete();
        return redirect('blog');
    }
        //Show data
        function showBlog($id){
            $data=Blog::find($id);
            return view('edit',['blogs'=>$data]);
        }
        // Update data
        function update(Request $req){
            $data=Blog::find($req->id);
            $data->name=$req->name;
            $data->blog=$req->blog;
            $data->save();
            return redirect('blog');
        }
}
