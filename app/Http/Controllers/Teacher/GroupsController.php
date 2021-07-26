<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Group\GroupRequest;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;


class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.groups.index', ['groups' => Group::where('teacher_id', Auth::user()->id)
                                                                                ->with('subject')
                                                                                ->latest()
                                                                                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.groups.create', ['groups' => Group::with('subject')
                                ->where('teacher_id', Auth::user()->id)
                                ->get()  
                                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        Group::create([
            'teacher_id' => Auth::user()->id,
            'subject_id' => $request->subject_id,
            'name'       => $request->name  
        ]);
        return redirect(Route('teacher.groups.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(Route('teacher.students-groups.index', $id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('teacher.groups.edit', ['group' => Group::where('id',$id)->firstOrFail(),
                                            'subjects' => Subject::where('teacher_id',Auth::user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        $group = Group::where('id',$id)->firstOrFail();
        $group->update([
            'name' => $request->name,
            'subject_id' => $request->subject_id
        ]);
        return redirect(Route('teacher.groups.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = $this->find($id, Group::class);
        $group->delete();
        return redirect(Route('teacher.groups.index'));
    }
    
}
