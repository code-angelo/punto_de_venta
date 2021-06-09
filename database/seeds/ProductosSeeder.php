<?php

use Illuminate\Database\Seeder;
use App\Productos;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Productos::class, 1000)->create();
    }
}
