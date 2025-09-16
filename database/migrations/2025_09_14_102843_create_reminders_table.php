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
        Schema::create('reminders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('mama_id')->constrained('mamas')->onDelete('cascade');
    $table->foreignId('child_id')->nullable()->constrained('children')->onDelete('cascade');
    $table->string('title');
    $table->text('description')->nullable();
    $table->date('reminder_date');
    $table->enum('status',['pending','completed','cancelled'])->default('pending');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
