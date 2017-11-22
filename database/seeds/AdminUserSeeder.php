<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name' => 'Administrador',
            'email' => 'admin@coletivoboitata.com.br',
            'password' => bcrypt('123321')
        ]);
    }
}
