<?php
/**
 * Created by PhpStorm.
 * User: romul
 * Date: 17/03/2019
 * Time: 6:50 PM
 */

namespace App\Services;


use App\Blocks;
use Illuminate\Http\Request;

class BlocksService
{
    public function index()
    {
        return Blocks::all();
    }

    public function show($id)
    {
        return Blocks::find($id);
    }

    public function store(Request $request)
    {
        $block = Blocks::create($request->all());
        return response()->json($block);
    }

    public function update(Request $request, Blocks $block)
    {
        $block->update($request->all());
        return response()->json($block);
    }

    public function delete(Blocks $block)
    {
        $block->delete();
        return response()->json(null, 204);
    }
}