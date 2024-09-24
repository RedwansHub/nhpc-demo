<?php

namespace App\Http\Controllers;

use App\Http\Requests\KycRequest;
use App\Http\Resources\KycResource;
use App\Models\Kyc;

class KycController extends Controller
{
    public function index()
    {
        return KycResource::collection(Kyc::all());
    }

    public function store(KycRequest $request)
    {
        return new KycResource(Kyc::create($request->validated()));
    }

    public function show(Kyc $kyc)
    {
        return new KycResource($kyc);
    }

    public function update(KycRequest $request, Kyc $kyc)
    {
        $kyc->update($request->validated());

        return new KycResource($kyc);
    }

    public function destroy(Kyc $kyc)
    {
        $kyc->delete();

        return response()->json();
    }
}
