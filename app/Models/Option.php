<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    
    protected $fillable = [
        'question_id','options', 'correct_answer'
    ];

    protected $casts = [
        'options' => 'array',
        'correct_answer' => 'array'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}
