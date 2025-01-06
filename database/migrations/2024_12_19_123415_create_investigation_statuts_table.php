<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('investigation_statuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investigation_id')->constained();
            $table->enum('status', ['în proces', 'remis']);
            $table->string('assigned_to');
            $table->dateTime('committee_date', precision: 0);
            $table->foreignId('committee_member_id')->constrained();
            $table->text('ordin_file_path');
            $table->text('process_verbal_file_path');
            $table->foreignId('penaltie_id')->constrained();
            $table->foreignId('investigation_penaltie_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigation_statuts');
    }
};
