<?php

namespace App\Http\Controllers;

use App\Faculties;
use App\Services\FacultyService as FacultyService;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    protected $facultyService;

    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    public function index()
    {
        return $this->facultyService->index();
    }

    public function show($id)
    {
        return $this->facultyService->show($id);
    }

    public function store(Request $request)
    {
        return $this->facultyService->store($request);
    }

    public function update(Request $request, Faculties $faculty)
    {
        return $this->facultyService->update($request, $faculty);
    }

    public function delete(Faculties $faculty)
    {
        return $this->facultyService->delete($faculty);
    }
}
