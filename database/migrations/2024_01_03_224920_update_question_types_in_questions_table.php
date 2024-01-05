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
        Schema::table('questions', function (Blueprint $table) {
            $table->enum('type', [
                'multiple_choice',
                'single_choice',
                'numeric',
                'ranking',
                'feedback',
                'dropdown',
                'likert_scale',
                'slider',
                'date',
                'file_upload',
                'text'
            ])->change();
            $table->dropColumn('difficulty');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->enum('type', [
                'multiple_choice',
                'single_choice',
                'numeric',
                'ranking',
                'feedback'
            ])->change();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy');
        });
    }
};
