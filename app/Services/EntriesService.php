<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 7:12 PM
 */

namespace App\Services;
use App\Entries;
use Illuminate\Http\Request;

class EntriesService
{
    public function index()
    {
        return Entries::all();
    }

    public function show($id)
    {
        return Entries::find($id);
    }

    public function store(Request $request)
    {
        $entry = Entries::create($request->all());
        return response()->json($entry);
    }

    public function update(Request $request, Entries $entry)
    {
        $entry->update($request->all());
        return response()->json($entry);
    }

    public function delete(Entries $entry)
    {
        $entry->delete();
        return response()->json(null, 204);
    }

    public function getStudents($id)
    {
//        return Students::where('id_entry', $id)->get();
        return Entries::find($id)->students()->get();
    }
}