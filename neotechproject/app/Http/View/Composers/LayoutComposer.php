<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        // Fetch the data you want to send to the layout
        $user = Auth::user();
        // Pass the data to the view
        $view->with('user', $user);
    }
}
