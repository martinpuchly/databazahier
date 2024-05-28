<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class HomeController extends Controller
{
    
    public function index(): InertiaResponse
    {
        return Inertia::render('Home/Index');
    }
}
