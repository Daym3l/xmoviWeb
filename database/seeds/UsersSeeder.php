<?php
  use Illuminate\Database\Seeder;

  class UsersSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      xmovil\User::create(
        ['name' => 'Administrador', 'email' => 'admin@domain.cu','is_admin'=>true, 'password' => bcrypt('Xmovil_Madworld537')]
      );

    }
  }
