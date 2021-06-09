<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->bigInteger('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');

            $table->decimal('total',7,2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
