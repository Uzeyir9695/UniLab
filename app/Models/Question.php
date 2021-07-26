<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    protected $casts = [
        'image' => 'array',
        'video' => 'array'
    ];
    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    
    public function test() 
    {
        return $this->hasMany(Test::class);
    }

    public function test_question()
    {
        return $this->hasMany(TestQuestion::class);
    }
}
