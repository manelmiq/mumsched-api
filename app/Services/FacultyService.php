<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 5:40 PM
 */

namespace App\Services;

use App\Blocks;
use App\Courses;
use App\Faculties;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;
use function Sodium\add;

class FacultyService
{

    public function index()
    {
        return Faculties::all();
    }

    public function show($id)
    {
        return Faculties::find($id);
    }

    public function store(Request $request)
    {
        $faculty = Faculties::create($request->all());
        return response()->json($faculty);
    }

    public function update(Request $request, Faculties $faculty)
    {
        $faculty->update($request->all());
        return response()->json($faculty);
    }

    public function delete(Faculties $faculty)
    {
        $faculty->delete();
        return response()->json(null, 204);
    }

    public function getCoursePreferences($facultyId) {
        $coursePreferences = Faculties::find($facultyId)->coursePreferences()->get();
        $courses = Courses::all();

        if ($courses == null or count($courses) == 0) {
            $response['faculty_id'] = $facultyId;
            $response['courses'] = null;
            return response()->json($response);
        }

        if ($coursePreferences == null or count($coursePreferences) == 0) {
            foreach ($courses as $course) {
                $course->isPreference = false;
            }
            $response['faculty_id'] = $facultyId;
            $response['courses'] = $courses;
            return response()->json($response);
        }

        foreach ($courses as $course) {
            foreach ($coursePreferences as $preference) {
                if ($course->id == $preference->id) {
                    $course->isPreference = true;
                    break;
                } else {
                    $course->isPreference = false;
                }
            }
        }

        $response['faculty_id'] = $facultyId;
        $response['courses'] = $courses;
        return response()->json($response);
    }

    public function storeCoursePreferences(Request $request, Faculties $faculty) {

        if ($request == null or !$request->has('courses_id')) {
            return $this->getCoursePreferences($faculty->id);
        }

        foreach ($request['courses_id'] as $courseId) {
            $course = Courses::find($courseId);
            $faculty->coursePreferences()->save($course);
        }

        return $this->getCoursePreferences($faculty->id);
    }

    public function updateCoursePreferences(Request $request, Faculties $faculty) {

        $faculty->coursePreferences()->sync($request['courses_id']);

        return $this->getCoursePreferences($faculty->id);

    }


    public function getBlockPreferences($facultyId) {
        $blockPreferences = Faculties::find($facultyId)->blockPreferences()->get();
        $blocks = Blocks::all();

        if ($blocks == null or count($blocks) == 0) {
            $response['faculty_id'] = $facultyId;
            $response['blocks'] = null;
            return response()->json($response);
        }

        if ($blockPreferences == null or count($blockPreferences) == 0) {
            foreach ($blocks as $block) {
                $block->isPreference = false;
            }
            $response['faculty_id'] = $facultyId;
            $response['blocks'] = $blocks;
            return response()->json($response);
        }

        foreach ($blocks as $block) {
            foreach ($blockPreferences as $preference) {
                if ($block->id == $preference->id) {
                    $block->isPreference = true;
                    break;
                } else {
                    $block->isPreference = false;
                }
            }
        }

        $response['faculty_id'] = $facultyId;
        $response['blocks'] = $blocks;
        return response()->json($response);
    }

    public function storeBlockPreferences(Request $request, Faculties $faculty) {

        if ($request == null or !$request->has('blocks_id')) {
            return $this->getBlockPreferences($faculty->id);
        }

        foreach ($request['blocks_id'] as $blockId) {
            $block = Blocks::find($blockId);
            $faculty->blockPreferences()->save($block);
        }

        return $this->getBlockPreferences($faculty->id);
    }

    public function updateBlockPreferences(Request $request, Faculties $faculty) {

        $faculty->blockPreferences()->sync($request['blocks_id']);

        return $this->getBlockPreferences($faculty->id);

    }

}