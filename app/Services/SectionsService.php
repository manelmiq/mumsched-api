<?php
/**
 * Created by PhpStorm.
 * User: emmanuell
 * Date: 3/18/19
 * Time: 12:09 PM
 */

namespace App\Services;
use App\Blocks;
use App\Courses;
use Illuminate\Http\Request;
use App\Sections;

class SectionsService
{
    public function index()
    {
        return Sections::all();
    }

    public function show($id)
    {
        return Sections::find($id);
    }

    public function store(Request $request)
    {
        $sections = Sections::create($request->all());
        return response()->json($sections);
    }

    public function update(Request $request, Sections $sections)
    {
        $sections->update($request->all());
        return response()->json($sections);
    }

    public function delete(Sections $sections)
    {
        $sections->delete();
        return response()->json(null, 204);
    }

    public function getAllFacultiesPreferences(Blocks $block, Courses $course)
    {
        $facultyCoursePreferences =  $course->facultyPreferences()->get();
        $facultyBlockPreferences = $block->facultyPreferences()->get();

        if ($facultyCoursePreferences == null or count($facultyCoursePreferences) == 0 or
            $facultyBlockPreferences == null or count($facultyBlockPreferences) == 0) {
            return;
        }

        $faculties = array();
        $i = 0;
        foreach ($facultyBlockPreferences as $blockPreference) {
            foreach ($facultyCoursePreferences as $coursePreference) {
                if ($coursePreference->id == $blockPreference->id) {
                    $faculties[$i] = $coursePreference;   //get the whole obj faculty
                    $i++;
                }
            }
        }

        return $faculties;
    }

}