<?php

namespace App\Http\Controllers\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Subject\SubjectRequest;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.subjects.index', [ 'subjects' => 
                                                    Subject::where('teacher_id', Auth::user()->id)
                                                    ->latest()
                                                    ->paginate(10) ]);
    }

    /**~
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        Subject::create([
            'name' => $request['subject'],
            'teacher_id' => Auth::user()->id
        ]);
        return redirect(Route('teacher.subjects.index'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('teacher.subjects.edit', ['subject' => $this->find($id, Subject::class)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id )
    {
        $subject = $this->find($id, Subject::class);
        $subject->update([
            'name' => $request['subject'],
            'teacher_id' => Auth::user()->id
        ]);
        return redirect(Route('teacher.subjects.index'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = $this->find($id, Subject::class);
        $subject->delete();
        return redirect(Route('teacher.subjects.index'));
    }
}
