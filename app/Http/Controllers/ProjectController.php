<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Session;
use App\Http\Requests\ProjectRequest;

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
        $projects = Project::paginate(1);
        $no = 1;
        return view('admin.projects-index', compact('projects'))->withNumber($no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        auth()->user()->addProjects(

          new Project(request(['title', 'body', 'slug']))

        );

        // Project::create(request(['title','body']));

        // Session::flash('success', 'Your rpoject was successfully added!');

        session()->flash('message', 'Your project was successfully added!');

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
    public function edit(Project $project)
    {
        return view('admin.projects-edit', compact('project'));
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

        if ($request->input('slug') == $project->slug || $request->input('title') == $project->title) {
           $this->validate($request, [
             'body' => 'required'
            ]);
        }else {
           $this->validate($request, [
              'title' => 'required|unique:projects',
             'body' => 'required',
              'slug' => 'unique:projects'
           ]);
        }
        //Save
        $project = Project::find($id);

        $project->title = $request->input('title');
        $project->body = $request->input('body');
        $project->slug = $request->input('slug');

        $project->save();

        //flash
        // Session::flash('success', 'This project was successfully saved!');
        session()->flash('message', 'This project was successfully saved!');

        //redirect
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
        $project->delete();

        session()->flash('message', 'This project was successfully deleted!');

        return redirect()->route('projects.index');
    }
}
