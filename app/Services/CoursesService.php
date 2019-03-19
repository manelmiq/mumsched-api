<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 6:14 PM
 */

namespace App\Services;

use App\Courses;
use App\Prerequisites;
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

        if (!$request->has('prerequisites') or $request['prerequisites'] == null) {
            return response()->json($course);
        }

        $prerequisites = $request->input('prerequisites');
        foreach ($prerequisites as $prerequisite) {
            $prerequisite['id_course'] = $course['id'];
            Prerequisites::create($prerequisite);
        }

        return response()->json($course);
    }

    public function update(Request $request, Courses $course)
    {
        $course->update($request->all());

        if (!$request->has('prerequisites') or $request['prerequisites'] == null) {
            //delete previous prerequisites
            $prerequisites = $this->getAllPrerequisites($course['id']);
            foreach ($prerequisites as $prerequisite) {
                $prerequisite->delete();
            }

            return response()->json($course);
        }

        $updates = $request->input('prerequisites');
        $prerequisites = $this->getAllPrerequisites($course['id']);

        foreach ($prerequisites as $prerequisite) {
            $prerequisite->delete();
        }

        foreach ($updates as $update) {
            $update['id_course'] = $course['id'];
            Prerequisites::create($update);
        }

        return response()->json($course);
    }

    public function delete(Courses $course)
    {
        $prerequisites = $this->getAllPrerequisites($course['id']);
        if ($prerequisites != null) {
            foreach ($prerequisites as $prerequisite) {
                $prerequisite->delete();
            }
        }
        $course->delete();
        return response()->json(null, 204);
    }

    public function getAllPrerequisites($courseId) {

        return Courses::find($courseId)->prerequisites()->get();
    }

}