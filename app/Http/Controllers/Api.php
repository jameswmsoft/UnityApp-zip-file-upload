<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Access_token;

class Api extends Controller
{
    public function login(Request $request){
        $userdata = array(
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        );

        if (Auth::attempt($userdata)) {
            $token = bin2hex(openssl_random_pseudo_bytes(64));
            $access_token = new Access_token();

            $access_token->user_id = Auth::user()->id;
            $access_token->token = $token;

            $access_token->save();

            return response()->json([
                'status' => 'success',
                'message'=>'Successfully login',
                'data' => $token
            ]);
        }
        else{
            return response()->json([
                'message' => 'Unauthorized','status'=>'false'
            ], 401);
        }
    }

    public function register(Request $request){
        $user = new User();

        $user->username = $request->input('username');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->file_pass = $request->input('password');
        $user->remember_token = $request->input('_token');

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!','status'=>'true'
        ], 201);
    }

    public function project_list(){
        $data = Upload::all();
        return response()->json([
            'status' => 'success',
            'message'=>'Successfully get the Project List',
            'data' => $data
        ]);
    }

    public function project_login(Request $request,$id){
        $filename = $request->input('filename');
        $password = $request->input('password');

        $data = Upload::where('id',$id)->where('filename',$filename)->where('file_pass',$password)->count();
        if($data>0){
            $fileData = Upload::where('id',$id)->get();
            return response()->json([
                'status' => 'success',
                'message'=>'Successfully get the Project Item',
                'data' => $fileData
            ]);
        }else{
            return response()->json([
                'status' => 'false',
                'message'=>'Unauthorized'
            ]);
        }
    }
}
