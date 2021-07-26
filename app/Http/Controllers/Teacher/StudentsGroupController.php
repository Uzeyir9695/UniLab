<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\StudentsGroup;
use App\Http\Requests\Teacher\StudentsGroups\StudentsGroupRequest;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentsGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('teacher.groups.view',['group' => StudentsGroup::with('student')->where('group_id', $id)->get(), 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsGroupRequest $request, $id)
    {
        if($request->filled('email')) {
            if($this->checkIfStudentExsist($request, 'email')) {
                $studentId = Student::where('email', $request->email)->firstOrFail()->id;
                $group = Group::find($id);
                StudentsGroup::create([
                    'group_id' => $group->id,
                    'student_id' => $studentId,
                    'subject_id' => $group->subject_id
                ]);
            return redirect(Route('teacher.students-groups.index', $id));
            }
        };
        if($request->filled('id')) {
            if($this->checkIfStudentExsist($request, 'id')) {
                $group = Group::find($id);
                StudentsGroup::create([
                    'group_id' => $group->id,
                    'student_id' => $request->id,
                    'subject_id' => $group->subject_id
                ]);
            return redirect(Route('teacher.students-groups.index', $id));
            }
        };
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->find($id, StudentsGroup::class)->firstOrFail();
        $student->delete();
        return redirect(Route('teacher.students-groups.index', $student->group_id));
    }

    private function checkIfStudentExsist( $request, $param) 
    {
        return Student::where("$param" , $request->$param)->first() ? true : abort(404);
    }
}
