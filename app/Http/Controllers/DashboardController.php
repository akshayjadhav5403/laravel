<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $roles = $user?->roles->pluck('name')->all() ?? [];

        return view('dashboard.index', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function roleIndex(): View
    {
        $user = Auth::user();

        return view('dashboard.roles', [
            'user' => $user,
            'roles' => $user?->roles()->paginate(10),
        ]);
    }
}
