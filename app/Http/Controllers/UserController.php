<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Skill;
use App\Message;
use Session;
use App\Tag;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dev = Skill::where('category', 'Development')->get();
        $des = Skill::where('category', 'Design')->get();
        $tool = Skill::where('category', 'Tools')->get();
        $tags = Tag::find([1, 2, 3]);
        $skills = Skill::all();
        $projects = Project::latest()->get();
        return view('index', compact('projects', 'skills', 'tags', 'dev', 'des', 'tool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [

          'firstname' => 'required',
          'lastname' => 'required',
          'email' => 'required',
          'phone_number' => 'required',
          'message' => 'required'

        ]);

        $message = new Message;

        Message::create(request(['firstname', 'lastname', 'email', 'phone_number', 'message']));

        Session::flash('success', 'Your message was successfully send!');
        return redirect('/#your-message');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSingle($slug)
    {
      //fetch from the database based on title
      $project = Project::where('slug', '=', $slug)->first();

      //return the view and pass in the post obh=ject
      return view('admin.projects-show', compact('project'));
      //   return $slug;
      //   return view('admin.projects-s how', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
