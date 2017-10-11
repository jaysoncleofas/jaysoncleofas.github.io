<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Project;
use App\Message;
use Yajra\DataTables\Facades\Datatables;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $skill = Skill::all();
        $message = Message::all();
        $messages = Message::latest()->take(5)->get();
        // return Datatables::eloquent(Message::query())->make(true);
        return view('home', compact('messages', 'message', 'projects', 'skill'));
    }

    // public function get_datatables()
    // {
    //   $messages = Message::selectRaw('name firstname,')
    //   ->groupBy('fullname', 'message', 'created_at')
    //   ->get()
    //   ->toArray();
    //   return Datatables::of($messages)->make(true);
    // }
}
