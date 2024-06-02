<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() {
        return view('index');
    }

    function login(Request $request) {
        $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'username wajib diisi',
            'password.required' => 'password tidak sesuai'
        ]);


        $ilogin = [
            'username'=> $request->username,
            'password'=> $request->password
        ];

        if(Auth::attempt($ilogin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }elseif(Auth::user()->role == 'penulis') {
                return redirect('penulis');
            }elseif(Auth::user()->role == 'pembaca') {
                return redirect('pembaca');
            }
        } else {
            return redirect('')->withErrors('error username dan password tidak ditemukan')->withInput();
        }
    } 

    function logout() {
        Auth::logout();
        return redirect('');
    }
}
