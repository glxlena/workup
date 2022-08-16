<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OlaHelenaController extends Controller
{
  public function ola() {
    return view ('hello');
  }
}
