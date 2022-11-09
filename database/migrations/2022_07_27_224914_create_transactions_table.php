<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->timestamp('horaentrada');
            $table->timestamp('horasalida')->nullable();
            $table->string('tipo_veiculo');
            $table->double('valortotal')->nullable();
            $table->string('estado');
                                        //(constrained())  determinar el nombre de la tabla y la columna a los que se hace referencia
            $table->foreignId('tarifa_id')->nullable()->constrained()->onDelete('cascade'); //(onDelete() quiere decir eliminar )al eliminar el ususario se llevara sus post
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //(onDelete() quiere decir eliminar )al eliminar el ususario se llevara sus post

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
        Schema::dropIfExists('transactions');
    }
};
