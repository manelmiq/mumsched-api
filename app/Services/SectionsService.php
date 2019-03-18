<?php
/**
 * Created by PhpStorm.
 * User: emmanuell
 * Date: 3/18/19
 * Time: 12:09 PM
 */

namespace App\Services;
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
//        dd($sections);
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

}