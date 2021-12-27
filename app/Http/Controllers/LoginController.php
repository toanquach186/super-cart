<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function onLogin(Request $request)
    {
        $validator = $request->validate( [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where("email",$request->email)->get();
        if(Auth::attempt($validator)){
            return Response()->json(array("success"=>1,"data"=>$user[0]));
        }
        return response()->json(['error'=>"Login không thành công!"], 401);
    }

    public function onRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $postArray = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'remember_token' => $request->token,
            'created_at'=> Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
        ];

        $user = User::create($postArray);
        return Response()->json(array("success"=> 1,"data"=>$postArray ));

    }
    public function check(): int|string|null
    {
        $id = Auth::id();
        return $id;
    }
}
