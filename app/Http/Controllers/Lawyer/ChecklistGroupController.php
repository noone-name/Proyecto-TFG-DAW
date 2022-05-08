<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;

class ChecklistGroupController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lawyer.checklist_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChecklistGroupRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());
        return redirect()->route('lawyer.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  ChecklistGroup $ChecklistGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('lawyer.checklist_group.edit', compact('checklistGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreChecklistGroupRequest  $request
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());
        return redirect()->route('lawyer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();
        return redirect()->route('lawyer.index');
    }
}
