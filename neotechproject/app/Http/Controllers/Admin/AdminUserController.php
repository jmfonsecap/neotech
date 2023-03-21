<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Users dashboard';
        $viewData['users'] = User::all();

        return view('admin.users.index')->with('viewData', $viewData);
    }
}
