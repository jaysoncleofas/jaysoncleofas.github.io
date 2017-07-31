<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
  public function index_table()
  {
        return view('admin.projects-table');
  }
}
