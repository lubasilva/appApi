<?php

namespace Database\Seeders;

use App\Models\PedidoDeVenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ClienteSeeder::class,
            PedidoSeeder::class,
            UnidadeSeeder::class,
            ProdutoSeeder::class,
            PedidoDeVendaSeeder::class,
        ]);
    }
}
