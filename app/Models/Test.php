<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(TestGroup::class);
    }

    public function question()
    {
        return $this->belongsTo(TestQuestion::class);
    }
}