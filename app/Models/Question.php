<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'text',
        'quiz_id',
        'content',
        'type',
        'difficulty',
        'order',
        'required',
        'image_path',
        'video_url',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
