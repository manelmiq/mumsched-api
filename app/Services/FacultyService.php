<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 5:40 PM
 */

namespace App\Services;

use App\Faculties;
use Illuminate\Http\Request;

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

}