<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Type;

use App\Http\Requests\ProjectUpsertRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectUpsertRequest $request)
    {
        $data = $request->validated();

        $data["slug"] = $this->generateSlug($data["title"]);
        $data["image"] = Storage::put("projects", $data["image"]);

        $project = Project::create($data);
        return redirect()->route("admin.projects.show", $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $project = Project::where("slug", $slug)->first();
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $project = Project::where("slug", $slug)->firstOrFail();

        $type = Type::all();

        return view("admin.projects.edit", compact("project", "type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpsertRequest $request, $slug)
    {
        $data = $request->validated();
        $project = Project::where("slug", $slug)->firstOrFail();

        if($data["title"] !== $project->title) {
            $data["slug"] = $this->generateSlug($data["title"]);
        }

        $project->update($data);
        return redirect()->route("admin.projects.show", $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $project = Project::where("slug", $slug)->firstOrFail();
        $project->delete();
        return redirect()->route("admin.projects.index");
    }

    protected function generateSlug($title) {
        $counter =0;
        do {
            $slug = Str::slug($title) . ($counter > 0 ? "-" . $counter : "");
            $alreadyExists = Project::where("slug", $slug)->first();
            $counter++;
        } while($alreadyExists);

        return $slug;
    }
}
