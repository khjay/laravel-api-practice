<?php

namespace App\Http\Controllers;

use Response;
use App\Lesson;
use Illuminate\Http\Request;
use App\Transformers\LessonTransformer;

class LessonsController extends Controller
{
    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. All is bad
        // 2. No way to attach meta data
        // 3. Linking db structure to the API output
        // 4. No way to signal headers/responses codes
        $lessons = Lesson::all();
        return Response::json([
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray()),
        ], 200);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson) {
            return Response::json([
                'error' => [
                    'message' => 'Lesson does not exist',
                ]
            ], 404);
        }
        return Response::json([
            'data' => $this->lessonTransformer->transform($lesson)
        ], 200);
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
        //
    }
}