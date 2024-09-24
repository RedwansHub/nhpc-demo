<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuditLogRequest;
use App\Http\Resources\AuditLogResource;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function index()
    {
        return AuditLogResource::collection(AuditLog::all());
    }

    public function store(AuditLogRequest $request)
    {
        return new AuditLogResource(AuditLog::create($request->validated()));
    }

    public function show(AuditLog $auditLog)
    {
        return new AuditLogResource($auditLog);
    }

    public function update(AuditLogRequest $request, AuditLog $auditLog)
    {
        $auditLog->update($request->validated());

        return new AuditLogResource($auditLog);
    }

    public function destroy(AuditLog $auditLog)
    {
        $auditLog->delete();

        return response()->json();
    }
}
