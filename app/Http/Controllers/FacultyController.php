<?php

namespace App\Http\Controllers;

use App\Faculties;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //
    //
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
