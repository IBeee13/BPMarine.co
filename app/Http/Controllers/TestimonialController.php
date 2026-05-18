<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Project;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials     = Testimonial::where('is_active', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get();

        $featuredProjects = Project::orderBy('created_at', 'desc')
                                ->limit(4)
                                ->get();

        return view('pages.home', compact('testimonials', 'featuredProjects'));
    }
}