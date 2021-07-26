<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $guarded = [];

    public function test()
    {
        return $this->hasMany(Test::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
