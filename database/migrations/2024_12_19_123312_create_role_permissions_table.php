<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            // Adaugă constrângerea doar dacă lipsește
            if (!Schema::hasColumn('role_permissions', 'role_id')) {
                $table->foreignId('role_id')->constrained()->onDelete('cascade');
            }

            if (!Schema::hasColumn('role_permissions', 'permission_id')) {
                $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            // Elimină constrângerile dacă există
            $table->dropForeign(['role_id']);
            $table->dropForeign(['permission_id']);
        });
    }


};
