<?php

namespace App\Http\Controllers;

use App\Entries;
use App\Services\EntriesService;
use Illuminate\Http\Request;

class EntriesController extends Controller
{
    protected $entriesService;

    public function __construct(EntriesService $entriesService)
    {
        $this->entriesService = $entriesService;
    }

    public function index()
    {
        return $this->entriesService->index();
    }

    public function show($id)
    {
        return $this->entriesService->show($id);
    }

    public function store(Request $request)
    {
        return $this->entriesService->store($request);
    }

    public function update(Request $request, Entries $entry)
    {
        return $this->entriesService->update($request, $entry);
    }

    public function delete(Entries $entry)
    {
        return $this->entriesService->delete($entry);
    }
}
