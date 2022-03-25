<?php

namespace Database\Seeders;

use App\Models\PedidoDeVenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoDeVendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PedidoDeVenda::factory(10)->create();
    }
}
