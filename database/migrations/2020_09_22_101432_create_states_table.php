<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            /**
             * Relacionando a tabela states com a countries, por padrão o nome da trabela deve ser o countries no singular => country_id
             * Como vamos trabalhar com relacionamento é preciso colocar unsigned()
             */
            $table->integer('country_id')->unsigned();
            /**
             * Criando a Fk da coluna country_id que faz referenceia a coluna id da tabela countries
             * onDelete => Caso exista um registro na tabela countries que foi deletado e tinha dados relacionados com a tabela states, o registro da tabela states tbm será deletado
             */
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('initials', 100);
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
        Schema::dropIfExists('states');
    }
}
