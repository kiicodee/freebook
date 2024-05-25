<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Register(Request $request) {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'username' => 'required',
           'password' => 'required',
           'role' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal registrasi',
                'data' => $validator->errors(),
            ], 422);
        }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);

            $success['name']= $user->name;
            $success['username']= $user->username;
            $success['role']= $user->role;

        return response()->json([
            'success' => true,
            'pesan' => 'Register Berhasil',
            'data' => $success
        ], 200);

        
    }

    public function Login(Request $request) {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            
            $auth = Auth::user();
            $success['token'] =$auth->CreateToken('auth_token')->plainTextToken;
            $success['name'] =$auth->name;
            $success['role'] =$auth->role;

            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'data' => $success
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal',
                'data' => 'Unauthorized'
            ], 401);
        }
    }
}
