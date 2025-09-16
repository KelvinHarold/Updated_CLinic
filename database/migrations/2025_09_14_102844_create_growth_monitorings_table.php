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
        Schema::create('growth_monitorings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('child_id')->constrained('children')->onDelete('cascade');
    $table->decimal('weight',5,2);
    $table->decimal('height',5,2);
    $table->decimal('head_circumference',5,2);
    $table->date('date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('growth_monitorings');
    }
};
