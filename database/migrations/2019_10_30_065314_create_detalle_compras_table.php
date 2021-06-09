<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('compra_id')->unsigned();
            $table->foreign('compra_id')->references('id')->on('compras');

            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->string('producto');
            $table->decimal('precio',7,2);
            $table->integer('cantidad');
            
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
        Schema::dropIfExists('detalle_compras');
    }
}
