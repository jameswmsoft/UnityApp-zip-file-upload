<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Chumper\Zipper\Facades\Zipper;

class HomeController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function index(){
        $files = Upload::all();

        return view('home',['files'=>$files]);
    }

    public function do_login(Request $request){
        $userdata = array(
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        );

        if (Auth::attempt($userdata)) {
            return redirect('index');
        }
        else{
            return redirect('login');
        }
    }

    public function do_register(Request $request){

        $user = new User();

        $user->username = $request->input('username');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->file_pass = $request->input('password');
        $user->remember_token = $request->input('_token');

        $user->save();

        return redirect('login');
    }

    public function logout(){
        Auth::logout(); // log the user out of our application
        return redirect('login');
    }

    public function file_upload(Request $request){

        $fileOriginalName = $request->file->getClientOriginalName();
        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('/uploads'), $fileName);
        $Path = public_path('uploads/'.$fileName);
        $logFiles = Zipper::make($Path)->listFiles();
        Zipper::make($Path)->extractTo('Appdividend');

        $logfilefirst = $logFiles[0];
        $logpaths = explode('/', $logfilefirst);

        $upload = new Upload();
        $upload->filename = $request->input('filename');
        $upload->filepath = 'Appdividend/'.$logpaths[0].'/';
        $upload->userid = Auth::user()->id;
        $upload->file_pass = $request->input('password');
        $upload->save();


        return redirect('index');
    }

    public function file_delete($id){
        Upload::find($id)->delete();

        return redirect('index');
    }

    public function file_edit($id){
        $datas = Upload::where('id',$id)->get();

        return view('edit',['datas'=>$datas]);
    }

    public function do_edit_file(Request $request,$id){
        $password = $request->input('password');
        $filename = $request->input('filename');

        Upload::where('id',$id)->update(['filename'=>$filename,'file_pass'=>$password]);

        return redirect('index');
    }
}


