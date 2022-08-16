<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
  public function funcionarios() {
    return view ('funcionarios');
  }
}
