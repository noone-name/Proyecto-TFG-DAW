<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LawyerIndexController extends Controller
{
    public function index()
    {
        return view('lawyer.index');

    }
}
