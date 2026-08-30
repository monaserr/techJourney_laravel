<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       
        if (Schema::hasColumn('event_registrations', 'user_id')
            && Schema::hasColumn('event_registrations', 'event_id')
            && Schema::hasColumn('event_registrations', 'registered_at')) {
            return;
        }

        Schema::table('event_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('event_registrations', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('event_registrations', 'event_id')) {
                $table->foreignId('event_id')->after('user_id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('event_registrations', 'registered_at')) {
                $table->timestamp('registered_at')->nullable()->after('event_id');
            }
        });
    }

    public function down(): void
    {
       
    }
};