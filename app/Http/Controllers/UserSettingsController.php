<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSettingsRequest;
use App\Http\Resources\UserSettingsResource;
use App\Models\UserSettings;

class UserSettingsController extends Controller
{
    public function index()
    {
        return UserSettingsResource::collection(UserSettings::all());
    }

    public function store(UserSettingsRequest $request)
    {
        return new UserSettingsResource(UserSettings::create($request->validated()));
    }

    public function show(UserSettings $userSettings)
    {
        return new UserSettingsResource($userSettings);
    }

    public function update(UserSettingsRequest $request, UserSettings $userSettings)
    {
        $userSettings->update($request->validated());

        return new UserSettingsResource($userSettings);
    }

    public function destroy(UserSettings $userSettings)
    {
        $userSettings->delete();

        return response()->json();
    }
}
