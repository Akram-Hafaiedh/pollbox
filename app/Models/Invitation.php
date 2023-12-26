<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'sender_id',
        'recipient_id',
        'pending',
        'code'
    ];

    // function to change the invitation pending to false (default:true)
    public function accept(): void
    {
        $this->update(['pending' => false]);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class,'recipient_id');
    }

    // public function invitations(): HasMany
    // {
    //     return $this->hasMany(Invitation::class);
    // }
}
