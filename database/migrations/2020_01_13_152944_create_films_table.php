<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{

    protected $primaryKey = 'id';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',50);
            $table->string('descripcion',1000);
            $table->string('fecha',50);
            $table->unsignedInteger('cat_id');
            $table->string('imagen',50);
            $table->string('posicion',10);
            $table->string('trailer',300)->nullable();
            $table->timestamps();
        });


        Schema::table('peliculas', function (Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
