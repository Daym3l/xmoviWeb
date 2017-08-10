<?php
  namespace xmovil\Http\Controllers;

  use Illuminate\Http\Request;
  use xmovil\Http\Requests;
  use xmovil\Movil as Movil;

  class MovilController extends Controller
  {
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
      $this->validate(
        $request, [
                  'name'        => 'required|max:255', 'model' => 'required|max:255',
                  'lanzamiento' => 'required|max:255', 'dimensions' => 'required|max:255', 'peso' => 'required',
                  'pantalla'    => 'required', 'tipopantalla' => 'required', 'dpi' => 'required',
                  'procesador'  => 'required', 'os' => 'required', 'vos' => 'required|max:255',
                  'internal'    => 'required', 'ram' => 'required', 'camarat' => 'required',
                  'camaraf'     => 'required', 'bateria' => 'required', 'precio' => 'required',
                  'img'         => 'required', 'grosor' => 'required']
      );
      $file = $request->file('imagen');
      //obtenemos el nombre del archivo
      $type = $file->getClientMimeType();
      if ($type != 'image/jpeg') {
        return redirect('movil')->with('message', 'El archivo seleccionado no es imagen en formato JPG.');
      } else {
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('assets')->put($request->model . ".jpg", \File::get($file));
        $movil = new Movil();
        $movil->create($request->all());

        return redirect('movil')->with('message', 'Los datos han sido guardados Correctamente.');
      }

    }

    public function update(Request $request, $id){

      $movil = Movil::findOrfail($id);
      $movil->name = $request->name;

      $movil->save();
      return redirect('movil')->with('message', 'Los datos han sido guardados Correctamente.');


    }
    public function index()
    {
      $moviles = Movil::all()->sortByDesc("updated_at")->take(8);
      $cant    = Movil::all();

      return \View::make('movil/list', compact('moviles', 'cant'));
    }

    public function buscar(Request $request)
    {
     

      $name    = strtoupper($request->name);

      if($name!="" ){
        $moviles = Movil::where('name', $name)->get();

        if(count($moviles)>0){
          $cant = Movil::all();
          return \View::make('movil/list', compact('moviles', 'cant'));
        }else{
          return redirect('movil')->with('message', 'No se encontro ningún reusltado.');
        }

      }else{
        return redirect('movil')->with('message', 'Debe introducir un nombre.');
      }



    }

    public function all(){
      $moviles = Movil::all();
      $resultado = Array();
      foreach ($moviles as $key => $movil ){
        $resultado[$movil['name']]=null;
      }
      return compact('resultado');
    }

  }
