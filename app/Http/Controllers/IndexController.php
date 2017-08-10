<?php

namespace xmovil\Http\Controllers;

use Illuminate\Http\Request;

use xmovil\Http\Requests;
use xmovil\Movil as Movil;
use xmovil\User;

class IndexController extends Controller
{
  public function index()
  {
    $moviles = Movil::all()->sortByDesc("updated_at")->take(6);
    $cant    = Movil::all();
    

    return \View::make('welcome', compact('moviles',"cant"));
  }
}
