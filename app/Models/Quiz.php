<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'active',
        'time_limit',
        'score',
        'has_correct_answers',
        'category_id',
        'visibility',
        'randomize'
    ];

    protected $attributes = [
        'visibility' => 'public',  // Default visibility
        'randomize' => false,      // Default randomize value
    ];

    // model logic
    public function isSurvey(): bool
    {
        return !$this->has_correct_answers;
    }

    // Relationships
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
