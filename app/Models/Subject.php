<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['name','teacher_id'];

    public function group()
    {
        return $this->hasMany(Group::class);
    }
}
