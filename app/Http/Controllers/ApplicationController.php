<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        return ApplicationResource::collection(Application::all());
    }

    public function store(ApplicationRequest $request)
    {
        return new ApplicationResource(Application::create($request->validated()));
    }

    public function show(Application $application)
    {
        return new ApplicationResource($application);
    }

    public function update(ApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());

        return new ApplicationResource($application);
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return response()->json();
    }
}
