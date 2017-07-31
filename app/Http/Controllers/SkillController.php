<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Skill;
use App\User;
use Session;

class SkillController extends Controller
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

    $skills = Skill::latest()
        ->filter(request(['category']))
        ->get();


    // $skills = Skill::latest();
    // if ($category = request('category'))
    // {
    //   $skills->where('category', $category);
    // }
    // $skills = $skills->get();

    // $archives = Skill::archives(); //eto yung sa baba shortcut lang pre tapos asa skill model yung code sa baba nilipat lang

    // $archives = Skill::selectRaw('(category) category, count(*) total')
    //       ->groupBy('category')
    //       // ->orderByRaw('category', 'desc')
    //       ->get()
    //       ->toArray();

    $all = Skill::all();

    return view('admin.skills-index', compact('skills', 'all'));
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

        'skill' => 'required|unique:skills',
        'category' => 'required'

      ]);

        auth()->user()->addSkill(

        new Skill(request(['skill', 'category']))

      );
      // Skill::create([
      //   'user_id' => auth()->id(),
      //   'skill' => request('skill'),
      //   'category' => request('category')
      //
      // ]);

      Session::flash('success', 'Your skill was successfully added!');
      return redirect('/skills');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
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
