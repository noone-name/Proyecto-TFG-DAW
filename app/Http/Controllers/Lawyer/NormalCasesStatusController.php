<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\NormalCasesStatus;
use Illuminate\Http\Request;

class NormalCasesStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lawyer.normal_cases_status.index');


    }

}
