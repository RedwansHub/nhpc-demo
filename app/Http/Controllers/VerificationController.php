<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerificationRequest;
use App\Http\Resources\VerificationResource;
use App\Models\Verification;

class VerificationController extends Controller
{
    public function index()
    {
        return VerificationResource::collection(Verification::all());
    }

    public function store(VerificationRequest $request)
    {
        return new VerificationResource(Verification::create($request->validated()));
    }

    public function show(Verification $verification)
    {
        return new VerificationResource($verification);
    }

    public function update(VerificationRequest $request, Verification $verification)
    {
        $verification->update($request->validated());

        return new VerificationResource($verification);
    }

    public function destroy(Verification $verification)
    {
        $verification->delete();

        return response()->json();
    }
}
