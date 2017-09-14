<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Skill;
use App\User;
use Session;
use Image;

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

       $skill = Skill::all();

       $no = 1;
       return view('admin.skills-index', compact('skill'))->withNumber($no);
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


      ]);

      $skill = new Skill;
      $skill->user_id = auth()->id();
      $skill->skill = $request->skill;

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('images/' . $filename);
         Image::make($image)->resize(800, 400)->save($location);

         $skill->image = $filename;
      }

      $skill->save();
      //   auth()->user()->addSkill(
      //
      //   new Skill(request(['skill']))
      //
      // );


      // Skill::create([
      //   'user_id' => auth()->id(),
      //   'skill' => request('skill'),
      //   'category' => request('category')
      //
      // ]);

      Session::flash('success', 'Your skill was successfully added!');
      return back();
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
      $skill = Skill::find($id);
      $skill->projects()->detach();
      $skill->delete();

      session()->flash('message', 'This skill was successfully deleted!');

      return redirect()->route('skills.index');
  }
}
