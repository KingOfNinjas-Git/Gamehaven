<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    /** The signed-in user's profile page (the picture is changed through ProfilePictureController). */
    public function show(): View
    {
        return view('profile');
    }
}
