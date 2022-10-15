<?php

namespace App\Http\Controllers;

class AdminHomeController extends Controller
{
    public function __construct()
    {

    }

    protected function index()
    {
        return view('pages.admin.dashboard');
    }
}
