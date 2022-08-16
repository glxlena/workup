<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestsController extends Controller
{
  public function pedidos() {
    return view ('pedidos');
  }
}
