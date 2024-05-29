<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use App\Models\Company;


class CompanyController extends Controller
{
    
    public function index(): InertiaResponse
    {
        return Inertia::render('Companies/Index', [
            'companies'=>Company::all()
        ]);
    }


    public function show($company_slug): InertiaResponse
    {
        Inertia::render('Companies/Show', [
            'company' => Company::where('slug', $slug)->first()
        ]);
    }


    public function edit(Company $company): InertiaResponse
    {
        Inertia::render('Companies/Edit', [
            'company' => $company
        ]);
    }


}
