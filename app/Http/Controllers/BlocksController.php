<?php

namespace App\Http\Controllers;

use App\Blocks;
use App\Services\BlocksService;
use Illuminate\Http\Request;

class BlocksController extends Controller
{
    protected $blocksService;

    public function __construct(BlocksService $blocksService)
    {
        $this->blocksService = $blocksService;
    }

    public function index()
    {
        return $this->blocksService->index();
    }

    public function show($id)
    {
        return $this->blocksService->show($id);
    }

    public function store(Request $request)
    {
        return $this->blocksService->store($request);
    }

    public function update(Request $request, Blocks $block)
    {
        return $this->blocksService->update($request, $block);
    }

    public function delete(Blocks $block)
    {
        return $this->blocksService->delete($block);
    }
}
