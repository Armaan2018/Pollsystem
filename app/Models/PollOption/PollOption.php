<?php

namespace App\Models\PollOption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;
    protected $primaryKey = 'poll_option_id';
    protected $table = 'poll_options';
    protected $guraded = [];
}
