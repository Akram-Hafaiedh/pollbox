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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cascadeOnDelete();
            $table->foreignId('question_id')->cascadeOnDelete();
            $table->foreignId('quiz_id')->cascadeOnDelete();
            $table->foreignId('option_id')->nullable(); // For single and multiple-choice questions
            $table->unsignedTinyInteger('likert_scale')->nullable();
            $table->unsignedTinyInteger('ranking')->nullable();
            $table->text('answer')->nullable();

            // $table->boolean('correct')->default(false); // moved to options
            // $table->text('explanation')->nullable(); // moved to options
            $table->timestamps();

            $table->unique(['user_id', 'question_id', 'quiz_id', 'option_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
