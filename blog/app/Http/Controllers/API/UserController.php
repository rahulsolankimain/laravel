<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class UserController extends Controller
{
    //
    public $successStatus = 200;

    function register(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success'=>$success],$this->successStatus);
    }

    function login()
    {
        if(auth::attempt(['email' => request('email') , 'password' => request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success],$this-> successStatus);
        }
        else
        {
            return response()->json(['error' => 'Unauthorized'], 401 );
        }
    }

    function detail()
    {
        $user = Auth::user();
        return response()->json(['success'=>$user],$this->successStatus);
    }
}
