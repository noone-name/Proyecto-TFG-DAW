<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Http\Requests\StoreChecklistRequest;

use App\Models\ChecklistGroup;
use App\Models\Checklist;


class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('lawyer.checklist.create', compact('checklistGroup'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChecklistRequest  $request
     * @param  ChecklistGroup  $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($request->validated());
        return redirect()->route('lawyer.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup,Checklist $checklist)
    {
        return view('lawyer.checklist.edit',compact('checklistGroup', 'checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreChecklistRequest $request
     * @param  ChecklistGroup $checklistGroup
     * @param  Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist )
    {
        $checklist->update($request->validated());
        return redirect()->route('lawyer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();

        return redirect()->route('lawyer.index');
    }
}
