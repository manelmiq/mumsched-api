<?php

namespace App\Http\Controllers;

use App\Sections;

use Illuminate\Http\Request;
use App\Services\SectionsService as SectionService;


class SectionsController extends Controller
{

    protected $sectionsService;

    public function __construct(SectionService $sectionsService)
    {
        $this->$sectionsService = $sectionsService;
    }


//    public function __construct(SectionService $sectionsService)
//    {
//        $this->$sectionsService = $sectionsService;
//    }

    public function index()
    {
//        return $this->sectionsService->index();
        return $this->sectionsService->index();
    }

    public function store(Request $request)
    {
        return $this->sectionsService->store($request);
    }

    public function update(Request $request, Sections $section)
    {
        return $this->sectionsService->update($request, $section);
    }

    public function delete(Sections $section)
    {
        return $this->sectionsService->delete($section);
    }
}
