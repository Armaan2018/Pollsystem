<?php

namespace App\Models\PollQuestion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'poll_question_id';
    protected $table = 'poll_questions';
    protected $guraded = [];
}
