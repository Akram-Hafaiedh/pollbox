<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_response',
        // 'correct',
        // 'explanation',
        'quiz_id',
        'user_id',
        'question_id',
        'option_id',
        'likert_scale',
        'answer',
        'ranking',
    ];

    protected $hidden =['quiz_id', 'user_id', 'question_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public static function totalParticipants(Quiz $quiz): Number
    {
        return static::where('quiz_id', '=', $quiz->id)->distinct('user_id')->count('user_id');
    }
}
