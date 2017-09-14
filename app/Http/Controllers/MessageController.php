<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
// use Carbon\Carbon;
use Session;

class MessageController extends Controller
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
        $messages = Message::latest()->paginate(5);
        $no = 1;
        return view('admin.message-index', compact('messages'))->withNumber($no);
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
         //
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
      // $archives = Message::selectRaw('(firstname) firstname, (lastname) lastname, (message) message, (created_at) created_at, (id) id, count(*) total')
      //       ->groupBy('firstname', 'lastname', 'message', 'created_at', 'id')
      //       // ->orderByRaw('category', 'desc')
      //       ->get()
      //       ->toArray();
      // Carbon::now('PHT');

        return view('admin.message-show', compact('message'));
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
        $message = Message::find($id);
        $message->delete();

        session()->flash('message', 'This message was successfully deleted!');

        return redirect()->route('messages.index');
    }

}
