<?php

namespace App\Http\Controllers;

use App\Models\AppoimentCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoimentCalendarController extends Controller
{

    public function index()
    {

        if( Auth::user()->hasRole('Cliente') ){
            return view('client.appoiments.index');
        }

        if( Auth::user()->hasRole('Abogado') ){
            return view('lawyer.appoiments.index');
        }
    }

}
