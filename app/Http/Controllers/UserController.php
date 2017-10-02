<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Skill;
use App\Message;
use Session;
use App\User;
use GuzzleHttp\Client;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('skill', 'asc')->get();
        $users = User::where('id', 1)->first();
        $projects = Project::oldest()->get();
        return view('index', compact('projects', 'skills', 'users'));
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

          'name' => 'required|min:4|max:70',
          'email' => 'required',
          'contactNumber' => 'required',
          'subject' => 'required',
          'message' => 'required'

        ]);

        $token = $request->input('g-recaptcha-response');


        if ($token) {
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => array(
              'secret'   => '6Lf2Ni8UAAAAACvoF4YUM8njINH3JVoGJbE0cOqB',
              'response' => $token
            )
          ]);
            $results = json_decode($response->getBody()->getContents());

            if ($results->success) {
                // dd($results);
                // dd($results);

                $message = new Message;

                Message::create(request(['name', 'email', 'contactNumber', 'subject', 'message']));

                Session::flash('success', 'Your message has been submitted. I will reply to your email as soon as possible.');
                return redirect('/#your-message');
            } else {
                // $results->error_code
                Session::flash('error', 'You are probably a robot!');
                return redirect('/#your-message');
            }

            // Session::flash('success', 'Your message has been submitted. I will reply to your email as soon as possible.');
          // return redirect('/#your-message');

        // } else {
        //   Session::flash('failed', 'Your message has been not submitted.');
        //   return redirect('/#your-message');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        //fetch from the database based on title
        $project = Project::where('title', '=', $title)->first();
        $skills = Skill::all();

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
