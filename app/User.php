<?php
  namespace xmovil;

  use Illuminate\Notifications\Notifiable;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use xmovil\Http\Requests;

  class User extends Authenticatable
  {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    protected $guarded = ['is_admin'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
      = [
        'password', 'remember_token',];

    

  }
