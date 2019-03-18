<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 18/03/2019
 * Time: 1:09 PM
 */

namespace App\Services;

use App\Students;
use Illuminate\Http\Request;

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
}