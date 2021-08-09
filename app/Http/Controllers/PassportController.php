<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PassportController extends Controller
{
    public function register(Request $request)
    {  
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
      
       $token = $user->createToken('AuthToken')->accessToken;
 
        return response()->json(['user'=>$user->name,'token' => $token], 201);
    }

     public function login(Request $request)
     {
         $credentials = [
             'email' => $request->email,
             'password' => $request->password
         ];
  
         if (auth()->attempt($credentials)) {
             $token = auth()->user()->createToken('TutsForWeb')->accessToken;
             return response()->json(['token' => $token], 200);
         } else {
             return response()->json(['error' => 'UnAuthorised'], 401);
         }
     }
 
     public function details()
     {
         return response()->json(['user' => auth()->user()], 200);
     }
 
     public function logout(Request $request)
     {
         $value = $request->bearerToken();
         $id = (new Parser())->parse($value)->getHeader('jti');
         $token = $request->user()->tokens->find($id);
         $token->revoke();
         return response('You have been successfully logged out!', 200);
     }
}

