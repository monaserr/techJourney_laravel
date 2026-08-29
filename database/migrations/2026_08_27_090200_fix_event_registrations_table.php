<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->after('user_id')->constrained()->cascadeOnDelete();
            $table->timestamp('registered_at')->nullable()->after('event_id');

            $table->unique(['user_id', 'event_id']);
        });
    }

    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'event_id']);
            $table->dropConstrainedForeignId('event_id');
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn('registered_at');
        });
    }
};