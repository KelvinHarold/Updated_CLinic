<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mamas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('id_number')->unique();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('pregnancy_stage')->nullable();
            $table->text('medical_history')->nullable();
            $table->enum('type',['pregnant','breastfeeding']);
            // visitor_id imeondolewa kabisa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mamas');
    }
};
