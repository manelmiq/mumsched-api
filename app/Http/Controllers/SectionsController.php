<?php

namespace App\Http\Controllers;

use App\Blocks;
use App\Courses;
use App\Services\SectionsService;
use Illuminate\Http\Request;

use App\Sections;



class SectionsController extends Controller
{

    protected $sectionsService;

    public function __construct(SectionsService $sectionsService)
    {
        $this->sectionsService = $sectionsService;
    }

    public function index()
    {
        return $this->sectionsService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->sectionsService->store($request);
    }

    public function show($id)
    {
        return $this->sectionsService->show($id);
    }

    public function update(Request $request, Sections $sections)
    {
        return $this->sectionsService->update($request, $sections);
    }

    public function delete(Sections $sections)
    {
        return $this->sectionsService->delete($sections);
    }

    public function getAllFacultiesPreferences(Blocks $block, Courses $course)
    {
        return $this->sectionsService->getAllFacultiesPreferences($block, $course);
    }
}
