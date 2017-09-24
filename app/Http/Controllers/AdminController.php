<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateAccount;
use Auth;
use Purifier;
use Image;
use Illuminate\Http\File;


class AdminController extends Controller
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
        $user = Auth::user();
        return view('admin.settings-index1', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
      $user = User::find(Auth::user()->id);

      $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',

        ]);

        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->about = Purifier::clean($request->about);


        $user->save();

        session()->flash('success', 'You have successfully updated your profile!');
        return redirect()->route('settings.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::user()->id);
        // /unlink
        \File::delete('images/' . $user->avatar);
        // default image
        $user->avatar = 'default.jpg';
        // save
        $user->save();
        
        session()->flash('success', 'Success!');
        return redirect()->route('settings.index');
    }

    public function updateImage(Request $request, $id)
    {
        $user = Auth::user();

      if ($request->hasFile('avatar')) {

        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:208',
        ]);

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($avatar)->resize(300, 300)->save($location);

        $user->avatar = $filename;
        $user->save();

        session()->flash('success', 'Profile photo changed!');
        return redirect()->back();

      } else {

        session()->flash('error', 'Select photo first!');
        return redirect('/settings');

      }

    }
}
