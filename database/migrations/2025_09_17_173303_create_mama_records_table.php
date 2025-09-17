<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('mama_records', function (Blueprint $table) {
        $table->id();
        $table->foreignId('mama_id')->constrained('mamas')->onDelete('cascade');
        $table->text('diagnosis');
        $table->text('results');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mama_records');
    }
};
