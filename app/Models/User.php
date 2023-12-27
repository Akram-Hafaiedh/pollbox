<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'mobile_number',
        'admin_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationships

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }


    // public function invitations(): HasMany
    // {
    //     return $this->hasMany(Invitation::class, 'recipient_id')
    //         ->orWhere('sender_id', $this->id);
    // }



    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function receivedInvitation(): hasMany
    {
        return $this->hasMany(Invitation::class, 'recipient_id');
    }

    public function sentInvitation(): HasMany
    {
        return $this->hasMany(Invitation::class, 'sender_id');
    }
}
