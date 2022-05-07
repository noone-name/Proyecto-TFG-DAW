<?php

namespace App\Http\Controllers\Lawyer;

use App\Models\FullCalendarEvents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Fascades\Validator;

class FullCalendarEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = array();
        $citas = FullCalendarEvents::all();
        foreach($citas as $cita) {

            $events[] = [
                'id'   => $cita->id,
                'title' => $cita->title,
                'start' => $cita->start_date,
                'end' => $cita->end_date,
            ];
        }
        return view('lawyer.calendar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FullCalendarEvents  $fullCalendarEvents
     * @return \Illuminate\Http\Response
     */
    public function show(FullCalendarEvents $fullCalendarEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FullCalendarEvents  $fullCalendarEvents
     * @return \Illuminate\Http\Response
     */
    public function edit(FullCalendarEvents $fullCalendarEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FullCalendarEvents  $fullCalendarEvents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FullCalendarEvents $fullCalendarEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FullCalendarEvents  $fullCalendarEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy(FullCalendarEvents $fullCalendarEvents)
    {
        //
    }
}
