<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->text('details');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->string('location');
            $table->string('is_successful');
            $table->text('error_message');
            $table->text('notes');
            $table->string('audit_type');
            $table->foreignId('user_id');
            $table->string('ralated_transaction_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
