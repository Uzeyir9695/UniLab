<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $guarded = [];
    
    public function subject() 
    {
        return $this->belongsTo(Subject::class);
    }

    public function test() 
    {
        return $this->hasMany(Test::class);
    }

    public function test_group()
    {
        return $this->hasMany(TestGroup::class);
    }
    
}
