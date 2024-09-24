<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        return LanguageResource::collection(Language::all());
    }

    public function store(LanguageRequest $request)
    {
        return new LanguageResource(Language::create($request->validated()));
    }

    public function show(Language $language)
    {
        return new LanguageResource($language);
    }

    public function update(LanguageRequest $request, Language $language)
    {
        $language->update($request->validated());

        return new LanguageResource($language);
    }

    public function destroy(Language $language)
    {
        $language->delete();

        return response()->json();
    }
}
