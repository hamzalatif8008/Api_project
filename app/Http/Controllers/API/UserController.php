<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function users()
    {
        $users = User::all();
        if (!count($users)) {
            return response()->json([
                'status_code' => 500,
                'users' => $users,
              ]);
           
        }
       
        return response()->json([
          'status_code' => 200,
          'users' => $users,
        ]);
    }
    
}
