<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 7:49 PM
 */

namespace App\Services;


use App\Admins;
use Illuminate\Http\Request;

class AdminsService
{
    public function index()
    {
        return Admins::all(['id', 'name', 'email', 'created_at', 'updated_at']);
    }

    public function show($id)
    {
        return Admins::find($id)->first(['id', 'name', 'email', 'created_at', 'updated_at']);
    }

    public function store(Request $request)
    {
        $admin = Admins::create($request->all());
        return response()->json($admin);
    }

    public function update(Request $request, Admins $admin)
    {
        $admin->update($request->all());
        return response()->json($admin);
    }

    public function delete(Admins $admin)
    {
        $admin->delete();
        return response()->json(null, 204);
    }
}