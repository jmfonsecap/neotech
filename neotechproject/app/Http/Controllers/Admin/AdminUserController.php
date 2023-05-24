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
        $viewData['title'] = __('messages.admin.user.table.title');
        $viewData['users'] = User::all();
        $viewData['labels'] = [
            __('messages.admin.label.name'),
            __('messages.admin.label.email'),
            __('messages.admin.label.role'),
            __('messages.admin.label.phone'),
            __('messages.admin.label.country'),
            __('messages.admin.label.actions'),
        ];

        return view('admin.users.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $user = User::findOrFail($id);

        return view('admin.users.show')->with('user', $user);
    }
}
