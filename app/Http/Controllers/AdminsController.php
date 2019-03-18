<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Services\AdminsService;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    protected $adminsService;

    public function __construct(AdminsService $adminsService)
    {
        $this->adminsService = $adminsService;
    }

    public function index()
    {
        return $this->adminsService->index();
    }

    public function show($id)
    {
        return $this->adminsService->show($id);
    }

    public function store(Request $request)
    {
        return $this->adminsService->store($request);
    }

    public function update(Request $request, Admins $admin)
    {
        return $this->adminsService->update($request, $admin);
    }

    public function delete(Admins $admin)
    {
        return $this->adminsService->delete($admin);
    }
}
