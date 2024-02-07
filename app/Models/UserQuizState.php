<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserQuizState extends Model
{
    use HasFactory;

    protected $table = 'user_quiz_states';

    protected $fillable = ['user_id', 'quiz_id', 'state'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
