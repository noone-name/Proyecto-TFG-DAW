<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvocesClientController extends Controller
{
    public function index()
    {
        return view('client.invoces.index');
    }

}
