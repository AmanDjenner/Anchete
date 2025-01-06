<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Creează tabela dacă lipsește
        if (!Schema::hasTable('role_permissions')) {
            Schema::create('role_permissions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('role_id')->constrained()->onDelete('cascade');
                $table->foreignId('permission_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        } else {
            // Adaugă coloane dacă tabela există
            Schema::table('role_permissions', function (Blueprint $table) {
                if (!Schema::hasColumn('role_permissions', 'role_id')) {
                    $table->foreignId('role_id')->constrained()->onDelete('cascade');
                }

                if (!Schema::hasColumn('role_permissions', 'permission_id')) {
                    $table->foreignId('permission_id')->constrained()->onDelete('cascade');
                }
            });
        }
    }

    public function down(): void
    {
        // Elimină tabela complet dacă a fost creată
        Schema::dropIfExists('role_permissions');
    }
};
