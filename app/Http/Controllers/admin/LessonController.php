<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\LessonCategory;
use App\LessonLevel;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = LessonCategory::all();
        $levels = LessonLevel::all();
        $lessons = Lesson::paginate(10);
        return view('admin.lesson.index')
            ->with('lessons', $lessons)
            ->with('levels', $levels)
            ->with('categories', $categories)
            ->with('lesson', 'lesson')
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validation

        $request->validate([
            'name' => 'required|unique:lessons',
            'category' => 'required|integer',
            'level' => 'required|integer'
        ]);

        Lesson::create([
            'name' => $request->name ,
            'lesson_category_id' => $request->category,
            'lesson_level_id' => $request->level
        ]);

        session()->flash('status', 'added ' . $request->name . " successfully");

        return redirect()->back();
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
        $lesson = Lesson::find($id);
        $categories = LessonCategory::all();
        $levels = LessonLevel::all();
        $lessons = Lesson::paginate(10);
        return view('admin.lesson.index')
            ->with('lessons', $lessons)
            ->with('levels', $levels)
            ->with('categories', $categories)
            ->with('lesson', $lesson)
        ;
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
        $request->validate([
            'name' => 'required',
            'category' => 'required|integer',
            'level' => 'required|integer'
        ]);

        $lesson = Lesson::find($id);

        $lesson->lesson_category_id = $request->category;
        $lesson->name = $request->name;
        $lesson->lesson_level_id = $request->level;

        $lesson->save();


        session()->flash('status', 'Updated ' . $request->name . " successfully");

        return redirect()->route('lesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $lesson = Lesson::find($id);
        $lesson->delete();
        session()->flash('status', "Updated  successfully");

        return redirect()->route('lesson.index');
    }
}
