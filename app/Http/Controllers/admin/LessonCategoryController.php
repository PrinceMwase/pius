<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\LessonCategory;

class LessonCategoryController extends Controller
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
        $lessonCategories = LessonCategory::paginate(10);
        return view('admin.lessonCategory.index')
            ->with('lessonCategories', $lessonCategories)
            ->with('category', 'category')
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
        //validation

        $request->validate([
            'name' => 'required|unique:lesson_categories'
        ]);

        LessonCategory::create([
            'name' => $request->name 
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
        $category = LessonCategory::find($id);
        $lessonCategories = LessonCategory::paginate(10);
        return view('admin.lessonCategory.index')
            ->with('lessonCategories', $lessonCategories)
            ->with('category', $category);
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
            'name' => 'required|unique:lesson_categories'
        ]);

        $category = LessonCategory::find($id);

        $category->name = $request->name ;

        $category->save();

        session()->flash('status', 'updated ' . $request->name . " successfully");

        return redirect()->route('category.index');
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
        $category = LessonCategory::find($id);
        $category->delete();

        session()->flash('status', "Deleted  successfully");

        return redirect()->route('category.index');
    }
}
