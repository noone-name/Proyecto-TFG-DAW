<?php

namespace App\Http\Controllers;

use App\Models\AppoimentCalendar;
use Illuminate\Http\Request;

class AppoimentCalendarController extends Controller
{

    public function index()
    {
        return view('lawyer.appoiments.index');
    }

}
