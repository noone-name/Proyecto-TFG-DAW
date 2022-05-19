<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class RedirectController extends Controller
{

    public function index()
    {

        if(Auth::user()){

            if( Auth::user()->hasRole('admin') ){
                return view('admin.index');
            }

            if( Auth::user()->hasRole('Cliente') ){
                $user = Auth::user();
                return view('client.index',compact('user'));
            }

            if( Auth::user()->hasRole('Abogado') ){
                $user = Auth::user();
                return view('lawyer.index',compact('user'));
            }
        }

        return view('/');
    }
}
