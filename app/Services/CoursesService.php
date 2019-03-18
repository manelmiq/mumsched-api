<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 6:14 PM
 */

namespace App\Services;


use App\Courses;
use Illuminate\Http\Request;

class CoursesService
{
    public function index()
    {
        return Courses::all();
    }

    public function show($id)
    {
        return Courses::find($id);
    }

    public function store(Request $request)
    {
        $course = Courses::create($request->all());
        return response()->json($course);
    }

    public function update(Request $request, Courses $course)
    {
        $course->update($request->all());
        return response()->json($course);
    }

    public function delete(Courses $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }

}