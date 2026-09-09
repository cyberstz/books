<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Sanctum 4 writes an "expires_at" column whenever a personal access
     * token is created, so the column has to exist on tables created by
     * the Sanctum 2 era migration.
     */
    public function up(): void
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->timestamp('expires_at')->nullable()->index()->after('last_used_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->dropIndex(['expires_at']);
            $table->dropColumn('expires_at');
        });
    }
};
