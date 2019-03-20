<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentBlocks;


use App\Services\StudentsBlocksService;





class StudentBlocksController extends Controller
{
    //

    protected $studentsBlocksService;

    public function __construct(StudentsBlocksService $studentsBlocksService)
    {
        $this->studentsBlocksService = $studentsBlocksService;
    }

    public function index()
    {
        return $this->studentsBlocksService->index();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->studentsBlocksService->store($request);
    }

    public function show($id)
    {
        return $this->studentsBlocksService->show($id);
    }

    public function update(Request $request, StudentBlocks $blocks)
    {
        return $this->studentsBlocksService->update($request, $blocks);
    }

    public function delete(StudentBlocks $blocks )
    {
        return $this->studentsBlocksService->delete($blocks);
    }
}
