<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizState extends Model
{
    use HasFactory;

    protected $table = 'user_quiz_states';

    protected $fillable = ['user_id', 'quiz_id', 'state'];


}
