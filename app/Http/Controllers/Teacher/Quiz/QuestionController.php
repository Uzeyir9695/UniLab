<?php

namespace App\Http\Controllers\Teacher\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::firstOrFail()->paginate(10);
        return view('teacher.quiz.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $question = Question::create([
            'teacher_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image ,
            'video' => $request->video,
            'type' => $request->optionsList
        ]);
        
        Option::create([
        'question_id' => $question->id,
        'options' => $request->option,
        'correct_answer' => $request->correct_answer,
        ]);
  
        return back()->with('success', 'კითხვითი ტესტი წარმატებით დამატებულია!');
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
        $questions = Question::findOrFail($id);
        $options = Option::where('question_id', $id)->get();

        foreach($questions->options as $option){
            $isOptionNull = $option->options;
            $isTrueOrFalse = $option->correct_answer;
        }
            
        return view("teacher.quiz.edit", compact('questions', 'options', 'isOptionNull', 'isTrueOrFalse'));
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
        $question = Question::findOrFail($id);
        $question->update([
            'teacher_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'video' => $request->video,
        ]);

        $options = Option::where('question_id', $id);
        $options->update([
            'options' => $request->option,
            'correct_answer' => $request->correct_answer
        ]);
        return back()->with('success', 'კითხვა განახლდა');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return redirect()->route('teacher.questions.index');
    }
}
