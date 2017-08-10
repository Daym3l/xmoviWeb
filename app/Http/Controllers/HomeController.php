<?php

namespace xmovil\Http\Controllers;
use xmovil\Http\Requests;
use xmovil\Movil as Movil;
use xmovil\User as User;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moviles = Movil::all()->sortByDesc("updated_at")->take(8);
        $cant    = Movil::all();
        $users    = User::all();

        return \View::make('home', compact('moviles','cant','users'));

        return view('home');
    }

    public function buscar(Request $request)
    {


        $name    = strtoupper($request->name);

        if($name!="" ){
            $moviles = Movil::where('name', $name)->get();

            if(count($moviles)>0){
                $cant = Movil::all();
                return \View::make('home', compact('moviles', 'cant'));
            }else{
               return redirect('home')->with('message', 'No se encontro ningún reusltado.');
            }

        }else{
            return redirect('home')->with('message', 'Debe introducir el nombre del dispositivo a buscar');
        }



    }
}
