<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();

        $projectsData = $projects->map(fn($p) => [
            'id'          => $p->id,
            'name'        => $p->name,
            'year'        => (string) $p->year,
            'cover_image' => $p->cover_image,
            'url'         => route('collection.show', $p->id),
        ]);

        $yearsData = $projects->pluck('year')->filter()->unique()->sort()->values();

        return view('pages.collection', compact('projects', 'projectsData', 'yearsData'));
    }

    public function show(Project $project)
    {
        $otherProjects = Project::where('id', '!=', $project->id)->limit(2)->get();
        return view('pages.collection-detail', compact('project', 'otherProjects'));
    }
}