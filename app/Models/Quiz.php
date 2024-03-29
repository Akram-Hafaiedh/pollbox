<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_finished',
        'user_id',
        'title',
        'description',
        'active',
        // 'time_limit', //removed
        'image_path',
        'start_date',
        'end_date',
        'bg_color',
        'text_color',
        'language',
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

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function selectedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'invitations', 'quiz_id', 'recipient_id')
            ->withPivot('code', 'pending');
        // ->wherePivot('pending', false); // Filter out pending invitations
    }
    // public function invitations() : HasMany
    // {
    //     return $this->hasMany(Invitation::class);
    // }

    public function userquizstates(): HasMany
    {
        return $this->hasMany(UserQuizState::class, 'quiz_id');
    }
}
