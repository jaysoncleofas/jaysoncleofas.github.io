<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Skill;
use Session;
use App\Http\Requests\ProjectRequest;
use Image;
use Purifier;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::oldest()->paginate(5);
        $no = (($projects->currentpage() - 1) * $projects->perpage()) + 1;
        return view('admin.projects-index', compact('projects'))->withNumber($no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::orderBy('skill')->get();
        return view('admin.projects-create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project;
        $project->user_id = auth()->id();
        $project->title = $request->title;
        $project->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_image')) {
            $this->validate($request, [
                'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000',
            ]);

            \Cloudder::upload($request->file('featured_image'));
            $c=\Cloudder::getResult();
            //  $image = $request->file('featured_image');
            //  $filename = time() . '.' . $image->getClientOriginalExtension();
            //  $location = public_path('images/' . $filename);
            //  Image::make($image)->resize(800, 400)->save($location);

            $project->image = $c['url'];
        }

        $project->save();

        $project->skills()->sync($request->skills, false);

        session()->flash('success', 'Your project was successfully added!');

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $skills = Skill::orderBy('skill')->get();
        return view('admin.projects-edit', compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate
        $project = Project::find($id);

        if ($request->input('title') != $project->title) {
            $this->validate($request, [
             'title' => 'required|unique:projects',
          ]);
        } else {
            $this->validate($request, [
              'body' => 'required'
           ]);
        }

        $project->title = $request->input('title');
        $project->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
            $this->validate($request, [
              'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000',
          ]);

            \Cloudder::upload($request->file('featured_image'));
            $c=\Cloudder::getResult();
            // $image = $request->file('featured_image');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $location = public_path('images/' . $filename);
            // Image::make($image)->resize(800, 400)->save($location);

            $project->image = $c['url'];
        }

        $project->save();

        if (isset($request->skills)) {
            $project->skills()->sync($request->skills);
        } else {
            $project->skills()->sync(array());
        }

        session()->flash('success', 'This project was successfully saved!');

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->skills()->detach();
        $project->delete();

        session()->flash('success', 'This project was successfully deleted!');

        return redirect()->route('projects.index');
    }
}
