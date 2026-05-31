<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();

        // Kapal selesai — data untuk Alpine.js filter (tetap seperti semula)
        $completedProjects = $projects->where('is_under_construction', false)->values();

        $projectsData = $completedProjects->map(fn($p) => [
            'id'          => $p->id,
            'name'        => $p->name,
            'year'        => (string) $p->year,
            'cover_image' => $p->cover_image,
            'url'         => route('collection.show', $p->id),
        ]);

        $yearsData = $completedProjects->pluck('year')->filter()->unique()->sort()->values();

        // Kapal konstruksi — data untuk tab "Under Construction"
        $constructionProjects = $projects->where('is_under_construction', true)->values();

        $constructionData = $constructionProjects->map(fn($p) => [
            'id'                    => $p->id,
            'name'                  => $p->name,
            'type'                  => $p->type,
            'cover_image'           => $p->cover_image,
            'progress_photos'       => $p->progress_photos ?? [],
            'construction_stage'    => $p->construction_stage,
            'stage_label'           => $p->construction_stage_label,
            'stage_index'           => $p->construction_stage_index,
            'construction_cover' => $p->construction_cover,
            'progress_percentage'   => $p->progress_percentage ?? 0,
            'estimated_launch_date' => $p->estimated_launch_date
                ? $p->estimated_launch_date->format('M Y')
                : null,
            'url'                   => route('collection.construction', $p->id), // tambah ini
        ]);

        return view('pages.collection', compact(
            'projects',
            'projectsData',
            'yearsData',
            'constructionData',
        ));
    }

    public function show(Project $project)
    {
        $otherProjects = Project::where('id', '!=', $project->id)
            ->where('is_under_construction', false)
            ->limit(2)
            ->get();

        return view('pages.collection-detail', compact('project', 'otherProjects'));
    }

    public function showConstruction(Project $project)
    {
        abort_unless($project->is_under_construction, 404);

        return view('pages.construction-detail', compact('project'));
    }
}