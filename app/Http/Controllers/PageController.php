<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Display the specified page.
     */
    public function show(Page $page)
    {
        return Inertia::render('PageShow', [
            'page' => $page,
        ]);
    }
}
