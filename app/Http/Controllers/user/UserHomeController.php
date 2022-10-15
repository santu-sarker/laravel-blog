<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class UserHomeController extends Controller
{
    public function index()
    {
        return view("pages.user.home");
    }
}
