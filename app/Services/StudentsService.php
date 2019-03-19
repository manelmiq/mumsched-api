<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 18/03/2019
 * Time: 1:09 PM
 */

namespace App\Services;

use App\StudentBlocks;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\Blocks;
use phpDocumentor\Reflection\Types\Array_;

class StudentsService
{
    public function index()
    {
        return Students::all();
    }

    public function show($id)
    {
        return Students::find($id);
    }

    public function store(Request $request)
    {
        $student = Students::create($request->all());
        return response()->json($student);
    }

    public function update(Request $request, Students $student)
    {
        $student->update($request->all());
        return response()->json($student);
    }

    public function delete(Students $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }

    public function getBlocks($student)
    {
        return StudentBlocks::where('id_student', '=', $student)->get();
    }

    public function getBlocksinSection($student)
    {
        $courses = DB::select(
            DB::raw(
                "select block.id as block_id, course.*
                        from student_blocks student_block
                               inner join sections sections on sections.id_block=student_block.id_block
                               inner join students student on student_block.id_student=student.id
                               inner join courses course on sections.id_course=course.id
                               inner join blocks block on student_block.id_block=block.id
                        where student_block.id_student='"
                . $student . "'"
            ));
        $array = response()->json($courses)->getData();
        $collection = collect($array);
        $grouped = $collection->groupBy('block_id');
        $arrayJson = array();
        foreach ($grouped as $key => $value) {
            $arr = array();
            $blocks = Blocks::find($key);
            $arr['block_id'] = $blocks->id;
            $arr['description'] = $blocks->description;
            $arr['courses'] = $grouped[$key];
            $arrayJson[] = $arr;
        }
        return response()->json($arrayJson, 200);

    }


}