<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UsersController extends Controller
{
    
    public function index()
    {
        //$userLog = auth()->user();
        $users = DB::table('users')
        ->orderBy('name', 'asc')
        ->get();  
        return response()->json($users,200);
    }
    
    
    
    public function store(Request $request)
    {
        return User::create(collect([
            'name'=>$request->name
        ]));
    }

    
    public function show($id)
    {
        return  response()->json(['user'=>User::find($id)]);
    }

 
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
