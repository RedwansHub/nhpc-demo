<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutionRequest;
use App\Http\Resources\InstitutionResource;
use App\Models\Institution;

class InstitutionController extends Controller
{
    public function index()
    {
        return InstitutionResource::collection(Institution::all());
    }

    public function store(InstitutionRequest $request)
    {
        return new InstitutionResource(Institution::create($request->validated()));
    }

    public function show(Institution $institution)
    {
        return new InstitutionResource($institution);
    }

    public function update(InstitutionRequest $request, Institution $institution)
    {
        $institution->update($request->validated());

        return new InstitutionResource($institution);
    }

    public function destroy(Institution $institution)
    {
        $institution->delete();

        return response()->json();
    }
}
