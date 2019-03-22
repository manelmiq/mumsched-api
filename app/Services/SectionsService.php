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
use App\Faculties;
use App\FacultyBlocksPreferences;
use App\FacultyCoursesPreferences;

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

    public function getAllFacultiesPreferences($block, $course)
    {
        $facultyPref = FacultyCoursesPreferences::where('id_course', $course)->get(['id_faculty'])->toArray();
        $blocksPref = FacultyBlocksPreferences::where('id_block', $block)->get()->toArray();

        $response = [];
        foreach ($facultyPref as $faculty) {
            foreach ($blocksPref as $block) {
                if ($block['id_faculty'] == $faculty['id_faculty']) {
                    array_push($response, $faculty);
                }
            }
        }

        $facultyResp = [];
        foreach ($response as $resp) {
            array_push($facultyResp, Faculties::where('id', $resp['id_faculty'])->get(['id', 'firstName', 'lastName', 'email', 'created_at', 'updated_at'])->first());
        }

        return $facultyResp;
    }

}