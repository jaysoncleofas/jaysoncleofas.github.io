<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
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

        $tags = Tag::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('admin.tags-index', compact('tags'))->withNumber($no);
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
      $this->validate($request, [
         'tag' => 'required|unique:tags'
      ]);

      auth()->user()->addTags(
         new Tag(request(['tag']))
      );
      session()->flash('message', 'Success! You successfully added a tag!');
      return redirect()->route('tags.index');
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
      $tag = Tag::find($id);

      return view('admin.tag-edit', compact('tag'));
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
        $tag = Tag::find($id);

        if ($request->input('tag') != $tag->tag) {
           $this->validate($request, [
             'tag' => 'required|unique:tags'
          ]);
       }

        $this->validate($request, [
           'tag' => 'required'
        ]);

        $tag->tag = $request->input('tag');

        $tag->save();

        session()->flash('message', 'Success! You successfully updated the tag.');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tag = Tag::find($id);
      $tag->projects()->detach();

      $tag->delete();
      session()->flash('message', 'Well done! You successfully deleted this tag.');
      return redirect()->route('tags.index');
    }
}
