<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CloudderController extends Controller
{
    public function getfile()
    {
        return view('clouder');
    }
}
