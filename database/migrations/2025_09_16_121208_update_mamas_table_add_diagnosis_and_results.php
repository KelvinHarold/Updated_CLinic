<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mamas', function (Blueprint $table) {
            // Rename medical_history to diagnosis
            $table->renameColumn('medical_history', 'diagnosis');

            // Add new column results
            $table->string('results')->nullable()->after('diagnosis');
        });
    }

    public function down(): void
    {
        Schema::table('mamas', function (Blueprint $table) {
            // Revert changes
            $table->renameColumn('diagnosis', 'medical_history');
            $table->dropColumn('results');
        });
    }
};
