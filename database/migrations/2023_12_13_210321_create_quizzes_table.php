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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_finished')->default(false); //added
            $table->string('text-color')->nullable();
            $table->string('bg-color')->nullable();
            $table->string('language')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->enum('type', ['quiz', 'survey', 'test'])->default('survey')->nullable();


            $table->enum('visibility', ['public', 'private', 'restricted'])->default('public');
            $table->boolean('randomize')->default(false);

            // $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');
            // $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
