<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrgUnitStoreRequest;
use App\Http\Requests\OrgUnitUpdateRequest;
use App\Models\OrgUnit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrgUnitController extends Controller
{
    public function index(Request $request): Response
    {
        $orgUnits = OrgUnit::all();

        return view('orgUnit.index', compact('orgUnits'));
    }

    public function create(Request $request): Response
    {
        return view('orgUnit.create');
    }

    public function store(OrgUnitStoreRequest $request): Response
    {
        $orgUnit = OrgUnit::create($request->validated());

        $request->session()->flash('orgUnit.id', $orgUnit->id);

        return redirect()->route('orgUnits.index');
    }

    public function show(Request $request, OrgUnit $orgUnit): Response
    {
        return view('orgUnit.show', compact('orgUnit'));
    }

    public function edit(Request $request, OrgUnit $orgUnit): Response
    {
        return view('orgUnit.edit', compact('orgUnit'));
    }

    public function update(OrgUnitUpdateRequest $request, OrgUnit $orgUnit): Response
    {
        $orgUnit->update($request->validated());

        $request->session()->flash('orgUnit.id', $orgUnit->id);

        return redirect()->route('orgUnits.index');
    }

    public function destroy(Request $request, OrgUnit $orgUnit): Response
    {
        $orgUnit->delete();

        return redirect()->route('orgUnits.index');
    }
}
