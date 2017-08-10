<?php
  namespace xmovil\Http\Controllers;

  use Illuminate\Http\Request;
  use xmovil\Http\Requests;
  use xmovil\User as User;
  use Auth;

  class UserController extends Controller
  {

    public function editUser($id)
    {
      $user = User::find($id);

      return \View::make('administrators.update_User',compact('user'));
    }

    public function updateUser($id,Request $request)
    {

      $user = User::findOrfail($id);
      $user->name = $request->name;
      $user->save();

      return redirect('home')->with('message', 'Los datos del usuario han sido modificados satisfactoriamente.');

    }

    /**
     * Eliminar usuario
     * @param $id
     *
     * @return mixed
     */
    public function deleteUser($id)
    {
      $user = User::findOrfail($id);

      if (Auth::user()->name == $user->name) {
        return redirect('/home')->with('error_message', 'No se puede eliminar el usuario logueado.');
      } else {
        $user->delete();
        return redirect('/home')->with('message', 'Usuario eliminado satisfactoriamente.');
      }
    }
  }
