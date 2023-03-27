<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminUserController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Users dashboard';
        $viewData['users'] = User::all();

        return view('admin.users.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('admin.users.show')->with('user', $user);
    }
}
