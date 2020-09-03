<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('codigo')->unique()->nullable();
            $table->string('codigo_de_barras')->nullable();
            
            
            $table->integer('categoria')->unsigned()->nullable();
            

            // Tasa de IVA
            $table->integer('iva')->unsigned()->default(1);
          

            $table->integer('stock')->default(0);
            
            $table->text('descripcion')->nullable();
            $table->double('precio')->default(0);
            $table->double('preciocompra')->default(0);
            //$table->double('cotizacion')->default(0);

            $table->integer('stock_minimo_valor')->default(0);
            $table->boolean('stock_minimo_notificar')->default(0);
            $table->integer('porcentaje')->default(0);

            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
}
