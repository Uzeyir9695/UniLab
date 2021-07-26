<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{
    protected $guarded = [];
    
    public function test()
    {
        return $this->hasMany(Test::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
