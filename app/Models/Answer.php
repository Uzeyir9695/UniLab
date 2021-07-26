<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /* protected $casts = [
        'answer' => 'array',
    ]; */

    protected $fillable = [
        'answer', 'question_id', 'option_id',
    ];

    public function options()
    {
        return $this->belongsTo(Option::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}

