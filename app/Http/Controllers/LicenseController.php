<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseRequest;
use App\Http\Resources\LicenseResource;
use App\Models\License;

class LicenseController extends Controller
{
    public function index()
    {
        return LicenseResource::collection(License::all());
    }

    public function store(LicenseRequest $request)
    {
        return new LicenseResource(License::create($request->validated()));
    }

    public function show(License $license)
    {
        return new LicenseResource($license);
    }

    public function update(LicenseRequest $request, License $license)
    {
        $license->update($request->validated());

        return new LicenseResource($license);
    }

    public function destroy(License $license)
    {
        $license->delete();

        return response()->json();
    }
}
