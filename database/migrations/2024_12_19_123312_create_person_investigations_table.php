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
        Schema::create('person_investigations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('summary');
            $table->foreignId('persons_investigations')->constained();
            $table->text('conclusion');
            $table->dateTime('submission_date', precision: 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_investigations');
    }
};
