<?php
  namespace xmovil;

  use Illuminate\Database\Eloquent\Model;

  class Movil extends Model
  {
    protected $table = 'moviles';
    protected $fillable
      = [
        'model', 'name', 'lanzamiento','dimensions', 'peso','dual', 'pantalla', 'tipopantalla', 'dpi', 'procesador', 'os',
        'vos','internal','ram','camaraf','camarat','microsd','bateria','precio','img','grosor'];
    protected $guarded = ['id_moviles'];

    
  }
