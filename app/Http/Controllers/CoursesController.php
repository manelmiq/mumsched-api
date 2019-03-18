<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Services\CoursesService;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    protected $coursesService;

    public function __construct(CoursesService $coursesService)
    {
        $this->coursesService = $coursesService;
    }

    public function index()
    {
        return $this->coursesService->index();
    }

    public function show($id)
    {
        return $this->coursesService->show($id);
    }

    public function store(Request $request)
    {
        return $this->coursesService->store($request);
    }

    public function update(Request $request, Courses $course)
    {
        return $this->coursesService->update($request, $course);
    }

    public function delete(Courses $course)
    {
        return $this->coursesService->delete($course);
    }
}
