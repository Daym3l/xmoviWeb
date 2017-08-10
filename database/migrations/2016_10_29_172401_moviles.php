<?php
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;

  class Moviles extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create(
        'moviles', function (Blueprint $table){
        $table->increments('id_moviles');
        $table->string('model')->unique();
        $table->string('name');        
        $table->string('lanzamiento');
        $table->string('dimensions');
        $table->float('peso');
        $table->boolean('dual');
        $table->float('pantalla');
        $table->string('tipopantalla');
        $table->string('dpi');
        $table->string('procesador');
        $table->string('os');
        $table->string('vos');
        $table->integer('internal');
        $table->integer('ram');
        $table->string('camaraf');
        $table->string('camarat');
        $table->boolean('microsd');
        $table->integer('bateria');    
        $table->integer('precio');
        $table->string('img');
        $table->string('grosor');
        $table->timestamps();
      }
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//      Schema::drop('mod_devices.moviles');
    }
  }
