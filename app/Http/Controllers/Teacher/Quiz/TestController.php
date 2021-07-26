<?php

namespace App\Http\Controllers\Teacher\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestGroup;
use App\Models\TestQuestion;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(10);/* ->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('d-M-y');
        }); */
        return view('teacher.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        $groups = Group::all();
        return view('teacher.tests.create', compact('questions', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $tests = Test::create([
            'title' => $request->title,
            'start' => date('Y-m-d H:i:s' , strtotime($request->start_test)),
            'end' => date('Y-m-d H:i:s' , strtotime($request->end_test)),
        ]);
        
        foreach($request->question as $group => $question)
        {
            $group_id = Group::where('name', $request->group[$group])->value('id');
            $question_id = Question::where('title', $question)->value('id');

            TestGroup::create([
                'test_id' => $tests->id,
                'group_id' => $group_id
            ]);

            TestQuestion::create([
                'test_id' => $tests->id,
                'question_id' => $question_id
            ]);
            
        }
        return back()->with('success', 'ურრააა! ტესტი შეიქმნა!');
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
        $tests = Test::findOrFail($id);
        $questions = Question::get();
        $groups = Group::get();
        $testGroups = TestGroup::get()->where('test_id', $id);
        $testQuestions = TestQuestion::where('test_id', $id)->get();
        return view("teacher.tests.edit", compact('tests', 'questions', 'groups', 'testGroups', 'testQuestions'));
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
        $tests = Test::findOrFail($id);
        // $test_groups = TestGroup::where('test_id', $id)->get();
        // $test_questions = TestQuestion::where('test_id', $id)->get();
        
        $tests->update([
            'title' => $request->title,
            'start' => date('Y-m-d H:i:s' , strtotime($request->start_test)),
            'end' => date('Y-m-d H:i:s' , strtotime($request->end_test)),
        ]);
        
        foreach($request->group as $group)
        {
            $group_id = Group::where('name', $group)->value('id');
            $groupArr[] = $group_id;
            TestGroup::updateOrCreate([
                'test_id' => $tests->id,
                'group_id' => $group_id 
            ]);
        }
        TestGroup::where('test_id', $id)->whereNotIn('group_id', $groupArr)->delete();
        

        foreach($request->question as $question)
        {
            $question_id = Question::where('title', $question)->value('id');
            $questionArr[] = $question_id;
            TestQuestion::updateOrCreate([
                'test_id' => $tests->id,
                'question_id' => $question_id
            ]);
        }
        TestQuestion::where('test_id', $id)->whereNotIn('question_id', $questionArr)->delete();

        
        return back()->with('success', 'ტესტი განახლდა!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test::findOrFail($id)->delete();
        return redirect()->route('teacher.tests.index');
    }
}
