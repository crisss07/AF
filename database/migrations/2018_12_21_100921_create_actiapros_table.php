<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiaprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actiapros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codigo_anterior')->nullable();
            $table->string('codigo_actual')->nullable();
            $table->integer('grupo_id')->unsigned();
            $table->integer('auxiliar_id')->unsigned();
            $table->string('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->string('material_marca')->nullable();
            $table->string('modelo_medida')->nullable();
            $table->string('serie')->nullable();
            $table->string('procesador')->nullable();
            $table->string('memoria_ram')->nullable();
            $table->string('disco_duro')->nullable();
            $table->string('accesorios')->nullable();
            $table->string('estado')->nullable();
            $table->string('vida_util_futura')->nullable();
            $table->string('ubicacion_regional')->nullable();
            $table->string('ubicacion_general')->nullable();
            $table->string('ubicacion_especifica')->nullable();
            $table->string('oficina')->nullable();
            $table->string('responsable')->nullable();
            $table->string('ci')->nullable();
            $table->string('cargo')->nullable();
            $table->double('valor')->nullable();
            $table->double('costo_his')->nullable();
            $table->double('dia_his')->nullable();
            $table->double('mes_his')->nullable();
            $table->double('ano_his')->nullable();
            $table->double('vvalact')->nullable();
            $table->double('ddprecia')->nullable();
            $table->double('vvalnet')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('fuente_financiamiento')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->double('ufv')->nullable();
            $table->string('descripcion_qr')->nullable();

            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('auxiliar_id')->references('id')->on('auxiliars')->onDelete('cascade');
            
            
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
        Schema::dropIfExists('actiapros');
    }
}
