<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvocesCaseController extends Controller
{
    public function index()
    {
        return view('admin.invoces.index');

    }
}
