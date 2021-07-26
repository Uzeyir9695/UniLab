<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentsGroup extends Model
{
    protected $table = 'students_group';

    public $fillable = ['group_id', 'student_id', 'subject_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function group() 
    {
        return $this->belongsTo(Group::class, 'students_group_id', 'id');
    }
}
