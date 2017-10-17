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
        $skill = Skill::latest()->paginate(10);
        $no = (($skill->currentpage() - 1) * $skill->perpage()) + 1;
        return view('admin.skills-index', compact('skill'))->withNumber($no);
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
            \Cloudder::upload($request->file('image'));
            $c=\Cloudder::getResult();
            //  $image = $request->file('image');
            //  $filename = time() . '.' . $image->getClientOriginalExtension();
            //  $location = public_path('images/' . $filename);
            // Image::make($image)->save($location);

            $skill->image = $c['url'];
        }
        //   if($request->hasFile('image_file')){
        //     \Cloudder::upload($request->file('image_file'));
        //     $c=\Cloudder::getResult();
        //     if($c){
        //        return back()
        //             ->with('success','You have successfully upload images.')
        //             ->with('image',$c['url']);
        //     }
        //
        // }

        $skill->save();
        //   auth()->user()->addSkill(
        //   new Skill(request(['skill']))
        // );
        // Skill::create([
        //   'user_id' => auth()->id(),
        //   'skill' => request('skill'),
        //   'category' => request('category')
        // ]);
        Session::flash('success', 'Your skill was successfully added!');
        return redirect()->route('skills.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $number = 1;
        return view('admin.skills-edit', compact('skill', 'number'));
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
        $skill = Skill::findOrFail($id);

        $skill->skill = $request->skill;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);

            $skill->image = $filename;
        }

        $skill->save();

        Session::flash('success', 'Successsfully updated your skill!');
        return redirect()->route('skills.index');
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

        session()->flash('success', 'This skill was successfully deleted!');

        return redirect()->route('skills.index');
    }
}
