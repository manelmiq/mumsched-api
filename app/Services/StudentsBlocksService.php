<?php
/**
 * Created by PhpStorm.
 * User: emmanuell
 * Date: 3/18/19
 * Time: 8:48 PM
 */


namespace App\Services;
use Illuminate\Http\Request;
use App\StudentBlocks;



class StudentsBlocksService
{

    public function index()
    {
        return StudentBlocks::all();
    }

    public function show($id)
    {
        return StudentBlocks::find($id);
    }

    public function store(Request $request)
    {
        $student = StudentBlocks::create($request->all());
        return response()->json($student);
    }

    public function update(Request $request, StudentBlocks $studentBlocks)
    {
        $studentBlocks->update($request->all());
        return response()->json($studentBlocks);
    }

    public function delete(StudentBlocks $studentBlocks)
    {
        $studentBlocks->delete();
        return response()->json(null, 204);
    }


}